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