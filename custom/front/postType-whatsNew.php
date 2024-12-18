<?php
class whatsnewPostType
{
  public function __construct()
  {
    add_action('init', array($this, 'register_post_type'));
    add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
    add_action('save_post', [$this, 'save_meta_box_data']);
  }

  public function register_post_type()
  {
    register_post_type('whatsNew', [
      'labels' => [
        'name' => __("What's New"),
        'singular_name' => __("What's New"),
      ],
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-calendar-alt',
      'supports' => ['title', 'editor', 'thumbnail'],
    ]);
  }

  public function add_meta_boxes()
  {
    add_meta_box(
      'whatsnew_date',
      'What\'s New Date',
      [$this, 'whatsnew_date_meta_box_callback'],
      'whatsnew',
      'normal',
      'high'
    );
  }

  public function whatsnew_date_meta_box_callback($post)
  {
    wp_nonce_field('save_whatsnew_date', 'whatsnew_date_nonce');
    $date = get_post_meta($post->ID, '_whatsnew_date', true);
?>
    <label for="whatsnew_date">What's New Date</label>
    <input type="date" id="whatsnew_date" name="whatsnew_date" value="<?php echo $date; ?>">
<?php
  }

  public function save_meta_box_data($post_id)
  {
    if (array_key_exists('whatsnew_date', $_POST)) {
      update_post_meta($post_id, '_whatsnew_date', sanitize_text_field($_POST['whatsnew_date']));
    }
  }
}

new whatsnewPostType();
