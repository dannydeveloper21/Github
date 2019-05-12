<?php 
/**
 *  Ocius Sticky Sidebar Option
 *
 * @since Ocius 1.0.0
 *
 */
/*Sticky Sidebar Setting*/
$wp_customize->add_setting( 'ocius_options[ocius-enable-sticky-sidebar]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-enable-sticky-sidebar'],
    'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-enable-sticky-sidebar]', array(
    'label'     => __( 'Sticky Sidebar Option', 'ocius' ),
    'description' => __('Enable and Disable sticky sidebar from this section.', 'ocius'),
    'section'   => 'ocius_sticky_sidebar',
    'settings'  => 'ocius_options[ocius-enable-sticky-sidebar]',
    'type'      => 'checkbox',
    'priority'  => 15,
) );