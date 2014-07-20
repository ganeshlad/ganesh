<?php

/**
 * @file
 * template.php
 */

function Libra_preprocess_html(&$variables) {
    $options = array(
        'group' => JS_THEME,
    );
    drupal_add_js(drupal_get_path('theme', 'Libra'). '/js/libra.js', $options);
}



/**
 * Implements hook_process_page().
 *
 * @see page--topics.tpl.php
 */

function Libra_process_page(&$variables) {
    if (isset($variables['node']->type)) {
        $variables['section'] = 'Drupal 7 View Module';
        $variables['chapters'] = 'Advanced View Modules';
    }
}


/**
 * Implements hook_preprocess_page().
 *
 * @see page.tpl.php
 */
function Libra_preprocess_page(&$variables){
    if (isset($variables['node']->type)) {
        $content_type = $variables['node']->type;
        $variables['theme_hook_suggestions'][] = 'page__' . $content_type;
    }

// Primary nav.
    $variables['primary_nav'] = FALSE;
    if ($variables['main_menu']) {
// Build links.
        $variables['primary_nav'] = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
// Provide default theme wrapper function.
        $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__primary');
    }


// Secondary nav
$variables['secondary_nav'] = FALSE;
if ($variables['secondary_menu']) {
    // Build links
    $variables['secondary_nav'] = menu_tree(variable_get('menu_secondary_links_source', 'user-menu'));
    // Provide default theme wrapper function
    $variables['secondary_nav']['#theme_wrappers'] = array('menu_tree__secondary');
}

// Add variable for site title
$variables['my_site_title'] = variable_get('site_name');


}


