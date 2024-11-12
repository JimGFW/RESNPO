<?php

class upcomingEventsPT
{
  public function __construct()
  {
    add_action('init', [$this, 'register_post_type']);
    add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
    add_action('save_post', [$this, 'save_meta_box_data']);
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
  }

  public function upcomingEvents_meta_box_callback($post)
  {
    $event_date = get_post_meta($post->ID, '_event_date', true);

    echo '<label for="event_date">' . __('Event Date', 'textdomain') . '</label>';
    echo '<input type="date" id="event_date" name="event_date" value="' . esc_attr($event_date) . '" />';
  }

  public function save_meta_box_data($post_id)
  {
    if (isset($_POST['event_date'])) {
      $event_date = sanitize_text_field($_POST['event_date']);
      update_post_meta($post_id, '_event_date', $event_date);
    }
  }
}

new upcomingEventsPT();
