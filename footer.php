</main>
<footer>
  <div class="footer-container" data-aos="fade-up">
    <div class="global-width">
      <div class="top-button">
        <button id="scrollToTopButton" type="button" class="x-short-button c-black bg-white" onclick="scrollToTop()">
          <p class="ai-c flx jc-sb">
            <span> <?= SVG_play_brown ?> </span>
            TOP
          </p>
        </button>
      </div>
      <div class="flx jc-sb footer-content">
        <div class="col-1 flx-col">
          <a href="<?= site_url() ?>"><img src="<?= RESNPO_IMAGE . '/res-logo.png' ?>" alt="res-logo"></a>
          <span>愛媛県松山市平井町1426番地2</span>
        </div>
        <div class="col-middle flx-row jc-sb">
          <div class="col-2">
            <div class="col-title">
              <h4>QUICK LINKS</h4>
            </div>
            <div class="nav-links">
              <ul>
                <li><a href="<?= site_url() ?>">Home</a></li>
                <!-- <li><a href="<?= site_url() . '/projects' ?>">Projects</a></li> -->
                <li><a href="<?= site_url() . '/about' ?>">About Us</a></li>
                <li><a href="<?= site_url() . '/corporate' ?>">Corporate/Schools</a></li>
              </ul>
            </div>
          </div>
          <div class="col-3">
            <div class="col-title">
              <h4>ACTIVITIES</h4>
            </div>
            <div class="nav-links">
              <ul>
                <li><a href="<?= site_url() . '/sdg' ?>">SDG's</a></li>
                <li><a href="<?= site_url() . '/study-abroad' ?>">海外留学</a></li>
                <li><a href="<?= site_url() . '/news' ?>">海外留学</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-4">
          <div class="col-4-title"><?php section_title('Supporter') ?></div>
          <p>子どもたちに一つでも多くの機会を届けるため 皆様の寄付を私たちの活動に利用させていただきます。</p>
          <a href="<?= site_url() . '/donation' ?>">
            <button type="button" class="long-button c-white bg-lbrown">
              <p class="ai-c flx jc-sb"> 詳しく見る
                <span> <?= SVG_play ?>
              </p>
              </span>
            </button>
          </a>
        </div>
      </div>

      <div class="terms">
        <hr>

        <div class="flx-row jc-sb copyright-wrapper">
          <div class="copyright">
            <p>© <?php echo do_shortcode('[year]') ?> NPO RES</p>
          </div>
          <div class="social flx-row">
            <a href="https://www.facebook.com/ChiikiKyouiku/" target="_blank"><?= SVG_facebook ?></a>
            <a href="https://www.youtube.com/channel/UCEJ3QcF3DZ9o_MYbhMxgV4Q" target="_blank"><?= SVG_youtube ?></a>
            <a href="https://liff.line.me/1645278921-kWRPP32q/?accountId=601qwusa" target="_blank"><?= SVG_line ?></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

</body>

</html>
<?php wp_footer() ?>