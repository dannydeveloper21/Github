<?php 
/**
 *  Ocius Additional Settings Option
 *
 * @since Ocius 1.0.0
 *
 */
/*Extra Options*/
$wp_customize->add_section( 'ocius_extra_options', array(
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => __( 'Extra Options', 'ocius' ),
    'panel'          => 'ocius_panel',
) );
/*Breadcrumb Enable*/
$wp_customize->add_setting( 'ocius_options[ocius-extra-breadcrumb]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-extra-breadcrumb'],
    'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-extra-breadcrumb]', array(
    'label'     => __( 'Enable Breadcrumb', 'ocius' ),
    'description' => __( 'Breadcrumb will appear on all pages except home page', 'ocius' ),
    'section'   => 'ocius_extra_options',
    'settings'  => 'ocius_options[ocius-extra-breadcrumb]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );
/*Breadcrumb Text*/
$wp_customize->add_setting( 'ocius_options[ocius-breadcrumb-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-breadcrumb-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'ocius_options[ocius-breadcrumb-text]', array(
    'label'     => __( 'Breadcrumb Text', 'ocius' ),
    'description' => __( 'Write your own text in place of You are Here', 'ocius' ),
    'section'   => 'ocius_extra_options',
    'settings'  => 'ocius_options[ocius-breadcrumb-text]',
    'type'      => 'text',
    'priority'  => 15,
) );