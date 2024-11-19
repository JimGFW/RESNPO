<!DOCTYPE html>
<html lang="<?php echo get_bloginfo('lang'); ?>">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php
    wp_title('-', true, 'right');
    bloginfo('name');
    ?>
  </title>

  <?php wp_head() ?>
</head>

<body>
  <header id="header" class="flx jc-sa">

    <div class="header-container flx fade-down">
      <div class="logo-container flx ai-c">
        <a href="<?= site_url() ?>"><img src="<?= RESNPO_IMAGE . '/res-logo.png' ?>" alt="header-logo"></a>
      </div>
      <nav class="nav-menu flx">
        <ul class="flx">
          <li class="<?php if (is_page('home')) echo 'nav-active'; ?>">
            <a href="<?= site_url() ?>">Home</a>
          </li>
          <li class="<?php if (is_page('about')) echo 'nav-active'; ?>">
            <a href="<?= site_url('/about') ?>">About Us</a>
          </li>
          <li class="dropdown <?php if (is_page('sdg') || is_page('study-abroad')) echo 'nav-active'; ?>">
            <a class="dropdown-toggle flx ai-c" href="javascript:void(0);">
              <span>Projects</span>
              <span>
                <?= SVG_chev_down ?>
              </span>
            </a>
            <ul class="dropdown-content">
              <a href="<?= site_url() . '/sdg' ?>">
                <li>SDG</li>
                <span><?= SVG_play_brown_xs ?></span>
              </a>
              <hr>
              <a href="<?= site_url() . '/study-abroad' ?>">
                <li>Study Abroad</li>
                <span><?= SVG_play_brown_xs ?></span>
              </a>
            </ul>
          </li>
          <li class="dropdown <?php if (is_page('donation') || is_page('membership') || is_page('whatsnew')) ?>">
            <a class="dropdown-toggle flx ai-c" href="javascript:void(0);">
              <span>Join Us</span>
              <span>
                <?= SVG_chev_down ?>
              </span>
            </a>
            <ul class="dropdown-content">
              <a href="<?= site_url() . '/donation' ?>">
                <li>Donation</li>
                <span><?= SVG_play_brown_xs ?></span>
              </a>
              <a href="<?= site_url() . '/membership' ?>">
                <li>Membership</li>
                <span><?= SVG_play_brown_xs ?></span>
              </a>
              <a href="<?= site_url() . '/whatsnew' ?>">
                <li>What's New</li>
                <span><?= SVG_play_brown_xs ?></span>
              </a>
            </ul>
          </li>
          <li class="<?php if (is_page('corporate')) echo 'nav-active'; ?>">
            <a href="<?= site_url() . '/corporate' ?>">Corporate/School</a>
          </li>
        </ul>
        <ul class="flx">
          <li id="contact" class="contact-us <?php if (is_page('contact')) ?>">
            <a class="flx jc-c ai-c" href="<?= site_url() . '/contact' ?>">
              <span>Contact Us</span>
              <span>
                <?= SVG_tel ?>
              </span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <main>