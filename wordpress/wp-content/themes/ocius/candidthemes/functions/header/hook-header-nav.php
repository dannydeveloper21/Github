<?php
/**
 * Main Navigation Hook Element.
 *
 * @package ocius
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('ocius_construct_main_navigation')) {
    /**
     * Add main navigation on header
     *
     * @since 1.0.0
     */
    function ocius_construct_main_navigation()
    {
        if (has_nav_menu('menu-1')) :
            ?>
            <div class="ocius-menu-container">
                <div class="container-inner clear">
                    <nav id="site-navigation" class="main-navigation" <?php ocius_do_microdata('navigation'); ?>>
                        <div class="navbar-header clear">
                            <button class="menu-toggle" aria-controls="primary-menu"
                                    aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
                        </div>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'menu-1',
                            'menu_id' => 'primary-menu',
                            'container' => 'ul',
                            'menu_class' => 'nav navbar-nav'
                        ));
                        ?>
                    </nav><!-- #site-navigation -->
                </div> <!-- .container-inner -->
            </div> <!-- ocius-menu-container -->
        <?php
        endif; // has_nav_menu
    }
}
add_action('ocius_main_navigation', 'ocius_construct_main_navigation', 10);