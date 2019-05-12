<?php
/**
 * Header Hook Element.
 *
 * @package ocius
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('ocius_before_top_bar')) {
    /**
     * Add divs to wrap top bar
     *
     * @since 1.0.0
     */
    function ocius_before_top_bar()
    {
        ?>
        <div class="top-bar">
        <div class="container-inner clear">

        <?php
    }
}
add_action('ocius_top_bar', 'ocius_before_top_bar', 5);


if (!function_exists('ocius_top_social_menu')) {
    /**
     * Add social menu on top bar
     *
     * @since 1.0.0
     */
    function ocius_top_social_menu()
    {
        global $ocius_theme_options;

        //Check if social menu is enabled from customizer
        if (has_nav_menu('social-menu') && ($ocius_theme_options['ocius-enable-top-header-social'] == 1)) :
            ?>
            <div class="ocius-social-top">
                <div class="menu-social-container">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'social-menu',
                        'menu_id' => 'menu-social-1',
                        'container' => 'ul',
                        'menu_class' => 'ocius-menu-social'
                    ));
                    ?>
                </div>
            </div> <!-- .ocius-social-top -->

        <?php
        endif; //$ocius_theme_options['ocius-enable-top-header-social']
    }
}
add_action('ocius_top_bar', 'ocius_top_social_menu', 10);


if (!function_exists('ocius_top_menu')) {
    /**
     * Add secondary menu on top bar
     *
     * @since 1.0.0
     */
    function ocius_top_menu()
    {
        global $ocius_theme_options;

        //Check if secondary menu is enabled from customizer and has menu
        if (has_nav_menu('top-menu') && ($ocius_theme_options['ocius-enable-top-header-menu'] == 1)) :
            ?>
            <span class="top-menu-icon">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </span>


            <div class="offcanvas-menu">
                <button type="button" class="close">×</button>
                <nav>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'top-menu',
                        'menu_id' => 'secondary-menu',
                        'container' => 'ul',
                        'menu_class' => 'top-menu'
                    ));
                    ?>
                </nav>

            </div>

        <?php
        endif; // has_nav_menu && $ocius_theme_options['ocius-enable-top-header-menu']
    }
}
add_action('ocius_top_bar', 'ocius_top_menu', 15);


if (!function_exists('ocius_top_search')) {
    /**
     * Add search form on top bar
     *
     * @since 1.0.0
     */
    function ocius_top_search()
    {
        global $ocius_theme_options;

        //Check if search is enabled from customizer
        if ($ocius_theme_options['ocius-enable-top-header-search'] == 1):
            ?>
            <span class="search-icon-box"><i class="fa fa-search"></i></span>
            <div class="top-bar-search">
                <button type="button" class="close">×</button>
                <?php get_search_form(); ?>
            </div>

        <?php
        endif; // $ocius_theme_options['ocius-enable-top-header-search']
    }
}
add_action('ocius_top_bar', 'ocius_top_search', 20);


if (!function_exists('ocius_after_top_bar')) {
    /**
     * Add ending divs on top bar
     *
     * @since 1.0.0
     */
    function ocius_after_top_bar()
    {
        ?>
        </div> <!-- .container-inner -->
        </div> <!-- .top-bar -->

        <?php
    }
}
add_action('ocius_top_bar', 'ocius_after_top_bar', 20);