<?php get_header() ?>

<section id="study_abroad" class="header-height">


  <section id="studyAbroadPage" class="header-height sdgPage">
    <section class="landing-study-abroad">
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
    </section>

  </section> <!-- sdgPage -->


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
</section>

<?php get_footer() ?>