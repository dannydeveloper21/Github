<?php
/**
 * Header Hook Element.
 *
 * @package ocius
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('ocius_do_skip_to_content_link')) {
    /**
     * Add skip to content link before the header.
     *
     * @since 1.0.0
     */
    function ocius_do_skip_to_content_link()
    {
        ?>
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'ocius'); ?></a>
        <?php
    }
}
add_action('ocius_before_header', 'ocius_do_skip_to_content_link', 10);

if (!function_exists('ocius_header_start_container')) {
    /**
     * Add header html open tag
     *
     * @since 1.0.0
     */
    function ocius_header_start_container()
    {
        ?>
        <header id="masthead" class="site-header" <?php ocius_do_microdata('header'); ?>>
        <?php

    }
}
add_action('ocius_header_start', 'ocius_header_start_container', 10);


if (!function_exists('ocius_construct_header')) {
    /**
     * Add header block.
     *
     * @since 1.0.0
     */
    function ocius_construct_header()
    {
        /**
         * ocius_after_header_open hook.
         *
         * @since 1.0.0
         *
         */
        do_action('ocius_after_header_open');
        ?>
        <div class="overlay"></div>
        <?php
        global $ocius_theme_options;

        //Check if top header is enabled from customizer
        if ($ocius_theme_options['ocius-enable-top-header'] == 1):

            /**
             * ocius_top_bar hook.
             *
             * @since 1.0.0
             *
             * @hooked ocius_before_top_bar - 5
             * @hooked ocius_top_social_menu - 10
             * @hooked ocius_top_menu - 15
             * @hooked ocius_top_search - 20
             * @hooked ocius_after_top_bar - 25
             */
            do_action('ocius_top_bar');
        endif; // $ocius_theme_options['ocius-enable-top-header']


        /**
         * ocius_main_header hook.
         *
         * @since 1.0.0
         *
         * @hooked ocius_construct_main_header - 10
         *
         */
        do_action('ocius_main_header');


        /**
         * ocius_main_navigation hook.
         *
         * @since 1.0.0
         *
         * @hooked ocius_construct_main_navigation - 10
         *
         */
        do_action('ocius_main_navigation');


        /**
         * ocius_before_header_close hook.
         *
         * @since 1.0.0
         *
         */
        do_action('ocius_before_header_close');

    }
}
add_action('ocius_header', 'ocius_construct_header', 10);


if (!function_exists('ocius_header_end_container')) {
    /**
     * Add header html close tag
     *
     * @since 1.0.0
     */
    function ocius_header_end_container()
    {
        ?>
        </header><!-- #masthead -->
        <?php

    }
}
add_action('ocius_header_end', 'ocius_header_end_container', 10);