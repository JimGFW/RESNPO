<?php get_header() ?>

<section id="sdgPage" class="header-height sdgPage">
  <section class="landing-sdg">
    <div class="sdg-container">
      <div class="global-width">
        <?php render_projects_landing('RESのSDGs<br>甲子園とは', ' 新学習指導要綱に記載されている「持続可能な社会の創り手」を育成するために、地域社会のSDGs課題に焦点を当て、その解決に向けて研究や活動を行う高校生たちが、その取り組みの経過や成果をプレゼンテーション等で競う場を提供します。私たちが求めるのは単なる知識の獲得や表彰の場ではありません。ESD（持続可能な開発のための教育）実践の場として、「世代や立場を超えた交流」「一緒に取り組む仲間との交流」「自ら考え行動する大切さ」「行動（実体験）による学び」「情報発信と新たな関係の構築」の経験やその価値観を深める機会を通じて、未来を担う若者たちの成長を促します。します', '/sdg/sdg-landing.png') ?>
      </div>
    </div>
  </section>

  <section id="activities_exchanges">
    <div class="act-exc-container">
      <div class="global-width">

        <div class="btn-wrap ">
          <button class="prev-btn button"><?= SVG_arrow_l ?></button>
          <button class="next-btn button "><?= SVG_arrow_r ?></button>
        </div>
        <div class="cards-content-wrapper">
          <?php
          $act_exchanges_args = array(
            'post_type' => 'activities_exchanges',
            'posts_per_page' => -1,
          );
          $act_exchanges = new WP_Query($act_exchanges_args);

          if ($act_exchanges->have_posts()):
            while ($act_exchanges->have_posts()):
              $act_exchanges->the_post();
          ?>
              <div class="card-content">
                <?php if (has_post_thumbnail()): ?>
                  <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                <?php endif; ?>
                <p><?= get_the_excerpt(); ?></p>
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          else:
            echo 'No activities exchanges found';
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>

  <section id="upcoming_events">
    <div class="ue-container">
      <div class="global-width">
        <?php section_title("Upcoming Events") ?>
        <?php
        $events_args = array(
          'post_type' => 'upcomingevents',
          'posts_per_page' => 3,
          'order' => 'DESC',
          'orderby' => 'date'
        );
        $events = new WP_Query($events_args);
        ?>
        <div class="news-list flx-col">
          <?php
          if ($events->have_posts()) :
            $delay = 0;
            while ($events->have_posts()) : $events->the_post();
              $date = get_post_meta(get_the_ID(), '_event_date', true);
              $event_date = (new DateTime($date))->format('F j, Y');

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
                        <div class="event-date whatsnew-date">
                          <p class="the-date"><?= $event_date ?></p>
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


  <section id="criteria">
    <div class="criteria-container bg-dbrown">
      <div class="global-width">
        <div class="flx">
          <div class="flx-title">
            <h1 class="c-white">５つの審査基準</h1>
          </div>

          <?php
          $num_repeats = 3;

          $cards = [
            [
              'title' => '企画力',
              'content' => '新規性および革新性を評価 <br> <br> 活動内容が斬新かつ革新的で、これまでの実践とは一味違った取り組みであるか。'
            ],
            [
              'title' => '表現力',
              'content' => '共感を得るためのストーリーおよび表現手法を評価 <br> <br> 共感を得るためのストーリー構成となっており、分かりやすいプレゼンテーションができているか。'
            ],
            [
              'title' => 'つながり力',
              'content' => '人とのつながり、周りを巻き込む力を評価 <br> <br> 地域、社会と交流し、人とより広く、または、深くつながることができているか。'
            ],
            [
              'title' => 'つながり力',
              'content' => '人とのつながり、周りを巻き込む力を評価 <br> <br> 地域、社会と交流し、人とより広く、または、深くつながることができているか。'
            ],
            [
              'title' => 'つながり力',
              'content' => '人とのつながり、周りを巻き込む力を評価 <br> <br> 地域、社会と交流し、人とより広く、または、深くつながることができているか。'
            ]
          ];
          ?>
          <div class="criteria-card-wrapper">
            <?php
            for ($i = 0; $i < $num_repeats; $i++) {
              foreach ($cards as $card) {
            ?>
                <div class="criteria-card">
                  <h2><?= $card['title'] ?></h2>
                  <p><?= $card['content'] ?></p>
                </div>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="galleryPage" class="flx jc-c ai-c">
    <div class="gallery-container flx jc-c ai-c">
      <div class="global-width">
        <div class="gallery-wrapper">

          <!-- utilized loop for ease transition -->
          <?php
          $images = [
            '/sdg/gal-1.png',
            '/sdg/gal-2.png',
            '/sdg/gal-3.png'
          ];

          $repeatCount = 20;

          for ($i = 0; $i < $repeatCount; $i++) {
            foreach ($images as $image) {
          ?>
              <div class="gallery-image">
                <img src="<?= RESNPO_IMAGE . $image ?>" alt="">
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>


  <section id="past_achievements">
    <div class="past-achievements-container">
      <div class="global-width">
        <div class="flx top">
          <?php section_title('「 SDGs甲子園 」 の過去実績をご紹介します。') ?>
          <!-- slick button -->
        </div>
        <div class="achievements-slider">
          <?php
          $achievements_args = array(
            'post_type' => 'pastachievements',
            'posts_per_page' => 3,
            'order' => 'DESC',
            'orderby' => 'date'
          );
          $achievements = new WP_Query($achievements_args);
          if ($achievements->have_posts()):
            while ($achievements->have_posts()):
              $achievements->the_post();
          ?>
              <div class="achievement-card">
                <?php
                $images = get_post_meta(get_the_ID(), 'images', true) ?: [];
                if (!empty($images)) {
                  echo '<div class="pa-images-wrapper ">';
                  foreach ($images as $image) {
                    echo '<div class="achievement-image">';
                    echo    '<img src="' . esc_url($image) . '" alt="Image" class="pa-carousels">';
                    echo '</div>';
                  }
                  echo '</div>';
                } else {
                  echo '<p>No images found.</p>';
                }
                ?>
                <div class="flx-row">
                  <h5>カテゴリ</h5>
                  <h6>
                    <?php
                    $category = get_post_meta(get_the_ID(), 'category', true);
                    echo !empty($category) ? esc_html($category) : 'No category found.';
                    ?>
                  </h6>
                </div>
                <div class="flx-row">
                  <h5>開催日時</h5>
                  <h6>
                    <?php
                    $dateNtime = get_post_meta(get_the_ID(), 'dateNtime', true);
                    echo !empty($dateNtime) ? esc_html($dateNtime) : 'No date and time found.';
                    ?>
                  </h6>
                </div>
                <div class="flx-row">
                  <h5>開催場所</h5>
                  <h6>
                    <?php
                    $location = get_post_meta(get_the_ID(), 'location', true);
                    echo !empty($location) ? esc_html($location) : 'No location found.';
                    ?>
                  </h6>
                </div>
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




  <section id="joined_schools" class="flx ai-c jc-c">
    <div class="joined-schools-container">
      <div class="global-width">
        <div class="flx-col joined-schools-title ai-c">
          <h5>Joined Schools</h5>
          <h1>参加校</h1>
        </div>
        <div class="logo-cards-wrapper flx-row jc-c">
          <div class="logo-card flx ai-c jc-c">
            <img src="<?= RESNPO_IMAGE . '/sdg/school-lasalle.png' ?>" alt="">
          </div>
          <div class="logo-card flx ai-c jc-c">
            <img src="<?= RESNPO_IMAGE . '/sdg/school-cpu.png' ?>" alt="">
          </div>
          <div class="logo-card flx ai-c jc-c">
            <img src="<?= RESNPO_IMAGE . '/sdg/school-huasiong.png' ?>" alt="">
          </div>
          <div class="logo-card flx ai-c jc-c">
            <img src="<?= RESNPO_IMAGE . '/sdg/school-sys.png' ?>" alt="">
          </div>
          <div class="logo-card flx ai-c jc-c">
            <img src="<?= RESNPO_IMAGE . '/sdg/school-westbridge.png' ?>" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- contact-opp -->
  <?php get_template_part('template-parts/contact-opp') ?>

</section> <!-- sdgPage -->

<?php get_footer() ?>