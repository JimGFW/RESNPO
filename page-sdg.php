<?php get_header() ?>

<section id="sdgPage" class="header-height sdgPage">
  <section class="landing-sdg">
    <div class="sdg-container">
      <div class="global-width">
        <?php render_projects_landing(
          'RESのSDGs<br>甲子園とは',

          ' 新学習指導要綱に記載されている「持続可能な社会の創り手」を育成するために、地域社会のSDGs課題に焦点を当て、その解決に向けて研究や活動を行う高校生たちが、その取り組みの経過や成果をプレゼンテーション等で競う場を提供します。私たちが求めるのは単なる知識の獲得や表彰の場ではありません。ESD（持続可能な開発のための教育）実践の場として、「世代や立場を超えた交流」「一緒に取り組む仲間との交流」「自ら考え行動する大切さ」「行動（実体験）による学び」「情報発信と新たな関係の構築」の経験やその価値観を深める機会を通じて、未来を担う若者たちの成長を促します。します',

          '/sdg/sdg-landing.png'
        )
        ?>
      </div>
    </div>
  </section>

  <?php render_activities_exchanges('SDG') ?>
  <?php render_upcoming_events('SDG') ?>

  <section id="criteria">
    <div class="criteria-container bg-dbrown">
      <div class="global-width">
        <div class="flx">
          <div class="flx-title">
            <h1 class="c-white">５つの審査基準</h1>
          </div>

          <?php
          $num_repeats = 3;

          $cards = [
            [
              'title' => '企画力',
              'content' => '新規性および革新性を評価 <br> <br> 活動内容が斬新かつ革新的で、これまでの実践とは一味違った取り組みであるか。'
            ],
            [
              'title' => '表現力',
              'content' => '共感を得るためのストーリーおよび表現手法を評価 <br> <br> 共感を得るためのストーリー構成となっており、分かりやすいプレゼンテーションができているか。'
            ],
            [
              'title' => 'つながり力',
              'content' => '人とのつながり、周りを巻き込む力を評価 <br> <br> 地域、社会と交流し、人とより広く、または、深くつながることができているか。'
            ],
            [
              'title' => '持続可能力',
              'content' => '継続することで、目標達成に繋がるかを評価 <br> <br> 一過性のものではなく、SDGsのゴール達成に結び付くものになっているか。'
            ],
            [
              'title' => '活動力',
              'content' => '課題解決のため、実際に行動ができたかを評価 <br> <br> アイデアだけでなく、課題解決のため、実際にアクションを起こせたかどうか'
            ]
          ];
          ?>
          <div class="criteria-card-wrapper">
            <?php
            for ($i = 0; $i < $num_repeats; $i++) {
              foreach ($cards as $card) {
            ?>
                <div class="criteria-card">
                  <h2><?= $card['title'] ?></h2>
                  <p><?= $card['content'] ?></p>
                </div>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>


  <?php render_gallery(
    '/sdg/gal-1.png',
    '/sdg/gal-2.png',
    '/sdg/gal-3.png'
  ) ?>


  <?php render_past_achievements('SDG') ?>

  <?php get_template_part('template-parts/joined-schools') ?>

  <?php get_template_part('template-parts/contact-opp') ?>

</section> <!-- sdgPage -->



<?php get_footer() ?>