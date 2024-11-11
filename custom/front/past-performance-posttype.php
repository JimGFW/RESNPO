<?php

class PastPerformancePostType
{
  public function __construct()
  {
    add_action('init', [$this, 'register_post_type']);
    add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
    add_action('save_post', [$this, 'save_meta_boxes']);
  }

  public function register_post_type()
  {
    $labels = [
      'name' => _x('Past Performances', 'Post Type General Name', 'textdomain'),
      'singular_name' => _x('Past Performance', 'Post Type Singular Name', 'textdomain'),
      'menu_name' => __('Past Performances', 'textdomain'),
      'name_admin_bar' => __('Past Performance', 'textdomain'),
    ];

    $args = [
      'label' => __('Past Performance', 'textdomain'),
      'labels' => $labels,
      'supports' => ['title', 'editor', 'thumbnail'],
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-star-filled',
    ];

    register_post_type('pastperformance', $args);
  }

  public function add_meta_boxes()
  {
    add_meta_box(
      'category',
      'Category',
      [$this, 'category_meta_box_callback'],
      'pastperformance',
      'normal',
      'high'
    );

    add_meta_box(
      'dateNtime',
      'Date and Time',
      [$this, 'dateNtime_meta_box_callback'],
      'pastperformance',
      'normal',
      'high'
    );

    add_meta_box(
      'location',
      'Location',
      [$this, 'location_meta_box_callback'],
      'pastperformance',
      'normal',
      'high'
    );

    add_meta_box(
      'main_content',
      'Main Content',
      [$this, 'content_meta_box_callback'],
      'pastperformance',
      'normal',
      'high'
    );

    add_meta_box(
      'description',
      'Description',
      [$this, 'description_meta_box_callback'],
      'pastperformance',
      'normal',
      'high'
    );

    add_meta_box(
      'activity',
      'Activity',
      [$this, 'activity_meta_box_callback'],
      'pastperformance',
      'normal',
      'high'
    );

    add_meta_box(
      'images',
      'Images',
      [$this, 'images_meta_box_callback'],
      'pastperformance',
      'normal',
      'high'
    );
  }

  public function category_meta_box_callback($post)
  {
    $value = get_post_meta($post->ID, 'category', true);
?>
    <label for="category">Category</label>
    <input type="text" id="category" name="category" value="<?php echo esc_attr($value); ?>">
  <?php
  }

  public function dateNtime_meta_box_callback($post)
  {
    $value = get_post_meta($post->ID, 'dateNtime', true);
  ?>
    <label for="dateNtime">Date and Time</label>
    <input type="text" id="dateNtime" name="dateNtime" value="<?php echo esc_attr($value); ?>">
  <?php
  }

  public function location_meta_box_callback($post)
  {
    $value = get_post_meta($post->ID, 'location', true);
  ?>
    <label for="location">Location</label>
    <input type="text" id="location" name="location" value="<?php echo esc_attr($value); ?>">
  <?php
  }

  public function content_meta_box_callback($post)
  {
    $value = get_post_meta($post->ID, 'main_content', true);
  ?>
    <label for="main_content">Main Content</label>
    <textarea id="main_content" name="main_content" rows="10" style="width: 100%;"><?php echo esc_textarea($value); ?></textarea>
  <?php
  }

  public function description_meta_box_callback($post)
  {
    $value = get_post_meta($post->ID, 'description', true);
  ?>
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="5" style="width: 100%;"><?php echo esc_textarea($value); ?></textarea>
  <?php
  }

  public function activity_meta_box_callback($post)
  {
    $activity_titles = get_post_meta($post->ID, 'activity_titles', true) ?: [];
    $activity_descriptions = get_post_meta($post->ID, 'activity_descriptions', true) ?: [];
  ?>
    <div id="activity-container">
      <?php foreach ($activity_titles as $index => $title) : ?>
        <div class="activity-item">
          <label for="activity_title_<?php echo $index; ?>">Activity Title</label>
          <input type="text" id="activity_title_<?php echo $index; ?>" name="activity_titles[]" value="<?php echo esc_attr($title); ?>">
          <label for="activity_description_<?php echo $index; ?>">Activity Description</label>
          <textarea id="activity_description_<?php echo $index; ?>" name="activity_descriptions[]"><?php echo esc_textarea($activity_descriptions[$index]); ?></textarea>
          <button type="button" class="remove-activity">Remove</button>
        </div>
      <?php endforeach; ?>
    </div>
    <button type="button" id="add-activity">Add Activity</button>
    <script>
      document.getElementById('add-activity').addEventListener('click', function() {
        var container = document.getElementById('activity-container');
        var index = container.children.length;
        var item = document.createElement('div');
        item.className = 'activity-item';
        item.innerHTML = `
          <label for="activity_title_${index}">Activity Title</label>
          <input type="text" id="activity_title_${index}" name="activity_titles[]">
          <label for="activity_description_${index}">Activity Description</label>
          <textarea id="activity_description_${index}" name="activity_descriptions[]"></textarea>
          <button type="button" class="remove-activity">Remove</button>
        `;
        container.appendChild(item);
        item.querySelector('.remove-activity').addEventListener('click', function() {
          container.removeChild(item);
        });
      });

      document.querySelectorAll('.remove-activity').forEach(function(button) {
        button.addEventListener('click', function() {
          var item = button.parentElement;
          item.parentElement.removeChild(item);
        });
      });
    </script>
  <?php
  }

  public function images_meta_box_callback($post)
  {
    $images = get_post_meta($post->ID, 'images', true) ?: [];
  ?>
    <div id="images-container">
      <ul>
        <?php foreach ($images as $image) : ?>
          <li>
            <img src="<?php echo esc_url($image); ?>" style="max-width: 100px; max-height: 100px;">
            <input type="hidden" name="images[]" value="<?php echo esc_url($image); ?>">
            <button type="button" class="remove-image">Remove</button>
          </li>
        <?php endforeach; ?>
      </ul>
      <button type="button" id="add-image">Add Images</button>
    </div>
    <script>
      jQuery(document).ready(function($) {
        var frame;
        $('#add-image').on('click', function(e) {
          e.preventDefault();
          if (frame) {
            frame.open();
            return;
          }
          frame = wp.media({
            title: 'Select or Upload Images',
            button: {
              text: 'Use these images'
            },
            multiple: true
          });
          frame.on('select', function() {
            var attachments = frame.state().get('selection').toJSON();
            var container = $('#images-container ul');
            attachments.forEach(function(attachment) {
              var item = $('<li>');
              item.append('<img src="' + attachment.url + '" style="max-width: 100px; max-height: 100px;">');
              item.append('<input type="hidden" name="images[]" value="' + attachment.url + '">');
              item.append('<button type="button" class="remove-image">Remove</button>');
              container.append(item);
            });
          });
          frame.open();
        });

        $('#images-container').on('click', '.remove-image', function() {
          $(this).closest('li').remove();
        });
      });
    </script>
<?php
  }

  public function save_meta_boxes($post_id)
  {
    if (array_key_exists('category', $_POST)) {
      update_post_meta($post_id, 'category', sanitize_text_field($_POST['category']));
    }

    if (array_key_exists('dateNtime', $_POST)) {
      update_post_meta($post_id, 'dateNtime', sanitize_text_field($_POST['dateNtime']));
    }

    if (array_key_exists('location', $_POST)) {
      update_post_meta($post_id, 'location', sanitize_text_field($_POST['location']));
    }

    if (array_key_exists('main_content', $_POST)) {
      update_post_meta($post_id, 'main_content', sanitize_textarea_field($_POST['main_content']));
    }

    if (array_key_exists('description', $_POST)) {
      update_post_meta($post_id, 'description', sanitize_textarea_field($_POST['description']));
    }

    if (array_key_exists('activity_titles', $_POST) && array_key_exists('activity_descriptions', $_POST)) {
      $titles = array_map('sanitize_text_field', $_POST['activity_titles']);
      $descriptions = array_map('sanitize_textarea_field', $_POST['activity_descriptions']);
      update_post_meta($post_id, 'activity_titles', $titles);
      update_post_meta($post_id, 'activity_descriptions', $descriptions);
    }

    if (array_key_exists('images', $_POST)) {
      $images = array_map('sanitize_text_field', $_POST['images']);
      update_post_meta($post_id, 'images', $images);
    }
  }
}

new PastPerformancePostType();
