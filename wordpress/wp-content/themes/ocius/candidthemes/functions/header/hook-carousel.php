<?php
/**
 * Main Navigation Hook Element.
 *
 * @package ocius
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('ocius_constuct_carousel')) {
    /**
     * Add carousel on header
     *
     * @since 1.0.0
     */
    function ocius_constuct_carousel()
    {
        ?>
        <?php
        if (is_front_page()) {
            global $ocius_theme_options;
            $ocius_cat_id = absint($ocius_theme_options['ocius-select-category']);
            $ocius_posts_per_page = absint($ocius_theme_options['ocius-slider-number']) ? absint($ocius_theme_options['ocius-slider-number']) : 7;
            $ocius_slider_args = array();
            if(is_rtl()){
                $ocius_slider_args['rtl']      = true;
            }
            $ocius_slider_args_encoded = wp_json_encode( $ocius_slider_args );
            $ocius_query_slider = new WP_Query(
                array(
                    'posts_per_page' => $ocius_posts_per_page,
                    'cat' => $ocius_cat_id,
                    'ignore_sticky_posts' => true
                )
            );
            if ($ocius_query_slider->have_posts()):

                ?>


                <div class="ocius-slider-container">
                    <section class="section-slider">
                        <div class="header-carousel">
                            <ul class="ct-carousel slider"  data-slick='<?php echo $ocius_slider_args_encoded; ?>'>
                                <?php
                                while ($ocius_query_slider->have_posts()) : $ocius_query_slider->the_post();
                                    $carousel_block_class = has_post_thumbnail() ? 'carousel-thumbnail-block' : '';
                                    ?>
                                    <li>
                                        <div class="ct-carousel-inner <?php echo $carousel_block_class; ?>">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    the_post_thumbnail('ocius-carousel-img');
                                                }
                                                ?>
                                            </a>

                                            <div class="slide-details">
                                                <div class="slider-content-inner">
                                                    <div class="slider-content">
                                                        <h2>
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> <!-- .ct-carousel-inner -->
                                        <div class="overly"></div>
                                    </li>
                                <?php endwhile;
                                wp_reset_postdata(); ?>
                            </ul>
                        </div> <!-- .header-carousel  -->
                    </section> <!-- .section-slider -->
                </div><!-- .ocius-slider-container -->

            <?php
            endif;
        }//is_front_page
    }
}
add_action('ocius_carousel', 'ocius_constuct_carousel', 10);