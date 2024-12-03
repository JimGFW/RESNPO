<?php get_header() ?>

<section id="study_abroad" class="header-height studyAbroadPage">


  <section id="studyAbroadlanding" class="header-height sdgPage">
    <div class="landing-study-abroad">
      <div class="study-abroad-container">
        <div class="global-width">
          <?php render_projects_landing(
            ' 海外進学',
            ' SDGsの17の目標に沿って学校や地域社会の課題解決を考え、実際の行動に繋げます。SDGsの取り組み事例を学んだり、ゲームを通じてSDGsの理念について考えたりします。学校同士の交流も図りながら、それぞれの課題を掘り下げていきます。',
            '/study-abroad/study-abroad-bg.png'
          )
          ?>
        </div>
      </div>
    </div>

  </section> <!-- sdgPage landing -->

  <?php render_activities_exchanges('SDG') ?>
  <?php render_upcoming_events('SDG') ?>
  <?php render_past_achievements('SDG') ?>

  <section id="impressions">
    <div class="impressions-container">
      <?php section_title('参加者の感想') ?>
      <div class="impressions-slider">
        <div class="impression-image">
          <a href="<?php echo RESNPO_IMAGE . '/study-abroad/impression1.jpeg' ?>" class="glightbox">
            <img src="<?php echo RESNPO_IMAGE . '/study-abroad/impression1.jpeg' ?>" alt="impressions-image">
          </a>
        </div>
        <div class="impression-image">
          <a href="<?php echo RESNPO_IMAGE . '/study-abroad/impression2.jpeg' ?>" class="glightbox">
            <img src="<?php echo RESNPO_IMAGE . '/study-abroad/impression2.jpeg' ?>" alt="impressions-image">
          </a>
        </div>
        <div class="impression-image">
          <a href="<?php echo RESNPO_IMAGE . '/study-abroad/impression3.jpeg' ?>" class="glightbox">
            <img src="<?php echo RESNPO_IMAGE . '/study-abroad/impression3.jpeg' ?>" alt="impressions-image">
          </a>
        </div>
        <div class="impression-image">
          <a href="<?php echo RESNPO_IMAGE . '/study-abroad/impression4.jpeg' ?>" class="glightbox">
            <img src="<?php echo RESNPO_IMAGE . '/study-abroad/impression4.jpeg' ?>" alt="impressions-image">
          </a>
        </div>
        <div class="impression-image">
          <a href="<?php echo RESNPO_IMAGE . '/study-abroad/impression5.jpeg' ?>" class="glightbox">
            <img src="<?php echo RESNPO_IMAGE . '/study-abroad/impression5.jpeg' ?>" alt="impressions-image">
          </a>
        </div>
      </div>
    </div>
  </section>

  <?php render_gallery(
    '/sdg/gal-1.png',
    '/sdg/gal-2.png',
    '/sdg/gal-3.png'
  ) ?>



  <?php get_template_part('template-parts/joined-schools') ?>


  <section id="info_session" class="flx jc-c">
    <div class="info-session-container">
      <div class="global-width">
        <div class="info-session-content">
          <div class="flx content-wrapper">
            <div class="f-col flx-col ">
              <h1>留学プログラム説明会</h1>
              <p>
                高校生ボランティア留学の詳しい内容を知りたい方を対象に説明会を行います。応募に迷っている方はもちろん、申し込みを済まされている方もご参加いただけます。<br><br>
                ※参加には予約が必要です。<br>
                ※定数に達し次第、予約を締め切ります。
              </p>
              <a href="<?= site_url() . '/donation' ?>">
                <button type="button" class="button button--long full-width c-white bg-lbrown">
                  <p class="ai-c flx jc-sb"> 詳しく見る
                    <span> <?= SVG_play ?>
                  </p>
                  </span>
                </button>
              </a>
            </div>
            <div class="s-col flx-col">
              <?php section_title('2024年5月18日(土)  <br> 15:00〜15:40') ?>
              <?php section_title('2024年5月22日(水) <br> 19:00〜19:40') ?>
            </div>
          </div>


        </div>
      </div>
    </div>

  </section>
  <?php get_template_part('template-parts/contact-opp') ?>

</section> <!-- study_abroad page -->

<?php get_footer() ?>