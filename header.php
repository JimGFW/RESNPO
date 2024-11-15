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
  <header id="header" class="flx jc-sa global-width">

    <div class="header-container flx fade-down">
      <div class="logo-container">
        <a href="<?= home_url() ?>"><img src="<?= RESNPO_IMAGE . '/res-logo.png' ?>" alt="header-logo"></a>
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
            <a class="dropdown-toggle flx ai-c" href="javascript:void(0);">
              <span>Projects</span>
              <span>
                <?= file_get_contents(RESNPO_SVG . '/chevron-down.svg'); ?>
              </span>
            </a>
            <ul class="dropdown-content">
              <a href="<?= home_url() . '/sdg' ?>">
                <li>SDG</li>
              </a>
              <a href="<?= home_url() . '/study-abroad' ?>">
                <li>Study Abroad</li>
              </a>

            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle flx ai-c" href="javascript:void(0);">
              <span>Join Us</span>
              <span>
                <?= file_get_contents(RESNPO_SVG . '/chevron-down.svg'); ?>
              </span>
            </a>
            <ul class="dropdown-content">
              <a href="<?= home_url() . '/donation' ?>">
                <li>Donation</li>
              </a>
              <a href="<?= home_url() . '/membership' ?>">
                <li>Membership</li>
              </a>
              <a href="<?= home_url() . '/whatsnew' ?>">
                <li>What's New</li>
              </a>
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