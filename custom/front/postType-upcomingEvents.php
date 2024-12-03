<?php

class upcomingEventsPT
{
  public function __construct()
  {
    add_action('init', [$this, 'register_post_type']);
    add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
    add_action('save_post', [$this, 'save_meta_box_data']);
    add_action('admin_menu', [$this, 'add_submenus']);
    add_action('admin_menu', [$this, 'remove_default_submenus'], 999);
    add_action('pre_get_posts', [$this, 'filter_posts_by_project_type']);
  }

  public function register_post_type()
  {
    register_post_type('upcomingEvents', [
      'labels' => [
        'name' => __('Upcoming Events'),
        'singular_name' => __('Upcoming Event'),
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
      'upcomingEvents_meta',
      __('Event Details'),
      [$this, 'upcomingEvents_meta_box_callback'],
      'upcomingEvents',
      'normal',
      'high'
    );

    add_meta_box(
      'project_meta_box',
      'Project Type',
      [$this, 'render_project_meta_box'],
      'upcomingEvents',
      'side',
      'default'
    );
  }

  public function upcomingEvents_meta_box_callback($post)
  {
    $event_date = get_post_meta($post->ID, '_event_date', true);

    echo '<label for="event_date">' . __('Event Date', 'textdomain') . '</label>';
    echo '<input type="date" id="event_date" name="event_date" value="' . esc_attr($event_date) . '" />';
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
    if (isset($_POST['event_date'])) {
      $event_date = sanitize_text_field($_POST['event_date']);
      update_post_meta($post_id, '_event_date', $event_date);
    }

    if (!isset($_POST['project_type_nonce']) || !wp_verify_nonce($_POST['project_type_nonce'], 'save_project_type')) {
      return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return;
    }

    if (isset($_POST['post_type']) && 'upcomingEvents' == $_POST['post_type']) {
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

  public function add_submenus()
  {
    add_submenu_page(
      'edit.php?post_type=upcomingEvents',
      'SDG Projects',
      'SDG',
      'manage_options',
      'edit.php?post_type=upcomingEvents&project_type=SDG'
    );

    add_submenu_page(
      'edit.php?post_type=upcomingEvents',
      'Study Abroad Projects',
      'Study Abroad',
      'manage_options',
      'edit.php?post_type=upcomingEvents&project_type=Study+Abroad'
    );
  }

  public function remove_default_submenus()
  {
    remove_submenu_page('edit.php?post_type=upcomingEvents', 'post-new.php?post_type=upcomingEvents');
    remove_submenu_page('edit.php?post_type=upcomingEvents', 'edit.php?post_type=upcomingEvents');
  }

  public function filter_posts_by_project_type($query)
  {
    global $pagenow;
    $post_type = isset($_GET['post_type']) ? $_GET['post_type'] : '';

    if (is_admin() && $pagenow == 'edit.php' && $post_type == 'upcomingEvents' && isset($_GET['project_type'])) {
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

new upcomingEventsPT();
