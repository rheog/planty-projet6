<?php

/**
 * OceanWP Child Theme Functions
 *
 * When running a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions will be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style()
{

    // Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update the theme).
    $theme   = wp_get_theme('OceanWP');
    $version = $theme->get('Version');

    // Load the stylesheet.
    wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('oceanwp-style'), $version);
}

add_action('wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style');

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')) :
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

// END ENQUEUE PARENT ACTION
// hook header admin
/*
function display_user_menu()
{
    if (is_user_logged_in()) {
        // Utilisateur connecté
        if (current_user_can('administrator')) {
            // Menu pour les administrateurs
            wp_nav_menu(array('menu' => 'Admin_menu'));
        } else {
            // Menu pour les autres utilisateurs connectés
            wp_nav_menu(array('menu' => 'wp menu'));
        }
    }
}
*/
// end

// Affiche le menu différent selon les utilisateurs connectés
// Affiche le menu différent selon les utilisateurs connectés
/*display_user_menu();*/
add_filter('wp_nav_menu_objects', 'filter_menu_items', 10, 2);

function filter_menu_items($items, $args)
{
    // Vérifie si l'utilisateur est connecté
    if (is_user_logged_in()) {
        return $items;
    }

    foreach ($items as $key => $item) {
        // Supprime le lien Admin du menu pour les utilisateurs non connectés
        if ($item->title == 'Admin') {
            unset($items[$key]);
        }
    }

    return $items;
}
