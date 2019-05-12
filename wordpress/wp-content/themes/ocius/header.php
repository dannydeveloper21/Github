<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ocius
 */
global $ocius_theme_options;
$ocius_theme_options = ocius_get_options_value();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>
<body <?php body_class();?> <?php  ocius_do_microdata('body');  ?>>
<?php
//wp_body_open hook from WordPress 5.2
if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
}
?>
<div id="page" class="site">
    <?php
    /**
     * ocius_before_header hook.
     *
     * @since 1.0.0
     *
     * @hooked ocius_do_skip_to_content_link - 10
     *
     */
    do_action('ocius_before_header');


    /**
     * ocius_header_start_container hook.
     *
     * @since 1.0.0
     *
     */
    do_action('ocius_header_start');

    /**
     * ocius_header hook.
     *
     * @since 1.0.0
     *
     * @hooked ocius_construct_header - 10
     */
    do_action('ocius_header');

    /**
     * ocius_header_end_container hook.
     *
     * @since 1.0.0
     *
     */
    do_action('ocius_header_end');

    /**
     * ocius_after_header hook.
     *
     * @since 1.0.0
     *
     */
    do_action('ocius_after_header');


    //Check if slider is enabled from customizer
    if ($ocius_theme_options['ocius-enable-slider'] == 1):
        /**
         * ocius_carousel hook.
         *
         * @since 1.0.0
         *
         * @hooked ocius_constuct_carousel - 10
         */
        do_action('ocius_carousel');
    endif;
    ?>

    <div id="content" class="site-content">
        <?php
        $container_class = !is_page_template('elementor_header_footer') ? 'container-inner' : 'container-outer';
        ?>
        <div class="<?php echo $container_class; ?> clear">