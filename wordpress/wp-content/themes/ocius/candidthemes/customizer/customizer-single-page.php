<?php 
/**
 *  Ocius Single Page Option
 *
 * @since Ocius 1.0.0
 *
 */
/*Single Page Options*/
$wp_customize->add_section( 'ocius_single_page_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Single Post Options', 'ocius' ),
   'panel' 		 => 'ocius_panel',
) );
/*Featured Image Option*/
$wp_customize->add_setting( 'ocius_options[ocius-single-page-featured-image]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-single-page-featured-image'],
    'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-single-page-featured-image]', array(
    'label'     => __( 'Enable Featured Image', 'ocius' ),
    'description' => __('You can hide or show featured image on single page.', 'ocius'),
    'section'   => 'ocius_single_page_section',
    'settings'  => 'ocius_options[ocius-single-page-featured-image]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*Related Post Options*/
$wp_customize->add_setting( 'ocius_options[ocius-single-page-related-posts]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-single-page-related-posts'],
    'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-single-page-related-posts]', array(
    'label'     => __( 'Enable Related Posts', 'ocius' ),
    'description' => __('3 Post from similar category will display at the end of the page.', 'ocius'),
    'section'   => 'ocius_single_page_section',
    'settings'  => 'ocius_options[ocius-single-page-related-posts]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*callback functions related posts*/
if ( !function_exists('ocius_related_post_callback') ) :
  function ocius_related_post_callback(){
      global $ocius_theme_options;
      $related_posts = absint($ocius_theme_options['ocius-single-page-related-posts']);
      if( 1 == $related_posts ){
          return true;
      }
      else{
          return false;
      }
  }
endif;
/*Related Post Title*/
$wp_customize->add_setting( 'ocius_options[ocius-single-page-related-posts-title]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-single-page-related-posts-title'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'ocius_options[ocius-single-page-related-posts-title]', array(
    'label'     => __( 'Related Posts Title', 'ocius' ),
    'description' => __('Give the appropriate title for related posts', 'ocius'),
    'section'   => 'ocius_single_page_section',
    'settings'  => 'ocius_options[ocius-single-page-related-posts-title]',
    'type'      => 'text',
    'priority'  => 15,
    'active_callback'=>'ocius_related_post_callback'
) );
/* Single Page social sharing*/
$wp_customize->add_setting( 'ocius_options[ocius-enable-single-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-enable-single-sharing'],
    'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-enable-single-sharing]', array(
    'label'     => __( 'Enable Social Sharing', 'ocius' ),
    'description' => __('Checked to Enable Social Sharing In Single post and page.', 'ocius'),
    'section'   => 'ocius_single_page_section',
    'settings'  => 'ocius_options[ocius-enable-single-sharing]',
    'type'      => 'checkbox',
    'priority'  => 20,
) );

/*Sticky Sidebar*/
$wp_customize->add_section( 'ocius_sticky_sidebar', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Sticky Sidebar', 'ocius' ),
   'panel' 		 => 'ocius_panel',
) );