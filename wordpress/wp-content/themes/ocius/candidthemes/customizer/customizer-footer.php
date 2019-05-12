<?php 
/**
 *  Ocius Footer Option
 *
 * @since Ocius 1.0.0
 *
 */
/*Footer Options*/
$wp_customize->add_section( 'ocius_footer_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Footer Options', 'ocius' ),
   'panel' 		 => 'ocius_panel',
) );
/*Copyright Setting*/
$wp_customize->add_setting( 'ocius_options[ocius-footer-copyright]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-footer-copyright'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'ocius_options[ocius-footer-copyright]', array(
    'label'     => __( 'Copyright Text', 'ocius' ),
    'description' => __('Enter your own copyright text.', 'ocius'),
    'section'   => 'ocius_footer_section',
    'settings'  => 'ocius_options[ocius-footer-copyright]',
    'type'      => 'text',
    'priority'  => 15,
) );
/*Go to Top Setting*/
$wp_customize->add_setting( 'ocius_options[ocius-go-to-top]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-go-to-top'],
    'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-go-to-top]', array(
    'label'     => __( 'Enable Go to Top', 'ocius' ),
    'description' => __('Checked to Enable Go to Top', 'ocius'),
    'section'   => 'ocius_footer_section',
    'settings'  => 'ocius_options[ocius-go-to-top]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );