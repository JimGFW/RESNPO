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

// footer copyright
add_filter('widget_text', 'do_shortcode');

function year_shortcode()
{
  $year = date_i18n('Y');
  return $year;
}
add_shortcode('year', 'year_shortcode');

// hide admin bar
add_filter('show_admin_bar', '__return_false');


// Include custom main.php file
require_once(RESNPO_DIR . '/custom/main.php');




// contact

// Add this to functions.php
function log_email_error($to, $subject, $message, $headers, $error = null)
{
  $upload_dir = wp_upload_dir();
  $log_dir = $upload_dir['basedir'] . '/contact-form-logs';

  // Create logs directory if it doesn't exist
  if (!file_exists($log_dir)) {
    wp_mkdir_p($log_dir);
  }

  $log_file = $log_dir . '/email-errors.log';
  $time = current_time('mysql');

  $log_message = "====================\n";
  $log_message .= "Time: $time\n";
  $log_message .= "To: $to\n";
  $log_message .= "Subject: $subject\n";
  $log_message .= "Headers: " . print_r($headers, true) . "\n";
  $log_message .= "Message: $message\n";
  if ($error) {
    $log_message .= "Error: " . print_r($error, true) . "\n";
  }
  $log_message .= "PHP Mailer Error: " . print_r($GLOBALS['phpmailer']->ErrorInfo ?? 'No specific error', true) . "\n";
  $log_message .= "====================\n\n";

  error_log($log_message, 3, $log_file);
}

function handle_contact_form_submission()
{
  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    // Verify nonce for security
    if (!isset($_POST['contact_form_nonce']) || !wp_verify_nonce($_POST['contact_form_nonce'], 'contact_form_submit')) {
      $redirect_url = add_query_arg('contact-error', 'nonce', get_permalink());
      wp_redirect($redirect_url);
      exit;
    }

    // Validate required fields
    $required_fields = ['name', 'email', 'phone', 'inquiry'];
    $errors = [];

    foreach ($required_fields as $field) {
      if (empty($_POST[$field])) {
        $errors[] = $field;
      }
    }

    if (!empty($errors)) {
      $redirect_url = add_query_arg([
        'contact-error' => 'validation',
        'fields' => implode(',', $errors)
      ], get_permalink());
      wp_redirect($redirect_url);
      exit;
    }

    // Get and sanitize form data
    $company = sanitize_text_field($_POST['company']);
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $inquiry = sanitize_textarea_field($_POST['inquiry']);

    // Validate email format
    if (!is_email($email)) {
      $redirect_url = add_query_arg('contact-error', 'email', get_permalink());
      wp_redirect($redirect_url);
      exit;
    }

    // Prepare email content
    $to = get_option('admin_email');
    $subject = '【お問い合わせ】' . $name . 'さまよりお問い合わせ';

    // Create HTML message
    $message = '
        <html>
        <head>
            <style>
                body { font-family: "Helvetica Neue", Arial, sans-serif; }
                .container { max-width: 600px; margin: 0 auto; }
                .field { margin-bottom: 20px; }
                .label { font-weight: bold; }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>新しいお問い合わせが届きました</h2>
                <div class="field">
                    <div class="label">会社名/組織名:</div>
                    <div>' . esc_html($company) . '</div>
                </div>
                <div class="field">
                    <div class="label">お名前:</div>
                    <div>' . esc_html($name) . '</div>
                </div>
                <div class="field">
                    <div class="label">メールアドレス:</div>
                    <div>' . esc_html($email) . '</div>
                </div>
                <div class="field">
                    <div class="label">電話番号:</div>
                    <div>' . esc_html($phone) . '</div>
                </div>
                <div class="field">
                    <div class="label">お問い合わせ内容:</div>
                    <div>' . nl2br(esc_html($inquiry)) . '</div>
                </div>
            </div>
        </body>
        </html>';

    // Email headers
    $headers = array(
      'Content-Type: text/html; charset=UTF-8',
      'From: ' . $name . ' <' . $email . '>',
      'Reply-To: ' . $email
    );

    // Debug information before sending
    log_email_error($to, $subject, $message, $headers, 'Pre-send debug info');

    // Hook before email is sent
    add_action('wp_mail_failed', function ($error) use ($to, $subject, $message, $headers) {
      log_email_error($to, $subject, $message, $headers, $error);
    });

    // Send email
    $mail_sent = wp_mail($to, $subject, $message, $headers);

    if ($mail_sent) {
      // Log successful send
      log_email_error($to, $subject, $message, $headers, 'Email sent successfully');
      $redirect_url = add_query_arg('contact', 'success', get_permalink());
    } else {
      // Log failure
      log_email_error($to, $subject, $message, $headers, 'Failed to send email');
      $redirect_url = add_query_arg('contact-error', 'mail', get_permalink());
    }

    wp_redirect($redirect_url);
    exit;
  }
}
add_action('init', 'handle_contact_form_submission');

// Add this to help diagnose SMTP issues
add_action('phpmailer_init', function ($phpmailer) {
  log_email_error(
    $phpmailer->Host,
    'PHPMailer Configuration',
    '',
    '',
    array(
      'Host' => $phpmailer->Host,
      'Port' => $phpmailer->Port,
      'SMTPAuth' => $phpmailer->SMTPAuth,
      'SMTPSecure' => $phpmailer->SMTPSecure
    )
  );
});
