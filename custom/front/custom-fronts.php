<?php
function section_title($title = null)
{

?>
  <div class="section-title flx ai-c">
    <span><?= SVG_asterisk ?></span>
    <h1><?= $title ?></h1>
  </div>
<?php
}

function render_projects_landing($title, $description, $image_banner)
{
?>
  <div class="landing-content">
    <h1><?= $title ?></h1>
    <p>
      <?= $description ?>
    </p>
  </div>
  <div class="landing-image"><img src="<?= RESNPO_IMAGE . $image_banner ?>" alt="sdg-landing"></div>

<?php
}


function render_activities_exchanges($project_type)
{
?>
  <section id="activities_exchanges">
    <div class="act-exc-container">
      <div class="global-width">

        <div class="btn-wrap ">
          <button class="prev-btn button"><?= SVG_arrow_l ?></button>
          <button class="next-btn button "><?= SVG_arrow_r ?></button>
        </div>
        <div class="cards-content-wrapper">
          <?php
          $act_exchanges_args = array(
            'post_type' => 'activities_exchanges',
            'posts_per_page' => -1,
            'meta_query' => array(
              array(
                'key' => '_project_type',
                'value' => $project_type,
                'compare' => '='
              )
            )
          );
          $act_exchanges = new WP_Query($act_exchanges_args);

          if ($act_exchanges->have_posts()):
            while ($act_exchanges->have_posts()):
              $act_exchanges->the_post();
          ?>
              <div class="card-content">
                <?php if (has_post_thumbnail()): ?>
                  <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                <?php endif; ?>
                <p><?= get_the_excerpt(); ?></p>
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          else:
            echo 'No activities exchanges found';
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>
<?php
}

function render_upcoming_events($project_type)
{
?>
  <section id="upcoming_events">
    <div class="ue-container">
      <div class="global-width">
        <?php section_title("Upcoming Events") ?>
        <?php
        $events_args = array(
          'post_type' => 'upcomingevents',
          'posts_per_page' => 3,
          'order' => 'DESC',
          'orderby' => 'date',
          'meta_query' => array(
            array(
              'key' => '_project_type',
              'value' => $project_type,
              'compare' => '='
            )
          )
        );
        $events = new WP_Query($events_args);
        ?>
        <div class="news-list flx-col">
          <?php
          if ($events->have_posts()) :
            $delay = 0;
            while ($events->have_posts()) : $events->the_post();
              $date = get_post_meta(get_the_ID(), '_event_date', true);
              $event_date = (new DateTime($date))->format('F j, Y');

              $delay += 100;
          ?>
              <a href="<?= esc_url(get_the_permalink()) ?>" class="news-card" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                <div class="flx jc-sb">
                  <div class="flx-row">
                    <div class="news-thumbnail">
                      <img src="<?= esc_url(get_the_post_thumbnail_url()) ?>" alt="news">
                    </div>
                    <div class="flx-row ai-c">
                      <div class="news-content">
                        <div class="event-date whatsnew-date">
                          <p class="the-date"><?= $event_date ?></p>
                        </div>
                        <div>
                          <h3 class="the-title"><?= esc_html(get_the_title()) ?></h3>
                          <?php $excerpt = esc_html(get_the_excerpt()) ?>
                          <p class="the-excerpt"><?= truncate_text($excerpt, 150) ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="flx ai-c jc-c">
                    <div class="news-redirect">
                      <img src="<?= RESNPO_IMAGE . '/link-out.png' ?>" alt="">
                    </div>
                  </div>
                </div>
              </a>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
        </div>
        <div class="see-button">
          <button type="button" class="button button--short bg-lbrown c-white">
            <p class="ai-c flx jc-sb">すべてを見る
              <span> <?= SVG_play ?>
            </p>
            </span>
          </button>
        </div>
      </div>
    </div>
  </section>
<?php
}

function render_past_achievements($project_type)
{
?>
  <section id="past_achievements">
    <div class="past-achievements-container">
      <div class="global-width">
        <div class="flx top">
          <?php section_title('「 SDGs甲子園 」 の過去実績をご紹介します。') ?>
        </div>
        <div class="achievements-slider">
          <?php
          $achievements_args = array(
            'post_type' => 'pastachievements',
            'posts_per_page' => 3,
            'order' => 'DESC',
            'orderby' => 'date',
            'meta_query' => array(
              array(
                'key' => '_project_type',
                'value' => $project_type,
                'compare' => '='
              )
            )
          );
          $achievements = new WP_Query($achievements_args);
          if ($achievements->have_posts()):
            while ($achievements->have_posts()):
              $achievements->the_post();

              // Fetch all meta data
              $images = get_post_meta(get_the_ID(), 'images', true) ?: [];
              $category = get_post_meta(get_the_ID(), 'category', true);
              $dateNtime = get_post_meta(get_the_ID(), 'dateNtime', true);
              $location = get_post_meta(get_the_ID(), 'location', true);
              $description = get_post_meta(get_the_ID(), 'description', true) ?: get_the_excerpt();
          ?>
              <div class="achievement-card" data-achievement-id="<?php echo get_the_ID(); ?>" onclick="openModalAchievements(<?php echo get_the_ID(); ?>)">
                <?php
                if (!empty($images)) {
                  echo '<div class="pa-images-wrapper">';
                  foreach ($images as $image) {
                    echo '<div class="achievement-image">';
                    echo    '<img src="' . esc_url($image) . '" alt="Image" class="pa-carousels">';
                    echo '</div>';
                  }
                  echo '</div>';
                } else {
                  echo '<p>No images found.</p>';
                }
                ?>
                <div class="achievement-content-wrapper flx jc-sb">
                  <div class="achievement-descriptions">
                    <div class="flx-row achievement-description">
                      <h5>カテゴリ</h5>
                      <h6><?php echo !empty($category) ? esc_html($category) : 'No category found.'; ?></h6>
                    </div>
                    <div class="flx-row achievement-description">
                      <h5>開催日時</h5>
                      <h6><?php echo !empty($dateNtime) ? esc_html($dateNtime) : 'No date and time found.'; ?></h6>
                    </div>
                    <div class="flx-row achievement-description">
                      <h5>開催場所</h5>
                      <h6 data-location="<?php echo !empty($location) ? esc_attr($location) : ''; ?>">
                        <?php echo !empty($location) ? truncate_text(esc_html($location), 15) : 'No location found.'; ?>
                      </h6>
                    </div>
                  </div>
                  <div class="achievement-button flx jc-fe">
                    <button class="button-style-reset brown-play" type="button">
                      <span><?= SVG_play_brown ?></span>
                    </button>
                  </div>
                </div>
              </div>
          <?php
            endwhile;
            wp_reset_postdata();
          else:
            echo 'No past achievements found';
          endif;
          ?>
        </div>
      </div>
    </div>
  </section>

  <div id="achievementModal" class="modal">
    <div class="modal-content">
      <span class="modal-close flx ai-c">
        <span>Close</span> &times;
      </span>
      <div class="modal-slider"></div>
      <div class="modal-info">
        <div class="achievement-descriptions">
          <div class="flx-row achievement-description">
            <h5>カテゴリ</h5>
            <h6 id="modalCategory"></h6>
          </div>
          <div class="flx-row achievement-description">
            <h5>開催日時</h5>
            <h6 id="modalDateTime"></h6>
          </div>
          <div class="flx-row achievement-description">
            <h5>開催場所</h5>
            <h6 id="modalLocation"></h6>
          </div>
        </div>
      </div>
    </div>
  </div>



<?php
}

function render_gallery($p1, $p2, $p3)
{
?>
  <section id="galleryPage" class="flx jc-c ai-c">
    <div class="gallery-container flx jc-c ai-c">
      <div class="global-width">
        <div class="gallery-wrapper">

          <!-- utilized loop for ease transition -->
          <?php
          $images = [$p1, $p2, $p3];

          $repeatCount = 20;

          for ($i = 0; $i < $repeatCount; $i++) {
            foreach ($images as $image) {
          ?>
              <div class="gallery-image">
                <img src="<?= RESNPO_IMAGE . $image ?>" alt="">
              </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>
<?php
}
