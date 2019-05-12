<?php
/**
 *  Ocius Top Header Option
 *
 * @since Ocius 1.0.0
 *
 */
/*Top Header Options*/
$wp_customize->add_section( 'ocius_header_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Header Options', 'ocius' ),
   'panel' 		 => 'ocius_panel',
) );
/*callback functions header section*/
if ( !function_exists('ocius_header_active_callback') ) :
  function ocius_header_active_callback(){
      global $ocius_theme_options;
      $enable_header = absint($ocius_theme_options['ocius-enable-top-header']);
      if( 1 == $enable_header ){
          return true;
      }
      else{
          return false;
      }
  }
endif;
/*Enable Top Header Section*/
$wp_customize->add_setting( 'ocius_options[ocius-enable-top-header]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['ocius-enable-top-header'],
   'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-enable-top-header]', array(
   'label'     => __( 'Enable Top Header', 'ocius' ),
   'description' => __('Checked to show the top header section like search and social icons', 'ocius'),
   'section'   => 'ocius_header_section',
   'settings'  => 'ocius_options[ocius-enable-top-header]',
   'type'      => 'checkbox',
   'priority'  => 5,
) );
/*Enable Social Icons In Header*/
$wp_customize->add_setting( 'ocius_options[ocius-enable-top-header-social]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['ocius-enable-top-header-social'],
   'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-enable-top-header-social]', array(
   'label'     => __( 'Enable Social Icons', 'ocius' ),
   'description' => __('You can show the social icons here. Manage social icons from Appearance > Menus. Social Menu will display here.', 'ocius'),
   'section'   => 'ocius_header_section',
   'settings'  => 'ocius_options[ocius-enable-top-header-social]',
   'type'      => 'checkbox',
   'priority'  => 5,
   'active_callback'=>'ocius_header_active_callback'
) );
/*Enable Search Icons In Header*/
$wp_customize->add_setting( 'ocius_options[ocius-enable-top-header-search]', array(
   'capability'        => 'edit_theme_options',
   'transport' => 'refresh',
   'default'           => $default['ocius-enable-top-header-search'],
   'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-enable-top-header-search]', array(
   'label'     => __( 'Enable Search Icons', 'ocius' ),
   'description' => __('You can show the search field in header.', 'ocius'),
   'section'   => 'ocius_header_section',
   'settings'  => 'ocius_options[ocius-enable-top-header-search]',
   'type'      => 'checkbox',
   'priority'  => 5,
   'active_callback'=>'ocius_header_active_callback'
) );
/*Enable Menu in top Header*/
$wp_customize->add_setting( 'ocius_options[ocius-enable-top-header-menu]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-enable-top-header-menu'],
    'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-enable-top-header-menu]', array(
    'label'     => __( 'Menu in Header', 'ocius' ),
    'description' => __('Top Header Menu will display here. Go to Appearance < Menu.', 'ocius'),
    'section'   => 'ocius_header_section',
    'settings'  => 'ocius_options[ocius-enable-top-header-menu]',
    'type'      => 'checkbox',
    'priority'  => 5,
    'active_callback'=>'ocius_header_active_callback'
) );