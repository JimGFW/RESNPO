<?php get_header(); ?>

<section id="homepage">
  <section class="home_landing">
    <div class="home-container">
      <div class="flx-row home-card-wrapper">

        <div class="home-card first-col">
          <div class="image-container">
            <img src="<?= RESNPO_IMAGE . '/bg1.png' ?>" alt="bg">
          </div>
          <div class="text-container flx-col">
            <h2>Fostering human resources who can think and act on their own.</h2>
            <h1>自ら考え行動できる人材の育成</h1>

          </div>
        </div>

        <div class="home-card second-col">
          <div class="image-container">
            <img src="<?= RESNPO_IMAGE . '/bg2.png' ?>" alt="bg">
            <div class="text-container flx-col">
              <h2>About Us</h2>
              <h1>ひとりでも多くの子どもたちが、
                未来の可能性を芸術で表現できる社会を目指して</h1>

              <div>
                <a href="<?= home_url() . '/about' ?>">
                  <button type="button" class="x-short-button c-black bg-white">
                    <p class="ai-c flx jc-sb">詳しく見る
                      <span> <?= file_get_contents(RESNPO_SVG . '/redirect.svg') ?>
                    </p>
                    </span>
                  </button>
                </a>
              </div>
            </div>
          </div>

          <div class="image-container">
            <img src="<?= RESNPO_IMAGE . '/bg3.png' ?>" alt="bg">
            <div class="text-container flx-col">
              <h2>Projects</h2>
              <h1>「SDGs甲子園」の過去実績 をご 紹介します。</h1>

              <div>
                <a href="<?= home_url() . '/projects' ?>">
                  <button type="button" class="x-short-button c-black bg-white">
                    <p class="ai-c flx jc-sb">詳しく見る
                      <span> <?= file_get_contents(RESNPO_SVG . '/redirect.svg') ?>
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


  <section id="activities">
    <div class="activities-container">
      <div class="act-top-content">
        <div class="flx-row jc-sb ai-c">
          <div class="activities-section-title">
            <h1>Our <br>Activities</h1>
          </div>
          <div class="activities-section-description flx-col">
            <h3>SDGs甲子園</h3>
            <p>地域社会のSDGs課題に焦点を当て、その解決に向けて研究や活動を行う高校生たちが
              その取り組みの経過や成果をプレゼンテーション等で競います。</p>
          </div>
        </div>

        <div class="activities-slider">


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
                  <div>
                    <h3 class="the-title"><?= esc_html(get_the_title()) ?></h3>
                    <p class="the-excerpt"><?= esc_html(get_the_excerpt()) ?></p>
                  </div>
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

      <div class="see-button">
        <button type="button" class="short-button bg-lbrown c-white">
          <p class="ai-c flx jc-sb">すべてを見る
            <span> <?= file_get_contents(RESNPO_SVG . '/play.svg') ?>
          </p>
          </span>
        </button>
      </div>
    </div>
  </section>

  <section id="realxlink">
    <div class="rxl-container">
      <div class="global-width">

        <div class="rxl-content flx-row jc-sb">
          <div class="svg-quote">
            <?= file_get_contents(RESNPO_SVG . '/quote.svg') ?>
          </div>
          <div class="rxl-img-banner">
            <img src="<?= RESNPO_IMAGE . '/home/rxl-mori.png' ?>" alt="realxlink">
          </div>
          <div class="rxl-text-wrapper jc-c flx-col">
            <h1>新時代の学びのカタチ <br>
              「REAL✕LINK」
            </h1>
            <p>NPO法人 RESは、ひとりでも多くの子どもたちが、 未来の国際社会で活躍できる社会を目指し、 自ら考え行動できる人材を育成する活動をしています。</p>

            <button type="button" class="short-button bg-white c-lbrown">
              <p class="ai-c flx jc-sb">詳しく見る
                <span> <?= file_get_contents(RESNPO_SVG . '/play-brown-sm.svg') ?>
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
    </div>
  </section>

  <section id="supporter">
    <div class="supporter-container">
      <div class="global-width">
        <?php section_title('Supporter') ?>

        <div class="supporter-content flx jc-sb">
          <div class="support-message">
            <h1>支援者の皆様</h1>
            <p>活動に賛同し、支持してくださる全ての皆様に厚く御礼申し上げます。</p>
          </div>
          <div class="support-button">
            <button type="button" class="short-button bg-lbrown c-white">
              <p class="ai-c flx jc-sb">すべてを見る
                <span> <?= file_get_contents(RESNPO_SVG . '/play.svg') ?>
              </p>
              </span>
            </button>

          </div>
        </div>
        <div class="sponsor-container">
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
    <div class="location-container">
      <div class="global-width">
        <?php section_title('Where are we located?') ?>
        <div class="location-card-wrapper flx-row jc-sa">
          <button class="location-card flx jc-sb" data-location="https://maps.google.com/?q=愛媛県松山市平井町1426番地2&output=embed">
            <h3>愛媛県松山市平井町1426番地2 </h3>
            <span><?= file_get_contents(RESNPO_SVG . '/play-brown.svg') ?></span>
          </button>
          <button class="location-card flx jc-sb" data-location="https://maps.google.com/?q=島根県隠岐郡西ノ島町大字浦郷３１&output=embed">
            <h3>島根県隠岐郡西ノ島町大字浦郷３１ </h3>
            <span><?= file_get_contents(RESNPO_SVG . '/play-brown.svg') ?></span>
          </button>
          <button class="location-card flx jc-sb" data-location="https://maps.google.com/?q=5/F PAFCPIC Building, Taft North, Brgy. Buhang, Mandurriao, Iloilo City, Iloilo, Philippines&output=embed">
            <h3>5/F PAFCPIC Building, Taft North, Brgy. Buhang, Mandurriao, Iloilo City, Iloilo, Philippines </h3>
            <span><?= file_get_contents(RESNPO_SVG . '/play-brown.svg') ?></span>
          </button>
        </div>
        <div class="map">
          <iframe id="map-frame" src="https://maps.google.com/?q=愛媛県松山市平井町1426番地2&output=embed" frameborder="0"></iframe>
        </div>
      </div>
    </div>
  </section>




</section>

</main>
</body>

</html>
<?php get_footer(); ?>