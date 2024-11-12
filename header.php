<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('-', true, 'right') ?></title>
  <?php wp_head() ?>
</head>

<body>
  <!-- data-aos="fade-up"
  data-aos-anchor-placement="top-bottom" -->
  <header id="header" class="flx jc-sa global-width header-animate">

    <div class="header-container flx p-0_5">
      <div class="logo-container p-0_5">
        <img src="<?= RESNPO_IMAGE . '/res-logo.png' ?>" alt="header-logo">
      </div>
      <nav class="nav-menu flx">
        <ul class="flx">
          <li>
            <a href="<?= home_url() ?>">Home</a>
          </li>
          <li>
            <a href="<?= home_url('/about') ?>">About Us</a>
          </li>
          <li class="dropdown">
            <a class="flx ai-c" href="#">
              <span>Projects</span>
              <span>
                <?= file_get_contents(RESNPO_SVG . '/chevron-down.svg'); ?>
              </span>
            </a>
            <ul class="dropdown-content">
              <li><a href="<?= home_url() . '/sdg' ?>">SDG</a></li>
              <li><a href="<?= home_url() . '/study-abroad' ?>">Study Abroad</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a
              class="flx ai-c"
              href="#">
              <span>Join Us</span>
              <span>
                <?= file_get_contents(RESNPO_SVG . '/chevron-down.svg'); ?>
              </span>
            </a>
            <ul class="dropdown-content">
              <li><a href="<?= home_url() . '/donation' ?>">Donation</a></li>
              <li><a href="<?= home_url() . '/membership' ?>">Membership</a></li>
              <li><a href="<?= home_url() . '/whatsnew' ?>">What's New</a></li>
            </ul>
          </li>
          <li>
            <a href="<?= home_url() . '/corporate' ?>">Corporate/School</a>
          </li>
          <li id="contact" class="contact-us">
            <a class="flx jc-c ai-c" href="<?= home_url() . '/contact' ?>">
              <span>Contact Us</span>
              <span>
                <?= file_get_contents(RESNPO_SVG . '/tel.svg'); ?>
              </span>
            </a>
        </ul>
      </nav>
    </div>
  </header>
  <main>