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
        <form class="edu-contact-form" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" method="post">
          <div class="form-group">
            <label for="company">会社名/組織名</label>
            <input type="text" id="company" name="company" placeholder="Gグローフォワード JP.株式会社, Ltd.)">
          </div>
          <div class="form-group">
            <label for="name">お名前</label>
            <input type="text" id="name" name="name" placeholder="例) 山田 太郎" required>
          </div>
          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" placeholder="例) info@edu-app.com" required>
          </div>
          <div class="form-group">
            <label for="phone">電話番号</label>
            <input type="tel" id="phone" name="phone" placeholder="例) 000-000-000" required>
          </div>
          <div class="form-group">
            <label for="inquiry">お問い合わせ内容</label>
            <textarea rows="10" cols="50" id="inquiry" name="inquiry" required></textarea>
          </div>
          <div class="submit-form">
            <button type="button" class="short-button bg-lbrown c-white" data-aos="fade-right">
              <p class="ai-c flx jc-sb">詳しく見る
                <span> <?= SVG_send ?>
              </p>
              </span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>