<?php
class activitiesExchangesPT
{
  public function __construct()
  {
    add_action('init', [$this, 'register_post_type']);
    add_action('add_meta_boxes', [$this, 'add_meta_box']);
    add_action('save_post', [$this, 'save_meta_box_data']);
    add_filter('manage_activities_exchanges_posts_columns', [$this, 'add_custom_columns']);
    add_action('manage_activities_exchanges_posts_custom_column', [$this, 'custom_column_content'], 10, 2);
    add_action('admin_menu', [$this, 'add_submenus']);
    add_action('admin_menu', [$this, 'remove_default_submenus'], 999);
    add_action('pre_get_posts', [$this, 'filter_posts_by_project_type']);
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
      [$this, 'render_project_meta_box'],
      'activities_exchanges',
      'side',
      'default'
    );
  }

  public function render_project_meta_box($post)
  {
    $value = get_post_meta($post->ID, '_project_type', true);
    if (empty($value)) {
      $value = 'SDG'; // Set default value to 'SDG'
    }
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

    if (isset($_POST['post_type']) && 'activities_exchanges' == $_POST['post_type']) {
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

  public function add_submenus()
  {
    add_submenu_page(
      'edit.php?post_type=activities_exchanges',
      'SDG Projects',
      'SDG',
      'manage_options',
      'edit.php?post_type=activities_exchanges&project_type=SDG'
    );

    add_submenu_page(
      'edit.php?post_type=activities_exchanges',
      'Study Abroad Projects',
      'Study Abroad',
      'manage_options',
      'edit.php?post_type=activities_exchanges&project_type=Study+Abroad'
    );
  }

  public function remove_default_submenus()
  {
    remove_submenu_page('edit.php?post_type=activities_exchanges', 'post-new.php?post_type=activities_exchanges');
    remove_submenu_page('edit.php?post_type=activities_exchanges', 'edit.php?post_type=activities_exchanges');
  }

  public function filter_posts_by_project_type($query)
  {
    global $pagenow;
    $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';

    if (is_admin() && $pagenow == 'edit.php' && $post_type == 'activities_exchanges' && isset($_GET['project_type'])) {
      $project_type = $_GET['project_type'];
      $meta_query = [
        [
          'key' => '_project_type',
          'value' => $project_type,
          'compare' => '='
        ]
      ];
      $query->set('meta_query', $meta_query);
    }
  }
}

new activitiesExchangesPT();
