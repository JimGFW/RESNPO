<?php
class BlogNewsMetabox
{
  public function __construct()
  {
    add_action('add_meta_boxes', [$this, 'add_blog_post_date']);
    add_action('save_post', [$this, 'save_meta_boxes']);
  }

  public function add_meta_boxes()
  {

    add_blog_post_date(
      'monthyear',
      __('Month and Year', 'textdomain'),
      [$this, 'monthyear_meta_box_callback'],
      'post',
      'normal',
      'high'
    );
  }

  public function save_meta_boxes($post_id)
  {
    if (array_key_exists('monthyear', $_POST)) {
      update_post_meta($post_id, 'monthyear', sanitize_text_field($_POST['monthyear']));
    }

    if (array_key_exists('monthday', $_POST)) {
      update_post_meta($post_id, 'monthday', sanitize_text_field($_POST['monthday']));
    }
  }

  public function monthyear_meta_box_callback($post)
  {
    $monthyear = get_post_meta($post->ID, 'monthyear', true);
?>
    <label for="monthyear">Month and Year</label>
    <input type="text" id="monthyear" name="monthyear" value="<?php echo $monthyear; ?>">
  <?php
  }

}


new BlogNewsMetabox();
