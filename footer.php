<footer>
  <div class="footer-container" data-aos="fade-up">
    <div class="global-width">
      <div class="top-button">
        <button id="scrollToTopButton" type="button" class="x-short-button c-black bg-white" onclick="scrollToTop()">
          <p class="ai-c flx jc-sb">
            <span> <?= file_get_contents(RESNPO_SVG . '/play-brown.svg') ?> </span>
            TOP
          </p>
        </button>
      </div>
      <div class="flx jc-sb footer-content">
        <div class="col-1">
          <img src="<?= RESNPO_IMAGE . '/res-logo.png' ?>" alt="res-logo">
          <span>愛媛県松山市平井町1426番地2</span>
        </div>
        <div class="col-middle flx-row jc-sb">
          <div class="col-2">
            <div class="col-title">
              <h4>QUICK LINKS</h4>
            </div>
            <div class="nav-links">
              <ul>
                <li><a href="<?= home_url() ?>">Home</a></li>
                <li><a href="<?= home_url() . '/projects' ?>">Projects</a></li>
                <li><a href="<?= home_url() . '/about' ?>">About Us</a></li>
                <li><a href="<?= home_url() . '/join' ?>">Join Us</a></li>
                <li><a href="<?= home_url() . '/corporate' ?>">Corporate/Schools</a></li>
              </ul>
            </div>
          </div>
          <div class="col-3">
            <div class="col-title">
              <h4>ACTIVITIES</h4>
            </div>
            <div class="nav-links">
              <ul>
                <li><a href="<?= home_url() . '/projects' ?>">SDG's</a></li>
                <li><a href="<?= home_url() . '/events' ?>">海外留学</a></li>
                <li><a href="<?= home_url() . '/news' ?>">海外留学</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="col-4-title"><?php section_title('Supporter') ?></div>
          <p>子どもたちに一つでも多くの機会を届けるため 皆様の寄付を私たちの活動に利用させていただきます。</p>
          <button type="button" class="long-button c-white bg-lbrown">
            <p class="ai-c flx jc-sb">プロフィールを見る
              <span> <?= file_get_contents(RESNPO_SVG . '/play.svg') ?>
            </p>
            </span>
          </button>
        </div>
      </div>

      <div class="terms">
        <hr>

        <div class="flx-row jc-sb copyright-wrapper">
          <div class="copyright">
            <p>© 2021 NPO RES</p>
          </div>
          <div class="social flx-row">
            <a href="https://www.facebook.com/npores" target="_blank"><?= file_get_contents(RESNPO_SVG . '/facebook.svg') ?></a>
            <a href="https://www.instagram.com/npores/" target="_blank"><?= file_get_contents(RESNPO_SVG . '/youtube.svg') ?></a>
            <a href="https://twitter.com/npores" target="_blank"><?= file_get_contents(RESNPO_SVG . '/line.svg') ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

</main>
</body>

</html>
<?php wp_footer() ?>