<?php
/**
 *  Ocius Slider Option
 *
 * @since Ocius 1.0.0
 *
 */
/*Slider Options*/
$wp_customize->add_section( 'ocius_slider_section', array(
 'priority'       => 20,
 'capability'     => 'edit_theme_options',
 'theme_supports' => '',
 'title'          => __( 'Slider Options', 'ocius' ),
 'panel' 		 => 'ocius_panel',
) );
/*callback functions slider*/
if ( !function_exists('ocius_slider_active_callback') ) :
  function ocius_slider_active_callback(){
    global $ocius_theme_options;
    $enable_slider = absint($ocius_theme_options['ocius-enable-slider']);
    if( 1 == $enable_slider ){
      return true;
    }
    else{
      return false;
    }
  }
endif;
/*Slider Enable Option*/
$wp_customize->add_setting( 'ocius_options[ocius-enable-slider]', array(
 'capability'        => 'edit_theme_options',
 'transport' => 'refresh',
 'default'           => $default['ocius-enable-slider'],
 'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-enable-slider]', array(
 'label'     => __( 'Enable Slider', 'ocius' ),
 'description' => __('Checked to Enable Slider In Home Page. Make sure header image is not set to display the slider', 'ocius'),
 'section'   => 'ocius_slider_section',
 'settings'  => 'ocius_options[ocius-enable-slider]',
 'type'      => 'checkbox',
 'priority'  => 5,
) );
/*Slider Category Selection*/
$wp_customize->add_setting( 'ocius_options[ocius-select-category]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['ocius-select-category'],
  'sanitize_callback' => 'absint'
) );
$wp_customize->add_control(
  new ocius_Customize_Category_Dropdown_Control(
    $wp_customize,
    'ocius_options[ocius-select-category]',
    array(
      'label'     => __( 'Select Category For Slider', 'ocius' ),
      'description' => __('From the dropdown select the category for the slider. Category having post will display in below dropdown.', 'ocius'),
      'section'   => 'ocius_slider_section',
      'settings'  => 'ocius_options[ocius-select-category]',
      'type'      => 'category_dropdown',
      'priority'  => 5,
      'active_callback'=>'ocius_slider_active_callback'
    )
  )
);
/*Slider Number*/
$wp_customize->add_setting( 'ocius_options[ocius-slider-number]', array(
  'capability'        => 'edit_theme_options',
  'transport' => 'refresh',
  'default'           => $default['ocius-slider-number'],
  'sanitize_callback' => 'ocius_sanitize_number_range'
) );
$wp_customize->add_control( 'ocius_options[ocius-slider-number]', array(
  'label'     => __( 'Number of Slides ', 'ocius' ),
  'description' => __('Select the number of slide. Maximum slide is 10 and minium 5', 'ocius'),
  'section'   => 'ocius_slider_section',
  'settings'  => 'ocius_options[ocius-slider-number]',
  'type'      => 'number',
  'priority'  => 15,
  'active_callback'=>'ocius_slider_active_callback',
  'input_attrs' => array(
    'min' => '5',
    'max' => '10',
    'step' => '1',
  ),
) );