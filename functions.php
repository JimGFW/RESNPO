<?php
// Define constants for directories and URLs
define("RESNPO_DIR", get_template_directory());
define("RESNPO_URI", get_template_directory_uri());
define("RESNPO_ASSET", RESNPO_URI . "/assets");
define("RESNPO_JS", RESNPO_ASSET . "/js");
define("RESNPO_IMAGE", RESNPO_ASSET . '/image');
define("RESNPO_SVG", RESNPO_ASSET . '/svg');
define('RESNPO_CSS', RESNPO_ASSET . '/css');



function auto_enqueue_assets()
{
  $css_dir = RESNPO_DIR . '/assets/css';
  $js_dir = RESNPO_DIR . '/assets/js';

  $css_url = RESNPO_CSS;
  $js_url = RESNPO_JS;
  if (is_dir($css_dir)) {
    foreach (glob($css_dir . '/*.css') as $css_file) {
      $filename = basename($css_file);
      $version = filemtime($css_file);
      wp_enqueue_style($filename, $css_url . '/' . $filename, array(), $version);
    }
  }

  if (is_dir($js_dir)) {
    foreach (glob($js_dir . '/*.js') as $js_file) {
      $filename = basename($js_file);
      $version = filemtime($js_file);
      wp_enqueue_script($filename, $js_url . '/' . $filename, array(), $version, true);
    }
  }
}

add_action('wp_enqueue_scripts', 'auto_enqueue_assets');
function theme_setup()
{
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

function theme_add_elementor_support()
{
  add_post_type_support('editorial', 'elementor');
}
add_action('init', 'theme_add_elementor_support');


function truncate_text($text, $limit)
{
  if (mb_strlen($text) > $limit) {
    return mb_substr($text, 0, $limit) . '...';
  } else {
    return $text;
  }
}
// Include custom main.php file
require_once(RESNPO_DIR . '/custom/main.php');
