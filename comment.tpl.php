<?php
?>
<div class="<?php print $classes . /*' ' . $zebra .*/ (!empty($author_comment) ? ' author-comment' : '') ?>"<?php print $attributes; ?>>

  <?php if ($new): ?>
  <span class="new"><?php print drupal_ucfirst($new) ?></span>
  <?php endif; ?>

  <?php print render($title_prefix); ?>
  <h4<?php print $title_attributes; ?>><?php print $title ?></h4>
  <?php print render($title_suffix); ?>

  <div class="comment-author">
    <cite><strong><?php print $author ?></cite></strong> <?php print t('says') ?>:
  </div>

  <?php print render($content); ?>
  
  <div class="comment-submitted">
    <?php print $created ?>
  </div>
</div>
