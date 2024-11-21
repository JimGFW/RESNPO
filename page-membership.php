<?php get_header(); ?>
<section id="membershipPage">

  <section id="membership">
    <div class="membership-landing-container">
      <div class="global-width">
        <div class="landing-banner">
          <img src="<?= RESNPO_IMAGE . '/bg3.png' ?>" alt="banner">
        </div>
      </div>
    </div>
  </section>

  <section id="perks">
    <div class="perks-container">
      <div class="global-width">
        <div class="perks-content">
          <div class="perks-top-content">
            <h1>あなたの寄付が子どもたちの <br> 世界を拡げ輝かせます</h1>
            <p>
              刻一刻と変化する今の時代。子どもたちは、私たちがそうだった頃とは異なる環境に身を置き多種多様なスキルや能力 <br>
              を身につけることを求められています。<br>
              子どもたちに一つでも多くの機会を届けるため皆様の寄付を私たちの活動に利用させていただきます
            </p>
          </div>
          <div class="opportunities">
            <?php section_title('寄付によって 子どもたちに与えることができる機会') ?>
            <div class="opportunities-grid">
              <div class="opportunity-card flx-col">
                <img src="<?= RESNPO_SVG . '/book.svg' ?>" alt="">
                <h2>Personal Growth & Learning</h2>
                <p>
                  Gain valuable skills such as communication, leadership, and problem-solving through hands-on experiences.
                </p>
              </div>
              <div class="opportunity-card flx-col">
                <img src="<?= RESNPO_SVG . '/handshake.svg' ?>" alt="">
                <h2>Contribution to Meaningful Causes</h2>
                <p>
                  Experience the satisfaction of making a positive difference in the lives of others and supporting causes you’re passionate about.
                </p>
              </div>
              <div class="opportunity-card flx-col">
                <img src="<?= RESNPO_SVG . '/megaphone.svg' ?>" alt="">
                <h2>Networking Opportunities</h2>
                <p>
                  Build relationships with people who share similar values and interests, leading to potential collaborations or friendships.
                </p>
              </div>
              <div class="opportunity-card flx-col">
                <img src="<?= RESNPO_SVG . '/airplane.svg' ?>" alt="">
                <h2>Travel and Exploration</h2>
                <p>
                  Enjoy immersive experiences that go beyond typical tourist activities, such as participating in local traditions or volunteer work.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="membership_how">
    <div class="membership-how-container">
      <div class="global-width">
        <div class="flx">
          <div class="col-1">
            <?php section_title('会員になる方法') ?>
          </div>
          <div class="col-2 flx">
            <div class="how-cards flx-row">
              <div class="how-card flx-col">
                <h2>01</h2>
                <p>
                  団体よりお礼のお手紙を郵送いたします
                </p>
              </div>
              <div class="how-card flx-col">
                <h2>02</h2>
                <p>
                  毎年4月末ごろ、前年度の活動報告書をお送りいたします
                </p>
              </div>
              <div class="how-card flx-col">
                <h2>03</h2>
                <p>
                  支援者ページにお名前を一定期間掲載させていただきます
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    </div>

  </section>

</section> <!-- membershipPage -->

<?php get_footer(); ?>