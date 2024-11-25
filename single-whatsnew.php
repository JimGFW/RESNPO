<?php get_header(); ?>
<section id="news" class=" newsPage header-height">
  <section class="news-container">
    <div class="global-width">
      <div class="landing-container">
        <div class="cover-image">
          <img class="news-img" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
        </div>
        <div class="news-content">
          <div class="event-date whatsnew-date">
            <p class="the-date"><?= esc_html(get_the_date()) ?></p>
          </div>
          <h1 class="the-title"><?= esc_html(get_the_title()) ?></h1>
          <p class="the-excerpt"><?= esc_html(the_excerpt()) ?></p>
        </div>
      </div>
    </div>
  </section>





</section>
<?php get_footer(); ?>