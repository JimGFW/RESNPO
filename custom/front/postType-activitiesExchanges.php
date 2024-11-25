<?php
class activitiesExchangesPT
{
  public function __construct()
  {
    add_action('init', [$this, 'register_post_type']);
    add_action('add_meta_boxes', [$this, 'add_meta_box']);
    add_action('save_post', [$this, 'save_meta_box_data']);
    add_filter('manage_activitiesExchanges_posts_columns', [$this, 'add_custom_columns']);
    add_action('manage_activitiesExchanges_posts_custom_column', [$this, 'custom_column_content'], 10, 2);
  }

  public function register_post_type()
  {
    $args = [
      'label' => 'SDG Exchanges',
      'public' => true,
      'supports' => ['title', 'thumbnail', 'editor'],
      'menu_position' => 5,
      'menu_icon' => 'dashicons-calendar-alt',
    ];
    register_post_type('activities_exchanges', $args);
  }

  public function add_meta_box()
  {
    add_meta_box(
      'project_meta_box',
      'Project Type',
      [$this, 'render_meta_box'],
      'activitiesExchanges',
      'side',
      'default'
    );
  }

  public function render_meta_box($post)
  {
    $value = get_post_meta($post->ID, '_project_type', true);
    wp_nonce_field('save_project_type', 'project_type_nonce');
?>
    <label for="project_type">Select Project Type:</label>
    <select name="project_type" id="project_type">
      <option value="SDG" <?php selected($value, 'SDG'); ?>>SDG</option>
      <option value="Study Abroad" <?php selected($value, 'Study Abroad'); ?>>Study Abroad</option>
    </select>
<?php
  }

  public function save_meta_box_data($post_id)
  {
    if (!isset($_POST['project_type_nonce']) || !wp_verify_nonce($_POST['project_type_nonce'], 'save_project_type')) {
      return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return;
    }

    if (isset($_POST['post_type']) && 'activitiesExchanges' == $_POST['post_type']) {
      if (!current_user_can('edit_post', $post_id)) {
        return;
      }
    }

    if (!isset($_POST['project_type'])) {
      return;
    }

    $project_type = sanitize_text_field($_POST['project_type']);
    update_post_meta($post_id, '_project_type', $project_type);
  }

  public function add_custom_columns($columns)
  {
    $columns['project_type'] = 'Project Type';
    return $columns;
  }

  public function custom_column_content($column, $post_id)
  {
    if ($column == 'project_type') {
      $project_type = get_post_meta($post_id, '_project_type', true);
      echo esc_html($project_type);
    }
  }
}

new activitiesExchangesPT();
