<?php 
/**
 *  Ocius Typography Option
 *
 * @since Ocius 1.0.0
 *
 */
/*Font and Typography Options*/
$wp_customize->add_section( 'ocius_font_options', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Typography Options', 'ocius' ),
   'panel' 		 => 'ocius_panel',
) );
/*Font Family URL*/
$wp_customize->add_setting( 'ocius_options[ocius-font-family-url]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-font-family-url'],
    'sanitize_callback' => 'esc_url_raw'
) );
$wp_customize->add_control( 'ocius_options[ocius-font-family-url]', array(
    'label'     => __( 'URL of Font Family', 'ocius' ),
    'description' => sprintf('%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
        __( 'Insert', 'ocius' ),
        esc_url('https://www.google.com/fonts'),
        __('Enter Google Font URL' , 'ocius'),
        __('to add google Font.' ,'ocius')
    ),
    'section'   => 'ocius_font_options',
    'settings'  => 'ocius_options[ocius-font-family-url]',
    'type'      => 'url',
    'priority'  => 15,
) );
/*Font Family Name*/
$wp_customize->add_setting( 'ocius_options[ocius-font-family-name]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-font-family-name'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'ocius_options[ocius-font-family-name]', array(
    'label'     => __( 'Font Name', 'ocius' ),
    'description' => __('Add Font Name here, Example: Barlow Semi Condensed, sans-serif', 'ocius'),
    'section'   => 'ocius_font_options',
    'settings'  => 'ocius_options[ocius-font-family-name]',
    'type'      => 'text',
    'priority'  => 15,
) );
/*Paragraph font Size*/
$wp_customize->add_setting( 'ocius_options[ocius-font-paragraph-font-size]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-font-paragraph-font-size'],
    'sanitize_callback' => 'ocius_sanitize_number_range'
) );
$wp_customize->add_control( 'ocius_options[ocius-font-paragraph-font-size]', array(
    'label'     => __( 'Paragraph Font Size', 'ocius' ),
    'description' => __('Size apply only for paragraphs, not headings. Font size between 12px to 20px.', 'ocius'),
    'section'   => 'ocius_font_options',
    'settings'  => 'ocius_options[ocius-font-paragraph-font-size]',
    'type'      => 'number',
    'priority'  => 15,
    'input_attrs' => array(
     'min' => 12,
     'max' => 20,
     'step' => 1,
 ),
) );