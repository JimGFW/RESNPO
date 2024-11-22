<?php get_header(); ?>

<section id="contact" class="contactPage">
  <div class="contact-container ">
    <div class=" flx">
      <div class="contact-content-wrapper">
        <div class="contact-contents">
          <h1>お問い合わせ</h1>
          <div class="contact-content">
            <?php section_title('電話からのお問い合わせ') ?>
            <h1 class="tel-number">089 - 999 - 999</h1>
            <p>
              ※ご返信には3営業日程度いただくことがございます。ご了承ください。<br>
              ※入力いただいた情報は、<span class="c-lbrown">個人情報保護指針に</span>もとづいて適正に管理 <br>
              ・取り扱いをさせていただきます。
            </p>
          </div>
          <div class="contact-content">
            <?php section_title('フォームからのお問い合わせ') ?>
            <p>
              下記のフォームに入力いただき、お問い合わせください。
              ※<span class="c-lbrown">全て必須入力です。</span>
            </p>
          </div>
        </div>
      </div>
      <div class="contact-form">
        <?php echo do_shortcode('[wpforms id="154" title="false"]') ?>
      </div>
    </div>
</section>

<?php get_footer(); ?>