<?php
/**
 *  Ocius Blog Page Option
 *
 * @since Ocius 1.0.0
 *
 */
/*Blog Page Options*/
$wp_customize->add_section( 'ocius_blog_page_section', array(
   'priority'       => 20,
   'capability'     => 'edit_theme_options',
   'theme_supports' => '',
   'title'          => __( 'Blog Section Options', 'ocius' ),
   'panel' 		 => 'ocius_panel',
) );
/*Blog Page Sidebar Layout*/
$wp_customize->add_setting( 'ocius_options[ocius-sidebar-blog-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-sidebar-blog-page'],
    'sanitize_callback' => 'ocius_sanitize_select'
) );
$wp_customize->add_control( 'ocius_options[ocius-sidebar-blog-page]', array(
   'choices' => array(
    'right-sidebar'   => __('Right Sidebar','ocius'),
    'left-sidebar'    => __('Left Sidebar','ocius'),
    'no-sidebar'      => __('No Sidebar','ocius'),
    'middle-column'   => __('Middle Column','ocius')
),
   'label'     => __( 'Select the preferred sidebar', 'ocius' ),
   'description' => __('This sidebar will work for all Pages', 'ocius'),
   'section'   => 'ocius_blog_page_section',
   'settings'  => 'ocius_options[ocius-sidebar-blog-page]',
   'type'      => 'select',
   'priority'  => 10,
) );
/*Blog Page column number*/
$wp_customize->add_setting( 'ocius_options[ocius-column-blog-page]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-column-blog-page'],
    'sanitize_callback' => 'ocius_sanitize_select'
) );
$wp_customize->add_control( 'ocius_options[ocius-column-blog-page]', array(
   'choices' => array(
    'one-column'    => __('Single Column','ocius'),
    'two-columns'       => __('Two Column','ocius'),
),
   'label'     => __( 'Blog Layout Column', 'ocius' ),
   'description' => __('You can change the blog page and archive page layouts', 'ocius'),
   'section'   => 'ocius_blog_page_section',
   'settings'  => 'ocius_options[ocius-column-blog-page]',
   'type'      => 'select',
   'priority'  => 20,
) );
/*Blog Page Show content from*/
$wp_customize->add_setting( 'ocius_options[ocius-content-show-from]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-content-show-from'],
    'sanitize_callback' => 'ocius_sanitize_select'
) );
$wp_customize->add_control( 'ocius_options[ocius-content-show-from]', array(
   'choices' => array(
    'excerpt'    => __('Excerpt','ocius'),
    'content'    => __('Content','ocius')
),
   'label'     => __( 'Select Content Display Option', 'ocius' ),
   'description' => __('You can enable excerpt from Screen Options inside post section of dashboard', 'ocius'),
   'section'   => 'ocius_blog_page_section',
   'settings'  => 'ocius_options[ocius-content-show-from]',
   'type'      => 'select',
   'priority'  => 30,
) );
/*Blog Page excerpt length*/
$wp_customize->add_setting( 'ocius_options[ocius-excerpt-length]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-excerpt-length'],
    'sanitize_callback' => 'absint'
) );
$wp_customize->add_control( 'ocius_options[ocius-excerpt-length]', array(
    'label'     => __( 'Size of Excerpt Content', 'ocius' ),
    'description' => __('Enter the number per Words to show the content in blog page.', 'ocius'),
    'section'   => 'ocius_blog_page_section',
    'settings'  => 'ocius_options[ocius-excerpt-length]',
    'type'      => 'number',
    'priority'  => 40,
) );
/*Blog Page Pagination Options*/
$wp_customize->add_setting( 'ocius_options[ocius-pagination-options]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-pagination-options'],
    'sanitize_callback' => 'ocius_sanitize_select'
) );
$wp_customize->add_control( 'ocius_options[ocius-pagination-options]', array(
   'choices' => array(
    'default'    => __('Default','ocius'),
    'numeric'    => __('Numeric','ocius')
),
   'label'     => __( 'Pagination Types', 'ocius' ),
   'description' => __('Select the Required Pagination Type', 'ocius'),
   'section'   => 'ocius_blog_page_section',
   'settings'  => 'ocius_options[ocius-pagination-options]',
   'type'      => 'select',
   'priority'  => 50,
) );
/*Blog Page read more text*/
$wp_customize->add_setting( 'ocius_options[ocius-read-more-text]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-read-more-text'],
    'sanitize_callback' => 'sanitize_text_field'
) );
$wp_customize->add_control( 'ocius_options[ocius-read-more-text]', array(
    'label'     => __( 'Enter Read More Text', 'ocius' ),
    'description' => __('Read more text for blog and archive page.', 'ocius'),
    'section'   => 'ocius_blog_page_section',
    'settings'  => 'ocius_options[ocius-read-more-text]',
    'type'      => 'text',
    'priority'  => 60,
) );

/*Blog Page social sharing*/
$wp_customize->add_setting( 'ocius_options[ocius-enable-blog-sharing]', array(
    'capability'        => 'edit_theme_options',
    'transport' => 'refresh',
    'default'           => $default['ocius-enable-blog-sharing'],
    'sanitize_callback' => 'ocius_sanitize_checkbox'
) );
$wp_customize->add_control( 'ocius_options[ocius-enable-blog-sharing]', array(
    'label'     => __( 'Enable Social Sharing', 'ocius' ),
    'description' => __('Checked to Enable Social Sharing In Home Page,  Search Page and Archive page.', 'ocius'),
    'section'   => 'ocius_blog_page_section',
    'settings'  => 'ocius_options[ocius-enable-blog-sharing]',
    'type'      => 'checkbox',
    'priority'  => 70,
) );