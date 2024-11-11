<?php

class PhotoGalleryPostType
{
  public function __construct()
  {
    add_action('init', [$this, 'register_post_type']);
    add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
    add_action('save_post', [$this, 'save_meta_box_data']);
  }

  public function register_post_type()
  {
    register_post_type(
      'photo_gallery',
      array(
        'labels' => array(
          'name' => __('Photo Galleries'),
          'singular_name' => __('Photo Gallery')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-gallery',
      )
    );
  }

  public function add_meta_boxes()
  {
    add_meta_box(
      'photo_gallery_images',
      __('Photo Gallery Images'),
      [$this, 'render_meta_box'],
      'photo_gallery',
      'normal',
      'high'
    );
  }

  public function render_meta_box($post)
  {
    wp_nonce_field('save_photo_gallery_images', 'photo_gallery_images_nonce');
    $images = get_post_meta($post->ID, '_photo_gallery_images', true);
?>
    <div id="photo-gallery-images-container">
      <ul class="photo-gallery-images">
        <?php if (!empty($images)) : ?>
          <?php foreach ($images as $image) : ?>
            <li>
              <img src="<?php echo esc_url($image); ?>" style="max-width: 150px;">
              <input type="hidden" name="photo_gallery_images[]" value="<?php echo esc_url($image); ?>">
              <button type="button" class="remove-image-button">Remove</button>
            </li>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
      <button type="button" id="add-photo-gallery-image-button">Add Image</button>
    </div>
    <script>
      jQuery(document).ready(function($) {
        $('#add-photo-gallery-image-button').click(function(e) {
          e.preventDefault();
          var frame = wp.media({
            title: 'Select or Upload Images',
            button: {
              text: 'Use this image'
            },
            multiple: true
          });

          frame.on('select', function() {
            var attachments = frame.state().get('selection').toJSON();
            attachments.forEach(function(attachment) {
              var imageUrl = attachment.url;
              var listItem = '<li><img src="' + imageUrl + '" style="max-width: 150px;"><input type="hidden" name="photo_gallery_images[]" value="' + imageUrl + '"><button type="button" class="remove-image-button">Remove</button></li>';
              $('.photo-gallery-images').append(listItem);
            });
          });

          frame.open();
        });

        $(document).on('click', '.remove-image-button', function() {
          $(this).closest('li').remove();
        });
      });
    </script>
<?php
  }

  public function save_meta_box_data($post_id)
  {
    if (!isset($_POST['photo_gallery_images_nonce']) || !wp_verify_nonce($_POST['photo_gallery_images_nonce'], 'save_photo_gallery_images')) {
      return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return;
    }

    if (!current_user_can('edit_post', $post_id)) {
      return;
    }

    if (isset($_POST['photo_gallery_images'])) {
      $images = array_map('esc_url_raw', $_POST['photo_gallery_images']);
      update_post_meta($post_id, '_photo_gallery_images', $images);
    } else {
      delete_post_meta($post_id, '_photo_gallery_images');
    }
  }
}

new PhotoGalleryPostType();
