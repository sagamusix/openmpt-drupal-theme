<?php

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function openmpt_breadcrumb($variables) {
  return "";
  /*$breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h4 class="element-invisible">' . t('You are here') . '</h4>';

    $output .= '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';
    return $output;
  }*/
}

/**
 * Override or insert variables into the maintenance page template.
 */
function openmpt_preprocess_maintenance_page(&$vars) {
  // While markup for normal pages is split into page.tpl.php and html.tpl.php,
  // the markup for the maintenance page is all in the single
  // maintenance-page.tpl.php template. So, to have what's done in
  // openmpt_preprocess_html() also happen on the maintenance page, it has to be
  // called here.
  openmpt_preprocess_html($vars);
}

/**
 * Override or insert variables into the html template.
 */
function openmpt_preprocess_html(&$vars) {
  if (!empty($vars['page']['featured'])) {
    $vars['classes_array'][] = 'featured';
  }

  // Add conditional CSS for IE.
  drupal_add_css(path_to_theme() . '/iefix.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 10', '!IE' => FALSE), 'preprocess' => TRUE));
  drupal_add_css(path_to_theme() . '/ie6fix.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => TRUE));
  drupal_add_css(path_to_theme() . '/ie7fix.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 8', '!IE' => FALSE), 'preprocess' => TRUE));
}

//function openmpt_process_html(&$vars) {
//}

function openmpt_js_alter(&$js) {
  // Fancybox requires JQuery 1.9, Drupal 7 only offers JQuery 1.4 / 1.5
  // exclude backend pages to avoid core js not working anymore
  // you could also just use a backend theme to avoid this
  if (arg(0) != 'admin' && !(arg(1) == 'add' && arg(2) == 'edit') || arg(0) != 'panels' || arg(0) != 'ctools') {
    // Optimise JavaScript output for guests: Only include JQuery for Fancybox
    global $user;
    if ($user->uid == 0) {
      $exclude = array(
        'misc/drupal.js' => FALSE,
        'misc/form.js' => FALSE,
        'misc/textarea.js' => FALSE,
        'modules/filter/filter.js' => FALSE,
        'misc/jquery.once.js' => FALSE,
        'settings' => FALSE,
      );
      $js = array_diff_key($js, $exclude);
    }
    $js['misc/jquery.js']['data'] = path_to_theme() . '/fancybox/lib/jquery-1.9.0.min.js';
  }
}

function openmpt_css_alter(&$css) {
  if (arg(0) != 'admin' && !(arg(1) == 'add' && arg(2) == 'edit') || arg(0) != 'panels' || arg(0) != 'ctools') {
    // Optimise CSS output for guests: Omit unused stuff
    $exclude = array(
      //'modules/system/system.base.css' => FALSE,
      //'modules/system/system.menus.css' => FALSE,
      //'modules/system/system.theme.css' => FALSE,
      'modules/system/system.messages.css' => FALSE,

      'modules/field/theme/field.css' => FALSE,
      'modules/search/search.css' => FALSE,
      'modules/user/user.css' => FALSE,
      'modules/filter/filter.css' => FALSE,
    );
   $css = array_diff_key($css, $exclude);
  }
}

/**
 * Override or insert variables into the page template.
 */
//function openmpt_preprocess_page(&$vars) {
//}

/**
 * Override or insert variables into the node template.
 */
function openmpt_preprocess_node(&$vars) {
  $vars['submitted'] = 'Posted on ' . $vars['date'] . ' by ' . $vars['name'];

  // No submit date for sticky posts
  if ($vars['sticky']) {
    $vars['display_submitted'] = FALSE;
  }
}

/**
 * Override or insert variables into the comment template.
 */
function openmpt_preprocess_comment(&$vars) {
  // change (not verified) to (visitor)
  $vars['author'] = str_replace(t('not verified'), t('visitor'), $vars['author']);

  // add a special class for node author
  if ($vars['comment']->uid == $vars['node']->uid) {
    $vars['author_comment'] = true;
  }
}

/**
 * Override or insert variables into the block template.
 */
function openmpt_preprocess_block(&$vars) {
  $vars['title_attributes_array']['class'][] = 'title';
}
