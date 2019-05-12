<?php 
/**
 * Ocius Theme Customizer default values
 *
 * @package Ocius
 */
if ( !function_exists('ocius_default_theme_options_values') ) :
    function ocius_default_theme_options_values() {
        $default_theme_options = array(
            /*Top Header Section Default Value*/
            'ocius-primary-color' => '#ff8800',
        	/*Top Header Section Default Value*/
        	'ocius-enable-top-header'=> true,
        	'ocius-enable-top-header-social'=> true,
        	'ocius-enable-top-header-search'=> true,
            'ocius-enable-top-header-menu'=> true,
        	/*Slider Section Default Value*/
        	'ocius-enable-slider' => true,
        	'ocius-select-category'=> false,
        	'ocius-slider-number'=>7,
        	/*Blog Page Default Value*/
        	'ocius-sidebar-blog-page'=>'right-sidebar',
        	'ocius-column-blog-page'=> 'one-column',
        	'ocius-content-show-from'=>'excerpt',
        	'ocius-excerpt-length'=>25,
        	'ocius-pagination-options'=>'numeric',
        	'ocius-read-more-text'=> esc_html__('Read More','ocius'),
            'ocius-enable-blog-sharing'=> true,
        	/*Single Page Default Value*/
        	'ocius-single-page-featured-image'=> true,
        	'ocius-single-page-related-posts'=> true,
        	'ocius-single-page-related-posts-title'=> esc_html__('Related Posts','ocius'),
            'ocius-enable-single-sharing'=> true,
        	/*Sticky Sidebar Options*/
        	'ocius-enable-sticky-sidebar'=> true,
        	/*Footer Section*/
        	'ocius-footer-copyright' =>  esc_html__('All Right Reserved 2019.','ocius'),
        	'ocius-go-to-top'=> true,
        	/*Font Options*/
        	'ocius-font-family-url'=> esc_url('//fonts.googleapis.com/css?family=Poppins', 'ocius'),
        	'ocius-font-family-name'=> esc_html__('Poppins, sans-serif', 'ocius'),
        	'ocius-font-paragraph-font-size'=> 16,
            /*Extra Options*/
            'ocius-extra-breadcrumb'=> true,
            'ocius-breadcrumb-text'=>  esc_html__('You are Here','ocius')
        );
        return apply_filters( 'ocius_default_theme_options_values', $default_theme_options );
    }
endif;

/**
 *  Ocius Theme Options and Settings
 *
 * @since Ocius 1.0.0
 *
 * @param null
 * @return array ocius_get_options_value
 *
 */
if ( !function_exists('ocius_get_options_value') ) :
    function ocius_get_options_value() {
        $ocius_default_theme_options_values = ocius_default_theme_options_values();
        $ocius_get_options_value = get_theme_mod( 'ocius_options');
        if( is_array( $ocius_get_options_value )){
            return array_merge( $ocius_default_theme_options_values, $ocius_get_options_value );
        }
        else{
            return $ocius_default_theme_options_values;
        }
    }
endif;