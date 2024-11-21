<?php get_header() ?>
<section id="donationPage" class="header-height">
  <section id="landing-donation">
    <div class="donation-landing-container">
      <div class="global-width">
        <div class="donation-landing-content">
          <iframe width="695" height="391" src="https://www.youtube.com/embed/gJUy-fVnqyc" title="イロイロ市ボランティア" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>

  <section id="dm-section-2">
    <div class="dm-section-2-container">
      <div class="global-width">
        <div class="dm-section-2-content">
          <div class="dm-section-2-top-content">
            <h1>あなたの寄付が子どもたち <br> の世界を拡げ輝かせます</h1>
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
                <img src="<?= RESNPO_SVG . '/teacher.svg' ?>" alt="">
                <h2>様々な職種について知ったり体験する機会</h2>
                <p>
                  Opportunity to learn and experience various professions
                </p>
              </div>
              <div class="opportunity-card flx-col">
                <img src="<?= RESNPO_SVG . '/globe.svg' ?>" alt="">
                <h2>実社会に活かせる知識やスキルを学ぶ機会</h2>
                <p>
                  Opportunities to learn knowledge and skills that can be applied in the real world
                </p>
              </div>
              <div class="opportunity-card flx-col">
                <img src="<?= RESNPO_SVG . '/diversity.svg' ?>" alt="">
                <h2>地域や国、文化の異なる人たちとの交流を通して多様性を体感する機会</h2>
                <p>
                  Opportunities to experience diversity through interactions with people from different regions, countries and cultures
                </p>
              </div>
              <div class="opportunity-card flx-col">
                <img src="<?= RESNPO_SVG . '/lightbulb.svg' ?>" alt="">
                <h2>あたり前のことをあたり前のことではないと気づき感謝することができる心を育む機会</h2>
                <p>
                  An opportunity to develop a mindset that recognizes and appreciates things that are taken for granted.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- dm-section-2 -->

  <div class="donation-image-banner">
    <img src="<?= RESNPO_IMAGE . '/donation/banner.png' ?>" alt="banner">
  </div>

  <section id="for_donated">
    <div class="for-donated-container">
      <div class="global-width">
        <div class="for-donated-content">
          <div class="flx">
            <div class="flx">
              <div class="col-1">
                <?php section_title('会員になる方法') ?>
              </div>
              <div class="col-2 flx">
                <div class="for-donated-cards flx-row">
                  <div class="for-donated-card flx-col">
                    <h2>01</h2>
                    <p>
                      団体よりお礼のお手紙を郵送いたします
                    </p>
                  </div>
                  <div class="for-donated-card flx-col">
                    <h2>02</h2>
                    <p>
                      毎年4月末ごろ、前年度の活動報告書をお送りいたします
                    </p>
                  </div>
                  <div class="for-donated-card flx-col">
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
    </div>
  </section>

  <section id="donation_method">
    <div class="donation-method-container">
      <div class="global-width">
        <?php section_title('お気持ちにあった寄付をお選びください') ?>
        <div class="flx method-col-container">
          <div class="method-col-1 flx-col">
            <button class="button method-button c-lbrown hash-donation" data-hash="A" onclick="showTab(event, 'A')">毎月寄付をする</button>
            <button class="button method-button c-lbrown hash-donation" data-hash="B" onclick="showTab(event, 'B')">1回の寄付をする</button>
            <button class="button method-button c-lbrown hash-donation" data-hash="C" onclick="showTab(event, 'C')">物品の寄付をする</button>
          </div>

          <!-- TAB 1 - Monthly Donation -->
          <div class="method-col-2 tab" id="A">
            <h4>私たちと一緒に子どもたちの成長を見守りませんか？ </h4>
            <h5>毎月1,000円～継続的にご寄付いただけます。 </h5>
            <h4 class="gray-bg">お使いいただけるカード </h4>
            <div class="payment-networks flx-row jc-c ai-c">
              <img src="<?= RESNPO_IMAGE . '/donation/visa.png' ?>" alt="visa">
              <img src="<?= RESNPO_IMAGE . '/donation/mastercard.png' ?>" alt="mastercard">
              <img src="<?= RESNPO_IMAGE . '/donation/amex.png' ?>" alt="amex">
              <img src="<?= RESNPO_IMAGE . '/donation/jcb.png' ?>" alt="jcb">
              <img src="<?= RESNPO_IMAGE . '/donation/discover.png' ?>" alt="discover">
            </div>
            <h4>金額ボタンを押すとお申込画面に移動します。 </h4>
            <div class="amount-wrapper">
              <div class="amount-row-1 amount-button flx">
                <button class="button">3,000円/月 </button>
                <button class="button">10,000円/月 </button>
              </div>
              <div class="amount-row-2 amount-button flx">
                <button class="button">1,000円/月 </button>
                <button class="button">5,000円/月 </button>
                <button class="button">30,000円/月 </button>
                <button class="button">50,000円/月 </button>
                <button class="button">100,000円/月 </button>
              </div>
            </div>
            <p>※経費を削減し、皆様のお気持ちを少しでも多く子どもたちのための活動に使用させていただくために、カードでのお手続きにご協力をお願いいたします。</p>
            <div class="flx footer-inquiry ai-c">
              <p>銀行振込での毎月寄付をご検討の方は、お問い合わせフォームよりご相談ください。</p>
              <div class="inquiry-button">
                <a href="<?= site_url() . '/donation' ?>">
                  <button type="button" class="button full-width c-white bg-lbrown">
                    <p class="ai-c flx jc-sb"> 詳しく見る <?= SVG_play ?></p>
                  </button>
                </a>
              </div>
            </div>
          </div>

          <!-- TAB 2 - One-Time Donation -->
          <div class="method-col-2 tab d-none" id="B">
            <!-- Similar structure to TAB 1, but for one-time donation -->
            <h4>
              ご都合の良い時に、ご自由な金額・回数で <br>
              ご寄付いただけます。<br>
            </h4>

            <h4 class="gray-bg">お使いいただけるカード</h4>
            <div class="payment-networks flx-row jc-c ai-c">
              <img src="<?= RESNPO_IMAGE . '/donation/visa.png' ?>" alt="visa">
              <img src="<?= RESNPO_IMAGE . '/donation/mastercard.png' ?>" alt="mastercard">
              <img src="<?= RESNPO_IMAGE . '/donation/amex.png' ?>" alt="amex">
              <img src="<?= RESNPO_IMAGE . '/donation/jcb.png' ?>" alt="jcb">
              <img src="<?= RESNPO_IMAGE . '/donation/discover.png' ?>" alt="discover">
            </div>
            <h4>金額ボタンを押すとお申込画面に移動します。</h4>
            <div class="amount-wrapper">
              <div class="amount-row-1 amount-button flx">
                <button class="button">3,000円</button>
                <button class="button">10,000円</button>
              </div>
              <div class="amount-row-2 amount-button flx">
                <button class="button">1,000円</button>
                <button class="button">5,000円</button>
                <button class="button">30,000円</button>
                <button class="button">50,000円</button>
                <button class="button">100,000円</button>
              </div>
            </div>
            <p>※銀行振込をご希望の方も上記ボタンよりお申し込みください。<br>
              次ページで銀行振込をご選択いただけます。。
            </p>

          </div>

          <!-- TAB 3 - Item Donation -->
          <div class="method-col-2 tab d-none" id="C">
            <p class="p-15 text-center">以下のようなモノを寄付として受け付けております。</p>
            <ul class="flex donation-items">
              <li>
                <img src="<?php echo RESNPO_URI . '/assets/image/donation/last-section/tab-img1.png' ?>" alt="">
                <p class="w-800 p-18 item-title">文具</p>
                <p class="p-14 item-desc">鉛筆、ペン、ボールペン、クレヨン、クレパス、消しゴム、ノート、定規、コンパス、ホチキス</p>
              </li>
              <!-- Other list items remain the same as in your original code -->
            </ul>
            <div class="shipping-address">
              <div>
                <p class="label">発送先</p>
              </div>
              <div class="address">
                <strong>
                  <p>NPO法人RES NPO法人RES 物流センター（事務太郎内） </p>
                </strong>
                <p>〒790-0951</p>
                <p>愛媛県松山市天山3丁目9-30</p>
                <p>TEL：089-933-1774</p>
                <br>
                <p>※発送時の<label class="hl-red">事前連絡は不要</label>です。</p>
                <p>※<label for="" class="hl-red">送料は寄付者様にご負担いただきます。</label>ご了承ください。</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


</section>
<?php get_footer() ?>