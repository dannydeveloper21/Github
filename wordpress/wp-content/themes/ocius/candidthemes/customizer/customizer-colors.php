<?php 
/**
 *  Ocius Color Option
 *
 * @since Ocius 1.0.0
 *
 */
/* Primary Color Section Inside Core Color Option */
$wp_customize->add_setting( 'ocius_options[ocius-primary-color]',
    array(
        'default'           => $default['ocius-primary-color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(                 
        $wp_customize,
        'ocius_options[ocius-primary-color]',
        array(
            'label'       => esc_html__( 'Primary Color', 'ocius' ),
            'description' => esc_html__( 'Applied to main color of site.', 'ocius' ),
            'section'     => 'colors',  
        )
    )
);