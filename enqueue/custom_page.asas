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
    array(
      'post_title' => 'Project',
      'post_content' => 'project',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_type' => 'page',
      'post_name' => 'project'
    ),
    array(
      'post_title' => 'SDG',
      'post_content' => 'SDG',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_type' => 'page',
      'post_name' => 'sdg'
    ),
    array(
      'post_title' => 'Join Us',
      'post_content' => 'joinus',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_type' => 'page',
      'post_name' => 'joinus'
    ),
    array(
      'post_title' => 'Donation',
      'post_content' => 'donation',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_type' => 'page',
      'post_name' => 'donation'
    ),
    array(
      'post_title' => 'Membership',
      'post_content' => 'membership',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_type' => 'page',
      'post_name' => 'membership'
    ),
    // array(
    //   'post_title' => 'What\'s New',
    //   'post_content' => 'wahtsnew',
    //   'post_status' => 'publish',
    //   'post_author' => 1,
    //   'post_type' => 'page',
    //   'post_name' => 'whatsnew'
    // ),
    array(
      'post_title' => 'Study Abroad',
      'post_content' => 'Study Abroad',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_type' => 'page',
      'post_name' => 'study-abroad'
    ),
    array(
      'post_title' => 'Studying Abroad',
      'post_content' => 'Studying Abroad',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_type' => 'page',
      'post_name' => 'studying-abroad'
    ),
    array(
      'post_title' => 'Contact',
      'post_content' => 'Contact',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_type' => 'page',
      'post_name' => 'contact'
    ),
    array(
      'post_title' => 'Privacy Policy',
      'post_content' => 'Privacy Policy',
      'post_status' => 'publish',
      'post_author' => 1,
      'post_type' => 'page',
      'post_name' => 'privacy'
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
