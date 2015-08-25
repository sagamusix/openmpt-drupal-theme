<?php
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <?php
  //<div class="content clearfix"<\?php print $content_attributes; ?\>>
  hide($content['links']['#links']['node-readmore']);
  hide($content['links']);
  print render($content);
  // "Read more" hack, see https://drupal.org/node/823380
  if($teaser && isset($content['body']['#object']->body['und'][0]['value']) && strpos($content['body']['#object']->body['und'][0]['value'], '<!--break-->') !== FALSE) {
      print '<p>' . l(t('Read the rest of this entry »'), 'node/' . $nid, array('attributes' => array('class' => t('node-readmore-link')))) . '</p>'; 
  } 
  if(!empty($content['links']['comment']['#links']) || !empty($content['links']['statistics']['#links'])) {
    print render($content['links']);
  }
  //</div>
  ?>

</div>
