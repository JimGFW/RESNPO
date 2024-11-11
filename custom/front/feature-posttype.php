<?php
class FeatureSectionPostType
{
  public function __construct()
  {
    add_action('init', [$this, 'register_post_type']);
    add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
    add_action('save_post', [$this, 'save_meta_boxes']);
    add_filter('manage_featuresection_posts_columns', [$this, 'set_custom_columns']);
    add_action('manage_featuresection_posts_custom_column', [$this, 'custom_column'], 10, 2);
  }

  public function register_post_type()
  {
    $labels = [
      'name' => _x('Feature Sections', 'Post Type General Name', 'textdomain'),
      'singular_name' => _x('Feature Section', 'Post Type Singular Name', 'textdomain'),
      'menu_name' => __('Feature Sections', 'textdomain'),
      'name_admin_bar' => __('Feature Section', 'textdomain'),
    ];

    $args = [
      'label' => __('Feature Section', 'textdomain'),
      'labels' => $labels,
      'supports' => ['title', 'editor', 'thumbnail'],
      'public' => true,
      'has_archive' => true,
      'show_in_rest' => true,
      'menu_icon' => 'dashicons-star-filled',
    ];

    register_post_type('featuresection', $args);
  }

  public function add_meta_boxes()
  {
    add_meta_box(
      'page_feature',
      'Page Feature',
      [$this, 'page_feature_meta_box_callback'],
      'featuresection',
      'normal',
      'high'
    );
  }

  public function page_feature_meta_box_callback($post)
  {
    $value = get_post_meta($post->ID, 'page_feature', true);
?>
    <label for="page_feature">Page Feature</label>
    <input type="text" id="page_feature" name="page_feature" value="<?php echo $value; ?>">
<?php
  }

  public function save_meta_boxes($post_id)
  {
    if (array_key_exists('page_feature', $_POST)) {
      update_post_meta($post_id, 'page_feature', sanitize_text_field($_POST['page_feature']));
    }
  }

  public function set_custom_columns($columns)
  {
    $columns['page_feature'] = __('Page Feature', 'textdomain');
    return $columns;
  }

  public function custom_column($column, $post_id)
  {
    switch ($column) {
      case 'page_feature':
        $page_feature = get_post_meta($post_id, 'page_feature', true);
        echo $page_feature ? esc_html($page_feature) : __('N/A', 'textdomain');
        break;
    }
  }
}

new FeatureSectionPostType();
