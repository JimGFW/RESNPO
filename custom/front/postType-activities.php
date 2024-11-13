<?php

class activitiesPT
{
  public function __construct()
  {
    add_action('init', [$this, 'register_post_type']);
    add_action('add_meta_boxes', [$this, 'add_meta_box']);
    add_action('save_post', [$this, 'save_meta_box_data']);
  }

  public function register_post_type()
  {
    $args = [
      'label' => 'Activities',
      'public' => true,
      'supports' => ['title', 'thumbnail'], // Remove 'editor' to disable the default editor
      'menu_position' => 5,
      'menu_icon' => 'dashicons-calendar-alt',
    ];
    register_post_type('activities', $args);
  }

  public function add_meta_box()
  {
    add_meta_box(
      'activities_meta_box',
      'Activity Details',
      [$this, 'render_meta_box'],
      'activities',
      'normal',
      'high'
    );
  }

  public function render_meta_box($post)
  {
    // Add nonce fields for security
    wp_nonce_field('save_activities_meta_box_data', 'activities_meta_box_nonce');

    // Get the existing values from the database
    $main_detail = get_post_meta($post->ID, '_activities_main_detail', true);
    $supporting_detail = get_post_meta($post->ID, '_activities_supporting_detail', true);

    // Render the text areas
    echo '<label for="activities_main_detail">Main Detail:</label>';
    echo '<textarea id="activities_main_detail" name="activities_main_detail" rows="5" cols="50" style="width:100%;">' . esc_textarea($main_detail) . '</textarea>';

    echo '<label for="activities_supporting_detail">Supporting Detail:</label>';
    echo '<textarea id="activities_supporting_detail" name="activities_supporting_detail" rows="5" cols="50" style="width:100%;">' . esc_textarea($supporting_detail) . '</textarea>';
  }

  public function save_meta_box_data($post_id)
  {
    // Check if our nonce is set and verify it
    if (!isset($_POST['activities_meta_box_nonce']) || !wp_verify_nonce($_POST['activities_meta_box_nonce'], 'save_activities_meta_box_data')) {
      return;
    }

    // Sanitize and save the data for main detail
    if (isset($_POST['activities_main_detail'])) {
      $main_detail = sanitize_textarea_field($_POST['activities_main_detail']);
      update_post_meta($post_id, '_activities_main_detail', $main_detail);
    }

    // Sanitize and save the data for supporting detail
    if (isset($_POST['activities_supporting_detail'])) {
      $supporting_detail = sanitize_textarea_field($_POST['activities_supporting_detail']);
      update_post_meta($post_id, '_activities_supporting_detail', $supporting_detail);
    }
  }
}

new activitiesPT();
