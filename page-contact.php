<?php get_header(); ?>

<section id="contact" class="contactPage">
  <div class="contact-container ">
    <div class=" flx">
      <div class="contact-content-wrapper">
        <div class="contact-contents">
          <h1>お問い合わせ</h1>

          <div class="contact-content">
            <?php section_title('フォームからのお問い合わせ') ?>
            <p>
              下記のフォームに入力いただき、お問い合わせください。<br><br>

              ※ ご返信には3営業日程度いただくことがございます。ご了承ください。<br>
              ※ 入力いただいた情報は、<a href="<?= site_url() . '/privacy' ?>"><span class="privacy c-brown">個人情報保護指針</span></a>にもとづいて適正に管理・取り扱いをさせていただきます。<br>
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