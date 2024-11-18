<?php
function section_title($title = null)
{

?>
  <div class="section-title flx ai-c">
    <span><?= SVG_STAR ?></span>
    <h1><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>
  </div>
<?php
}
