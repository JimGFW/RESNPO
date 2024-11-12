<?php get_header(); ?>

<section id="homepage">

  <section class="home_landing d-none">
    <div class="home-container">
      <div class="bg-container">
        <div class="home-bg">
          <img src="<?= RESNPO_IMAGE . '/bg1.png' ?>" alt="bg1">
        </div>
        <div class="home-bg">
          <img src="<?= RESNPO_IMAGE . '/bg2.png' ?>" alt="bg2">
        </div>
        <div class="home-bg">
          <img src="<?= RESNPO_IMAGE . '/bg3.png' ?>" alt="">
        </div>
        <div class="home-bg">
          <img src="<?= RESNPO_IMAGE . '/bg4.png' ?>" alt="bg3">
        </div>
      </div>

      <div class="home-content">
        <h2>Fostering human resources who can think and act on their own.</h2>
        <h1>自ら考え行動できる人材の育成 </h1>
      </div>
    </div>
  </section>



  <section id="upcoming_events">
    <div class="uc-container">
      <?php section_title('Upcoming Events') ?>
      <?php
      $events_args = array(
        'post_type' => 'upcomingEvents',
        'posts_per_page' => 3,
        'order' => 'ASC',
        'orderby' => 'date'
      );

      $events = new WP_Query($events_args);
      ?>

      <div class="events-slider">
        <?php if ($events->have_posts()) : ?>
          <?php while ($events->have_posts()) : $events->the_post(); ?>
            <div class="event-card">
              <div class="event-image">
                <img src="<?= esc_url(get_the_post_thumbnail_url()) ?>" alt="event">
              </div>
              <div class="event-content">
                <?php
                $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                if ($event_date) :
                ?>
                  <div class="event-date">
                    <p>WHEN: <?= esc_html($event_date) ?></p>
                  </div>
                <?php endif; ?>
                <div class="flx-row event-caption">
                  <div class="title-content">
                    <h3><?= esc_html(get_the_title()) ?></h3>
                    <p><?= esc_html(get_the_excerpt()) ?></p>
                  </div>
                  <button class="button-style-reset brown-play" type="button">
                    <span> <?= file_get_contents(RESNPO_SVG . '/play-brown.svg') ?>
                    </span>
                  </button>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>

    </div>
  </section>

  <section id="whatsnew">
    <div class="whatsnew-container">
      <?php section_title("What's New") ?>

      <?php
      $whatsnew_args = array(
        'post_type' => 'whatsNew',
        'posts_per_page' => 5,
        'order' => 'ASC',
        'orderby' => 'date'
      );

      $whatsnew = new WP_Query($whatsnew_args);
      ?>

      <div class="news-list flx-col">
        <?php
        if ($whatsnew->have_posts()) :
          $most_recent_post_id = $whatsnew->posts[0]->ID;
          while ($whatsnew->have_posts()) : $whatsnew->the_post();
        ?>
            <div class="news-card flx">
              <div class="news-thumbnail">
                <img src="<?= esc_url(get_the_post_thumbnail_url()) ?>" alt="news">
              </div>
              <div class="flx-row ai-c">
                <div class="news-content">
                  <?php if (get_the_ID() == $most_recent_post_id) : ?>
                    <span class="new-tag">NEW</span>
                  <?php endif; ?>
                  <div class="event-date whatsnew-date">
                    <p class="the-date"><?= esc_html(get_the_date()) ?></p>
                  </div>
                  <h3 class="the-title"><?= esc_html(get_the_title()) ?></h3>
                  <p class="the-excerpt"><?= esc_html(get_the_excerpt()) ?></p>
                </div>
                <div class="news-redirect">
                  <a href="<?= esc_url(get_the_permalink()) ?>">
                    <img src="<?= RESNPO_IMAGE . '/link-out.png' ?>" alt="">
                  </a>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section id="adviser">
    <div class="adviser-container">
      <div class="global-width">
        <?php section_title('Advisor') ?>
        <div class="adviser-content flx">
          <div class="adviser-col-wrapper">
            <div class="adviser-img">
              <img src="<?= RESNPO_IMAGE . '/home/adviser.png' ?>" alt="adviser">
            </div>
            <div class="adviser-description">
              <h3>MARIA JADE CATALAN-OPULENCIA, PhD </h3>
              <p class="span-subtitle">特別顧問</p>
              <button type="button" class="long-button">
                <p class="ai-c flx jc-sb">プロフィールを見る
                  <span> <?= file_get_contents(RESNPO_SVG . '/play.svg') ?>
                </p>
                </span>
              </button>
            </div>
          </div>

          <div class="adviser-credentials flx-col">
            <div data-aos="fade-right" class="credential-card flx">
              <div class="cred-image">
                <img src="<?= RESNPO_IMAGE . '/home/ucam.png' ?>" alt="ucam">
              </div>
              <div>
                <h3>ムルシア・カトリック大学（スペイン）</h3>
                <p>副学長-教務担当 </p>
              </div>
            </div>
            <div data-aos="fade-right" class="credential-card flx">
              <div class="cred-image"><img src="<?= RESNPO_IMAGE . '/home/liverpool.png' ?>" alt="liverpool"></div>
              <div>
                <h3>博士号（PhD）</h3>
                <p>リバプール大学　 • 経営学/人事管理/情報学 </p>
              </div>
            </div>
            <div data-aos="fade-right" class="credential-card flx">
              <div class="cred-image"><img src="<?= RESNPO_IMAGE . '/home/iba.png' ?>" alt="iba"></div>
              <div>
                <h3>博士号（PhD）</h3>
                <p>国際経営学・経済学アカデミー　経営学</p>
              </div>
            </div>
            <div data-aos="fade-right" class="credential-card flx">
              <div class="cred-image"><img src="<?= RESNPO_IMAGE . '/home/up.png' ?>" alt="up"></div>
              <div>
                <h3>経営学修士</h3>
                <p>フィリピン大学　公共経営 </p>
              </div>
            </div>
            <div data-aos="fade-right" class="credential-card flx">
              <div class="cred-image"><img src="<?= RESNPO_IMAGE . '/home/up.png' ?>" alt="up"></div>
              <div>
                <h3>経営学修士</h3>
                <p>フィリピン大学　マーケティング </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </main>

  </section>


</section>

</main>
</body>

</html>
<?php get_footer(); ?>