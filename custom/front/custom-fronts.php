<?php

function section_title($title = null)
{
?>
  <div class="section-title flx ai-c">
    <span><?= file_get_contents(RESNPO_SVG . '/asterisk.svg') ?: 'SVG not found' ?></span>
    <h1><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h1>
  </div>
<?php
}
