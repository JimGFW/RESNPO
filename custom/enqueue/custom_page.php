<?php

function add_custom_page()
{
  $pages = array(
    array(
      'post_title' => 'Home',
      'post_content' => 'Home',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_type' => 'page',
      'post_name' => 'home'
    ),
    array(
      'post_title' => 'About',
      'post_content' => 'About',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_type' => 'page',
      'post_name' => 'about'
    ),

  );

  foreach ($pages as $page) {
    $existing_page = get_page_by_path($page['post_name']);
    if (is_null($existing_page)) {
      wp_insert_post($page);
    }
  }
  $homepage = get_page_by_path('home');
  update_option('page_on_front', $homepage->ID);
  update_option('show_on_front', 'page');
}


add_action('init', 'add_custom_page');
