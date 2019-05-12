<?php
/**
 * Main Header Hook Element.
 *
 * @package ocius
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('ocius_construct_main_header')) {
    /**
     * Add main header block
     *
     * @since 1.0.0
     */
    function ocius_construct_main_header()
    {

        $has_header_image = has_header_image();
        if (!empty($has_header_image))
        {
            ?>
            <div class="site-branding" style="background-image: url(<?php echo header_image(); ?>);">
            <?php
        }
        else{
            ?>
            <div class="site-branding">
            <?php
        }
        ?>


        <div class="container-inner">
            <div class="ocius-logo-container text-center">
                <?php
                if (function_exists('the_custom_logo')) {

                    the_custom_logo();

                }
                if (is_front_page() && is_home()) : ?>
                    <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                              rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php else : ?>
                    <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                             rel="home"><?php bloginfo('name'); ?></a></p>
                <?php
                endif;

                $description = get_bloginfo('description', 'display');
                if ($description || is_customize_preview()) : ?>
                    <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                <?php
                endif; ?>
            </div> <!-- ocius-logo-container -->
        </div> <!-- .container-inner -->
        </div><!-- .site-branding -->
        <?php
    }
}
add_action('ocius_main_header', 'ocius_construct_main_header', 10);