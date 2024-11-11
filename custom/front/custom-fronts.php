<?php
function render_about_section($sectiontitle, $subtitle, $img)
{
?>
  <section class="landing-about">
    <div class="landing-fg">
      <img src="<?php echo RESNPO_IMAGE . $img ?>" alt="">
    </div>

    <div class="side-content">
      <div class="social">
        <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=601qwusa">
          <img src="<?php echo RESNPO_IMAGE . '/line.png' ?>" alt="Line">
        </a>
        <a href="https://www.facebook.com/ChiikiKyouiku/">
          <img src="<?php echo RESNPO_IMAGE . '/facebook.png' ?>" alt="Facebook">
        </a>
        <a href="https://www.youtube.com/channel/UCEJ3QcF3DZ9o_MYbhMxgV4Q">
          <img src="<?php echo RESNPO_IMAGE . '/youtube.png' ?>" alt="YouTube">
        </a>
      </div>
      <div class="about-title">
        <div class="side-title">
          <a href="<?php echo get_site_url('/home') ?>"><img class="side-logo" src="<?php echo RESNPO_IMAGE . '/logo.png' ?>" alt=""></a>
          <div class="side-title-text">
            <a href="<?php echo get_site_url('/home') ?>">
              <h1>NPO法人</h1>
              <h3>REGIONAL EDUCATION SUPPORT</h3>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="au-title">
      <h1 class="outline au-main-title scaleIn"><?php echo $sectiontitle; ?></h1>
      <h3 class="au-sub-title sub-head-clr scaleIn">
        <?php echo $subtitle; ?></h3>
    </div>
  </section>
<?php
}




// JOIN US PAGES LANDING
function render_join_landing($pagetitle, $centertitle)
{
?>
  <section class="donation-header">
    <div class="border relative">
      <div class="donation-container slidedown relative">

        <div class="b-titles text-centered">

          <p class="b-title"><?php echo $pagetitle ?></p>
          <p class="b-title"><?php echo $pagetitle ?></p>
          <p class="b-title"><?php echo $pagetitle ?></p>
          <p class="b-title"><?php echo $pagetitle ?></p>
          <p class="b-title"><?php echo $pagetitle ?></p>
          <p class="b-title"><?php echo $pagetitle ?></p>

        </div>
        <div class="header-txt-container absolute">
          <p class="slideleft"><?php echo $centertitle ?></p>
        </div>
        <div class="res-txt-container absolute">
          <ul class="flex gap-15">
            <li>
              <img src="<?php echo RESNPO_URI . '/assets/image/donation/header/resnpo-ico.png' ?>" alt="" />
            </li>
            <li>
              <p class="w-700 p-14 white-clr">NPO法人</p>
              <p class="w-700 p-14 white-clr">REGIONAL EDUCATION SUPPORT</p>
            </li>
          </ul>
        </div>
      </div>
      <div class="social-icons absolute">
        <ul class="social-icons-ul flex align-items-center">
          <li>
            <img
              src="<?php echo RESNPO_URI . '/assets/image/donation/header/sm-line-icon.png' ?>"
              alt="" />
          </li>
          <li>
            <img src="<?php echo RESNPO_URI . '/assets/image/donation/header/sm-fb-icon.png' ?>" alt="" />
          </li>
          <li>
            <img src="<?php echo RESNPO_URI . '/assets/image/donation/header/sm-yt-icon.png' ?>" alt="" />
          </li>
        </ul>
      </div>

    </div>
  </section>

<?php
}


// JOINS US PAGES SECTION 1
function render_join_section1($title, $description, $nextpage)
{

?>
  <section class="section_1_don relative">
    <div class="donation-bottom-container ">
      <div class="donation-bottom-text">
        <p class="w-700 p-40 head-clr scaleIn"><?php echo $title ?></p>
        <p class="w-500 p-20 head-clr">
          <?php echo $description ?>
        </p>
      </div>
      <div class="donation-bottom-donate">
        <p class="w-900 p-100 section-head-clr slideup"><?php echo $nextpage ?></p>
      </div>
    </div>
  </section>
<?php
}

// JOIN US SECTION 3 fieldset
function render_join_section3($pagetitle, $overlaytitle, $fieldset1, $fieldset2, $fieldset3)
{
?>
  <section class="section_3_don">
    <div class="title-top relative">
      <p class="w-500 p-250 text-center relative"><?php echo $pagetitle ?></p>
      <p class="w-900 p-100 light-blue absolute scaleIn"><?php echo $overlaytitle ?></p>
    </div>

    <div class="fieldset-container">
      <ul class="flex">
        <li>
          <fieldset>
            <legend>
              <p class="w-900 p-50 head-clr">01</p>
            </legend>
            <p class="w-500 p-20 head-clr fieldset-text"><?php echo $fieldset1 ?></p>
          </fieldset>
        </li>
        <li>
          <fieldset>
            <legend>
              <p class="w-900 p-50 head-clr">02</p>
            </legend>
            <p class="w-500 p-20 head-clr fieldset-text"><?php echo $fieldset2 ?></p>
          </fieldset>
        </li>
        <li>
          <fieldset>
            <legend>
              <p class="w-900 p-50 head-clr">03</p>
            </legend>
            <p class="w-500 p-20 head-clr fieldset-text"><?php echo $fieldset3 ?></p>
          </fieldset>
        </li>
      </ul>

    </div>
  </section>

<?php
}

// Project Cards
function render_projects_cards($cardTitle, $artTitle, $description, $img, $link)
{
?>
  <section class="section-projects relative">
    <div class="relative projects-container">
      <p class="w-700 white-clr section-title relative slideright"><?php echo $cardTitle ?></p>
      <div class="overlay-arc relative">
        <a href="<?php echo get_site_url() . $link
                  ?>">
          <div class="arc-img-side absolute">
            <img class="" src="<?php echo RESNPO_URI . '/assets/image/project/' . $img ?>" alt="">
          </div>
          <ul class="flex flex-proj-cont">
            <li>
              <p class="w-700 p-70 sub-head-clr scaleIn proj-title"><?php echo $artTitle ?></p>
            </li>
            <li>
              <p class="w-700 p-25 white-clr proj-desc"><?php echo $description ?></p>
              <div class="relative btn-container">
                <button class="main-button relative">
                  <p>詳しく見る</p>
                </button>
                <img
                  class="icon-button absolute"
                  src="<?php echo RESNPO_URI . '/assets/image/homepage/side-section-img.png' ?>"
                  alt="" />
              </div>
            </li>
          </ul>
        </a>
      </div>
    </div>
  </section>
<?php
}


// Feature SDG


function featurefront($feature_location = null)
{
?>
  <section id="features-section" class="features-section">
    <h2 class="feature-section-title">特徴</h2>

    <div class="main-feature-container">
      <div class="feature-card-container">
        <?php
        $featurecontentquery = new WP_Query(
          array(
            'post_type' => 'featuresection',
            'posts_per_page' => -1,
            'meta_query' => array(
              array(
                'key' => 'page_feature',
                'value' => $feature_location,
                'compare' => '='
              )
            )
          )
        );
        if ($featurecontentquery->have_posts()) {
          while ($featurecontentquery->have_posts()) {
            $featurecontentquery->the_post();
            $featuretitle = get_the_title();
            $featureimage = get_the_post_thumbnail_url();
        ?>

            <div class="feature-card">
              <img src="<?php echo $featureimage; ?>" alt="Project Image 1">
              <p class="p-bold-25-white"><?php echo $featuretitle; ?></p>
            </div>

        <?php
          }
          wp_reset_postdata();
        }
        ?>
      </div>
    </div>
  </section>

<?php
}

// Front SDG
function articlefront($articletitle = null, $articlecontent = null, $articleimage = null)
{

?>
  <section class="front-section">
    <div class="front-section-content scaleIn  ">
      <h1>
        <?php echo $articletitle  ?>
      </h1>
      <p class="text-justified">
        <?php echo $articlecontent ?>
    </div>
    <div class="front-section-image slideleft">
      <img src="<?php echo RESNPO_IMAGE . $articleimage ?>" alt="">
    </div>
  </section>
<?php

}

// Flow Studying Abroad
function fsaSlide($slideNumber = null, $slideTitle = null, $slideDesc = null, $slideState = null)
{
?>
  <div class="fsa-slide flex <?php echo $slideState ?>" id="<?php echo "slide-" . $slideNumber ?>">
    <div class="fsa-slide-content flex">
      <div class="fsa-slide-display flex">
        <button class="fsa-nav-button sd_title active" onclick="showSlide(<?php echo $slideNumber - 1; ?>)">
          <?php echo "0" . $slideNumber; ?>
        </button>
        <div class="fsa-slide-title">
          <h3 class="sb_title"><?php echo $slideTitle ?></h3>
        </div>
      </div>
      <div class="fsa-slide-desc">
        <p>
          <?php echo $slideDesc ?>
        </p>
      </div>
    </div>
  </div>
<?php
}


// SGD, Study Abroad, Studying Abroad landing

function landing_sdg_page_template($page_title = null, $vid1, $vid2, $vid3, $vid4)
{
?>
  <section class="sdg-home">
    <div class="bg-border">
      <!-- <header>
        <img src="<?php echo RESNPO_IMAGE . '/menu-button.png' ?>" alt="">
      </header> -->


      <div class="social">
        <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=601qwusa" target="_blank">
          <img src="<?php echo RESNPO_IMAGE . '/line.png' ?>" alt="">
        </a>
        <a href="https://www.facebook.com/ChiikiKyouiku/" target="_blank">
          <img src="<?php echo RESNPO_IMAGE . '/facebook.png' ?>" alt="">
        </a>
        <a href="https://www.youtube.com/channel/UCEJ3QcF3DZ9o_MYbhMxgV4Q" target="_blank">
          <img src="<?php echo RESNPO_IMAGE . '/youtube.png' ?>" alt="">
        </a>
      </div>

      <div class="sdg-title">
        <div class="side-title">
          <a href="<?php echo get_site_url() .  '/home' ?>"><img class="side-logo" src="<?php echo RESNPO_IMAGE . '/logo.png' ?>" alt=""></a>
          <div class="side-title-text">
            <a href="<?php echo get_site_url() .  '/home' ?>">
              <h1>NPO法人</h1>
              <h3>REGIONAL EDUCATION SUPPORT</h3>
            </a>
          </div>
        </div>
        <div class="main-title">
          <!-- Navigation dots -->
          <div class="navigation-dots">
            <!-- Previous arrow -->
            <span class="arrow arrow-left">
              <img src="<?php echo RESNPO_IMAGE . '/arrow-left-white.png' ?>" alt="">
            </span>
            <!-- Dots -->
            <span class="dot active" onclick="setSlide(0)"></span>
            <span class="dot" onclick="setSlide(1)"></span>
            <span class="dot" onclick="setSlide(2)"></span>
            <span class="dot" onclick="setSlide(3)"></span>
            <!-- Next arrow -->
            <span class="arrow arrow-right">
              <img src="<?php echo RESNPO_IMAGE . '/arrow-right-white.png' ?>" alt="">
            </span>
          </div>
          <h1 class="outline"> <?php echo $page_title ?>
          </h1>
        </div>
      </div>
    </div>
    <div class="video-container">
      <video id="background-video" autoplay muted loop>
        <source src="<?php echo RESNPO_IMAGE . '/' . $vid1 . '.mp4' ?>" type="video/mp4">
        Your browser does not support the video tag.
      </video>
    </div>
    <div id="video-paths" data-video1="<?php echo RESNPO_IMAGE . '/' . $vid1 . '.mp4' ?>" data-video2="<?php echo RESNPO_IMAGE . '/' . $vid2 . '.mp4'  ?>" data-video3="<?php echo RESNPO_IMAGE . '/' . $vid3 . '.mp4'  ?>" data-video4="<?php echo RESNPO_IMAGE . '/' . $vid4 . '.mp4'  ?>"></div>
  </section>
<?php
}

// Photo Gallery SDG 
function photogallerysection($gallery_title = null)
{
?>
  <!-- SECTION 4: PHOTO GALLERY -->
  <section class="photo-gallery global-width">
    <div class="photo-gallery-texts">
      <div class="photo-gallery-title slideleft">
        <!-- <img src="<?php //echo RESNPO_IMAGE . '/photo-gallery.png' 
                        ?>" alt="photogal"> -->
        <h2 class="outline-blue">PHOTO<br> GALLERY</h2>
      </div>
      <div class="photo-gallery-content">
        <p class="p-16">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
      </div>
    </div>


    <div class="photo-gallery-images swiper-pg mySwiperpg">
      <div class="gallery-images swiper-wrapper">
        <?php
        $photogallerycontentquery = new WP_Query(
          array(
            'post_type' => 'photo_gallery',
            'posts_per_page' => 1,
            'title' => $gallery_title
          )
        );

        if ($photogallerycontentquery->have_posts()) :
          try {
            while ($photogallerycontentquery->have_posts()) : $photogallerycontentquery->the_post();
              $images = get_post_meta(get_the_ID(), '_photo_gallery_images', true);

              if (!empty($images)) {
                foreach ($images as $image) {
                  $src = esc_url($image);
                  echo '<div class="swiper-slide gallery-images">';
                  echo '<img class="gallery-image" src="' . $src . '" alt="">';
                  echo '</div>';
                }
              } else {
                echo '<div class="error-message">No images found in the gallery: ' . esc_html(get_the_title()) . '</div>';
              }
            endwhile;
            wp_reset_postdata();
          } catch (Exception $e) {
            echo '<div class="error-message">An error occurred: ' . esc_html($e->getMessage()) . '</div>';
          }
        else :
          echo '<div class="error-message">No gallery found with the title: ' . esc_html($gallery_title) . '</div>';
        endif;
        ?>
      </div>
    </div>
  </section>
<?php
}
