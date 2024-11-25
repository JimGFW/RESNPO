<?php
function section_title($title = null)
{

?>
  <div class="section-title flx ai-c">
    <span><?= SVG_asterisk ?></span>
    <h1><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>
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
