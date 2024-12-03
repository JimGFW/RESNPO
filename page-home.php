<?php get_header(); ?>

<section id="homepage" class="homepage header-height">
  <section class="home_landing">
    <div class="home-container ">
      <div class="flx-row home-card-wrapper">

        <div class="home-card first-col fade-left delay_200">
          <div class="image-container">
            <img src="<?= RESNPO_IMAGE . '/bg1.png' ?>" alt="bg">
          </div>
          <div class="text-container flx-col">
            <h2>Fostering human resources who can think and act on their own.</h2>
            <h1>自ら考え行動できる人材の育成</h1>
          </div>
        </div>

        <div class="flx-col second-col fade-left delay_400">
          <div class="home-card">
            <div class="image-container">
              <img src="<?= RESNPO_IMAGE . '/bg2.png' ?>" alt="bg">
              <div class="text-container flx-col">
                <h2>About Us</h2>
                <h1>ひとりでも多くの子どもたちが、
                  未来の可能性を芸術で表現できる社会を目指して</h1>
                <div>
                  <a href="<?= site_url() . '/about' ?>">
                    <button type="button" class="button button--x-short c-black bg-white">
                      <p class="ai-c flx jc-sb">詳しく見る
                        <span> <?= SVG_redirect ?>
                      </p>
                      </span>
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div class="home-card" data-aos-delay=" 300">
            <div class="image-container">
              <img src="<?= RESNPO_IMAGE . '/bg3.png' ?>" alt="bg">
              <div class="text-container flx-col">
                <h2>Projects</h2>
                <h1>「SDGs甲子園」の過去実績 をご 紹介します。</h1>
                <div>
                  <a href="<?= site_url() . '/projects' ?>">
                    <button type="button" class="button button--x-short c-black bg-white">
                      <p class="ai-c flx jc-sb">詳しく見る
                        <span> <?= SVG_redirect ?>
                      </p>
                      </span>
                    </button>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
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
          <?php
          $delay = 0;
          while ($events->have_posts()) : $events->the_post();
            $delay += 100;
          ?>
            <div class="event-card" data-aos="fade-left" data-aos-delay="<?= $delay ?>">
              <a href="#"
                class="event-link"
                onclick="openModalUE('<?= esc_url(get_the_post_thumbnail_url()) ?>', '<?= esc_attr(get_the_title()) ?>', '<?= esc_attr(get_the_excerpt()) ?>'); return false;">
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
                      <span><?= SVG_play_brown ?></span>
                    </button>
                  </div>
                </div>
              </a>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- Add this modal HTML outside your loop, before closing body -->
  <div id="customLightbox" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>

      <img id="modalImage" src="" alt="">
      <div class="modal-caption">
        <h3 id="modalTitle"></h3>
        <p id="modalDescription"></p>
      </div>
    </div>
  </div>


  <section id="activities">
    <div class="activities-container" data-aos="fade-up">
      <div class="act-top-content">
        <div class="flx-row jc-sb ai-c">
          <div class="activities-section-title">
            <h1>Our <br>Activities</h1>
          </div>
          <div class="activities-section-description flx-col">
            <h3 data-activity-title></h3>
            <p data-activity-detail></p>
          </div>
        </div>
      </div>
      <div class="activities-slider" data-aos="fade-right">
        <div class="activities-slider-wrapper">
          <?php
          $activities_args = array(
            'post_type' => 'activities',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'date'
          );

          $activities = new WP_Query($activities_args);

          if ($activities->have_posts()) :
            while ($activities->have_posts()) : $activities->the_post();
              $activity_detail = get_post_meta(get_the_ID(), '_activities_main_detail', true);
              $supporting_detail = get_post_meta(get_the_ID(), '_activities_supporting_detail', true);
              $activity_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
          ?>
              <div class="activities-banner" data-title="<?php the_title(); ?>" data-detail="<?php echo esc_html($activity_detail); ?>">
                <div class="supporting-detail flx">
                  <?php echo esc_html($supporting_detail); ?>
                </div>
                <img src="<?php echo esc_url($activity_image); ?>" alt="<?php the_title(); ?>">
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>


  <section id="whatsnew">
    <div class="whatsnew-container">
      <div class="global-width">
        <?php section_title("What's New") ?>
        <?php
        $whatsnew_args = array(
          'post_type' => 'whatsNew',
          'posts_per_page' => 5,
          'order' => 'DESC',
          'orderby' => 'date'
        );
        $whatsnew = new WP_Query($whatsnew_args);
        ?>
        <div class="news-list flx-col">
          <?php
          if ($whatsnew->have_posts()) :
            $most_recent_post_id = $whatsnew->posts[0]->ID;
            $delay = 0;
            while ($whatsnew->have_posts()) : $whatsnew->the_post();
              $delay += 100;
          ?>
              <a href="<?= esc_url(get_the_permalink()) ?>" class="news-card" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                <div class="flx jc-sb">
                  <div class="flx-row">
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
                        <div>
                          <h3 class="the-title"><?= esc_html(get_the_title()) ?></h3>
                          <?php $excerpt = esc_html(get_the_excerpt()) ?>
                          <p class="the-excerpt"><?= truncate_text($excerpt, 150) ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="flx ai-c jc-c">
                    <div class="news-redirect">
                      <img src="<?= RESNPO_IMAGE . '/link-out.png' ?>" alt="">
                    </div>
                  </div>
                </div>
              </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
        <div class="see-button">
          <button type="button" class="button button--short bg-lbrown c-white">
            <p class="ai-c flx jc-sb">すべてを見る
              <span> <?= SVG_play ?>
            </p>
            </span>
          </button>
        </div>
      </div>
    </div>
  </section>

  <section id="realxlink">
    <div class="rxl-container">
      <div class="global-width">

        <div class="rxl-content flx-row jc-sb">
          <div class="svg-quote">
            <?= SVG_quote ?>
          </div>
          <div class="rxl-img-banner">
            <img src="<?= RESNPO_IMAGE . '/home/rxl-mori.png' ?>" alt="realxlink">
          </div>
          <div class="rxl-text-wrapper jc-c flx-col" data-aos="fade-right">
            <h1>新時代の学びのカタチ <br>
              「REAL✕LINK」
            </h1>
            <p>NPO法人 RESは、ひとりでも多くの子どもたちが、 未来の国際社会で活躍できる社会を目指し、 自ら考え行動できる人材を育成する活動をしています。</p>

            <button type="button" class="button button--short bg-white c-lbrown" data-aos="fade-right">
              <p class="ai-c flx jc-sb">詳しく見る
                <span> <?= SVG_play_brown_sm ?>
              </p>
              </span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="adviser">
    <div class="adviser-container">
      <div class="global-width">
        <?php section_title('Advisor') ?>
        <div class="adviser-content flx">
          <div class="adviser-col-wrapper" data-aos="fade-up">
            <div class="adviser-img">
              <img src="<?= RESNPO_IMAGE . '/home/adviser.png' ?>" alt="adviser">
              <div class="adviser-description">
                <h3>MARIA JADE CATALAN-OPULENCIA, PhD </h3>
                <p class="span-subtitle">特別顧問</p>
                <button type="button" class="button button--long c-white bg-lbrown">
                  <p class="ai-c flx jc-sb">プロフィールを見る
                    <span> <?= SVG_play ?>
                  </p>
                  </span>
                </button>
              </div>
            </div>

          </div>

          <div class="adviser-credentials flx-col">
            <div data-aos="fade-right" data-aos-delay="300" class="credential-card flx">
              <div class="cred-image">
                <img src="<?= RESNPO_IMAGE . '/home/ucam.png' ?>" alt="ucam">
              </div>
              <div>
                <h3>ムルシア・カトリック大学（スペイン）</h3>
                <p>副学長-教務担当 </p>
              </div>
            </div>
            <div data-aos="fade-right" data-aos-delay="300" class="credential-card flx">
              <div class="cred-image"><img src="<?= RESNPO_IMAGE . '/home/liverpool.png' ?>" alt="liverpool"></div>
              <div>
                <h3>博士号（PhD）</h3>
                <p>リバプール大学　 • 経営学/人事管理/情報学 </p>
              </div>
            </div>
            <div data-aos="fade-right" data-aos-delay="300" class="credential-card flx">
              <div class="cred-image"><img src="<?= RESNPO_IMAGE . '/home/iba.png' ?>" alt="iba"></div>
              <div>
                <h3>博士号（PhD）</h3>
                <p>国際経営学・経済学アカデミー　経営学</p>
              </div>
            </div>
            <div data-aos="fade-right" data-aos-delay="300" class="credential-card flx">
              <div class="cred-image"><img src="<?= RESNPO_IMAGE . '/home/up.png' ?>" alt="up"></div>
              <div>
                <h3>経営学修士</h3>
                <p>フィリピン大学　公共経営 </p>
              </div>
            </div>
            <div data-aos="fade-right" data-aos-delay="300" class="credential-card flx">
              <div class="cred-image"><img src="<?= RESNPO_IMAGE . '/home/up.png' ?>" alt="up"></div>
              <div>
                <h3>経営学修士</h3>
                <p>フィリピン大学　マーケティング </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="supporter">
    <div class="supporter-container" data-aos="fade-up">
      <div class="global-width">
        <?php section_title('Supporter') ?>

        <div class="supporter-content flx jc-sb">
          <div class="support-message">
            <h1>支援者の皆様</h1>
            <p>活動に賛同し、支持してくださる全ての皆様に厚く御礼申し上げます。</p>
          </div>
          <div class="support-button">
            <button type="button" class="button button--short bg-lbrown c-white">
              <p class="ai-c flx jc-sb">すべてを見る
                <span> <?= SVG_play ?>
              </p>
              </span>
            </button>

          </div>
        </div>
        <div class="sponsor-container" data-aos="fade-up">
          <div class="sponsor-container-title">
            <h1>サポーター</h1>
            <p>Sponsors</p>
          </div>
          <div class="sponsor-grid">
            <div class="sponsor-card">
              <img src="<?= RESNPO_IMAGE . '/home/logo-1.png' ?>" alt="sponsor1">
            </div>
            <div class="sponsor-card jc-c">
              <img src="<?= RESNPO_IMAGE . '/home/logo-2.png' ?>" alt="sponsor2">
            </div>
            <div class="sponsor-card">
              <img src="<?= RESNPO_IMAGE . '/home/logo-3.png' ?>" alt="sponsor3">
            </div>
            <div class="sponsor-card">
              <img src="<?= RESNPO_IMAGE . '/home/logo-4.png' ?>" alt="sponsor4">
            </div>
            <div class="sponsor-card">
              <img src="<?= RESNPO_IMAGE . '/home/logo-5.png' ?>" alt="sponsor5">
            </div>
            <div class="sponsor-card">
              <img src="<?= RESNPO_IMAGE . '/home/logo-6.png' ?>" alt="sponsor6">
            </div>
            <div class="sponsor-card">
              <img src="<?= RESNPO_IMAGE . '/home/logo-7.png' ?>" alt="sponsor7">
            </div>

          </div>
        </div>
      </div>

    </div>
  </section>

  <section id="location">
    <div class="location-container" data-aos="fade-up">
      <div class="global-width">
        <?php section_title('Where are we located?') ?>
        <div class="location-card-wrapper flx-row jc-sa">
          <button class="location-card flx jc-sb" data-location="https://maps.google.com/?q=愛媛県松山市平井町1426番地2&output=embed" data-aos="fade-up">
            <h3>愛媛県松山市平井町1426番地2 </h3>
            <span><?= SVG_play_brown ?></span>
          </button>
          <button class="location-card flx jc-sb" data-location="https://maps.google.com/?q=島根県隠岐郡西ノ島町大字浦郷３１&output=embed" data-aos="fade-up">
            <h3>島根県隠岐郡西ノ島町大字浦郷３１ </h3>
            <span><?= SVG_play_brown ?></span>
          </button>
          <button class="location-card flx jc-sb" data-location="https://maps.google.com/?q=5/F PAFCPIC Building, Taft North, Brgy. Buhang, Mandurriao, Iloilo City, Iloilo, Philippines&output=embed" data-aos="fade-up">
            <h3>5/F PAFCPIC Building, Taft North, Brgy. Buhang, Mandurriao, Iloilo City, Iloilo, Philippines </h3>
            <span><?= SVG_play_brown ?></span>
          </button>
        </div>
        <div class="map" data-aos="fade-up">
          <iframe
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
            id="map-frame" src="https://maps.google.com/?q=愛媛県松山市平井町1426番地2&output=embed" frameborder="0">
          </iframe>
        </div>
      </div>
    </div>
  </section>




</section>

</main>
</body>

</html>
<?php get_footer(); ?>