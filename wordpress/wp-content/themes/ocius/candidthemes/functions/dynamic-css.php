<?php
/**
 * Dynamic CSS elements.
 *
 * @package ocius
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


if (!function_exists('ocius_dynamic_css')) :
    /**
     * Dynamic CSS
     *
     * @since 1.0.0
     *
     * @param null
     * @return null
     *
     */
    function ocius_dynamic_css()
    {

        global $ocius_theme_options;
        $ocius_font_family = $ocius_theme_options['ocius-font-family-name'] ?  wp_kses_post( $ocius_theme_options['ocius-font-family-name'] ) :  esc_html__('Poppins, sans-serif', 'ocius');
        $ocius_font_size = $ocius_theme_options['ocius-font-paragraph-font-size'] ? absint( $ocius_theme_options['ocius-font-paragraph-font-size'] ) : 16;
        $ocius_primary_color = $ocius_theme_options['ocius-primary-color'] ?  esc_attr( $ocius_theme_options['ocius-primary-color'] ) : '#ff8800';
        $ocius_header_color = get_header_textcolor();
        $ocius_custom_css = '';

        if (!empty($ocius_header_color)) {
            $ocius_custom_css .= ".site-title, .site-title a { color: #{$ocius_header_color}; }";
        }

        /* Typography Section */
        if (!empty($ocius_font_family)) {
            $ocius_custom_css .= "body { font-family: {$ocius_font_family}; }";
        }

        if (!empty($ocius_font_size)) {
            $ocius_custom_css .= "body { font-size: {$ocius_font_size}px; }";
        }

        /* Primary Color Section */
        if (!empty($ocius_primary_color)) {
            //font-color
            $ocius_custom_css .= ".entry-content a, .entry-title a:hover, .related-title a:hover, .posts-navigation .nav-previous a:hover, .post-navigation .nav-previous a:hover, .posts-navigation .nav-next a:hover, .post-navigation .nav-next a:hover, #comments .comment-content a:hover, #comments .comment-author a:hover, .main-navigation ul li a:hover, .main-navigation ul li.current-menu-item > a, .offcanvas-menu nav ul.top-menu li a:hover, .offcanvas-menu nav ul.top-menu li.current-menu-item > a, .post-share a:hover, .error-404-title, #ocius-breadcrumbs a:hover, .entry-content a.read-more-text:hover { color : {$ocius_primary_color}; }";

            //background-color
            $ocius_custom_css .= ".search-form input[type=submit], input[type=\"submit\"], ::selection, #toTop, .breadcrumbs span.breadcrumb, article.sticky .ocius-content-container, .candid-pagination .page-numbers.current, .candid-pagination .page-numbers:hover { background : {$ocius_primary_color}; }";

            //border-color
            $ocius_custom_css .= "blockquote, .search-form input[type=\"submit\"], input[type=\"submit\"], .candid-pagination .page-numbers { border-color : {$ocius_primary_color}; }";
        }

        wp_add_inline_style('ocius-style', $ocius_custom_css);
    }
endif;
add_action('wp_enqueue_scripts', 'ocius_dynamic_css', 99);