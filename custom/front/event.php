<?php
class UpcomingEventsPostType
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
      'name' => _x('Upcoming Events', 'Post Type General Name', 'textdomain'),
      'singular_name' => _x('Upcoming Event', 'Post Type Singular Name', 'textdomain'),
      'menu_name' => __('Upcoming Events', 'textdomain'),
      'name_admin_bar' => __('Upcoming Event', 'textdomain'),
    ];

    $args = [
      'label' => __('Upcoming Event', 'textdomain'),
      'labels' => $labels,
      'supports' => ['title', 'editor', 'thumbnail'],
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-calendar-alt',
    ];

    register_post_type('upcomingevent', $args);
  }
  public function add_meta_boxes()
  {

    add_meta_box(
      'subdescription',
      __('Sub Description', 'textdomain'),
      [$this, 'sub_description_meta_box_callback'],
      'upcomingevent',
      'normal',
      'high'
    );

    add_meta_box(
      'monthyear',
      __('Month and Year', 'textdomain'),
      [$this, 'monthyear_meta_box_callback'],
      'upcomingevent',
      'normal',
      'high'
    );

    add_meta_box(
      'monthday',
      __('Month and Day', 'textdomain'),
      [$this, 'monthday_meta_box_callback'],
      'upcomingevent',
      'normal',
      'high'
    );
  }

  public function save_meta_boxes($post_id)
  {
    if (array_key_exists('subdescription', $_POST)) {
      update_post_meta($post_id, 'subdescription', sanitize_text_field($_POST['subdescription']));
    }

    if (array_key_exists('monthyear', $_POST)) {
      update_post_meta($post_id, 'monthyear', sanitize_text_field($_POST['monthyear']));
    }

    if (array_key_exists('monthday', $_POST)) {
      update_post_meta($post_id, 'monthday', sanitize_text_field($_POST['monthday']));
    }
  }

  public function sub_description_meta_box_callback($post)
  {
    $subdescription = get_post_meta($post->ID, 'subdescription', true);
?>
    <label for="subdescription">Sub Description</label>
    <input type="text" id="subdescription" name="subdescription" value="<?php echo $subdescription; ?>">
  <?php
  }

  public function monthyear_meta_box_callback($post)
  {
    $monthyear = get_post_meta($post->ID, 'monthyear', true);
  ?>
    <label for="monthyear">Month and Year</label>
    <input type="text" id="monthyear" name="monthyear" value="<?php echo $monthyear; ?>">
  <?php
  }

  public function monthday_meta_box_callback($post)
  {
    $monthday = get_post_meta($post->ID, 'monthday', true);
  ?>
    <label for="monthday">Month and Day</label>
    <input type="text" id="monthday" name="monthday" value="<?php echo $monthday; ?>">
<?php
  }
}


new UpcomingEventsPostType();
