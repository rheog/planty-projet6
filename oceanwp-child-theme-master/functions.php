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
function afficher_admin_dans_header()
{
    if (current_user_can('administrator')) {
        echo '<span>Admin</span>';
    }
}
add_action('elementor/header/render', 'afficher_admin_dans_header');


 */
function afficher_admin_header()
{
    if (is_user_logged_in() && current_user_can('manage_options')) {
        echo '<div style="text-align: center;">';
        echo '<span style="display: block;">Admin</span>';
        echo '</div>';
    }
}
