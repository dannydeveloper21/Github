<?php
/**
 * Single Post Hook Element.
 *
 * @package ocius
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/**
 * Display related posts from same category
 *
 * @since 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if (!function_exists('ocius_related_post')) :

    function ocius_related_post($post_id)
    {

        global $ocius_theme_options;
        if ($ocius_theme_options['ocius-single-page-related-posts'] == 0) {
            return;
        }
        $categories = get_the_category($post_id);
        if ($categories) {
            $category_ids = array();
            $category = get_category($category_ids);
            $categories = get_the_category($post_id);
            foreach ($categories as $category) {
                $category_ids[] = $category->term_id;
            }
            $count = $category->category_count;
            if ($count > 1) { ?>
                <div class="related-pots-block">
                    <?php
                    $ocius_related_post_title = $ocius_theme_options['ocius-single-page-related-posts-title'];
                    if(!empty($ocius_related_post_title)):
                    ?>
                    <h2 class="widget-title">
                        <?php echo $ocius_related_post_title; ?>
                    </h2>
                    <?php
                    endif;
                    ?>
                    <ul class="related-post-entries clear">
                        <?php
                        $ocius_cat_post_args = array(
                            'category__in' => $category_ids,
                            'post__not_in' => array($post_id),
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post_status' => 'publish',
                            'ignore_sticky_posts' => true
                        );
                        $ocius_featured_query = new WP_Query($ocius_cat_post_args);

                        while ($ocius_featured_query->have_posts()) : $ocius_featured_query->the_post();
                            ?>
                            <li>
                                <?php
                                if (has_post_thumbnail()):
                                    ?>
                                    <figure class="widget-image">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_post_thumbnail('ocius-small-thumb'); ?>
                                        </a>
                                    </figure>
                                <?php
                                endif;
                                ?>
                                <div class="featured-desc">
                                    <h2 class="related-title">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>

                                    <div class="entry-meta">
                                        <?php
                                        ocius_posted_on();
                                        ?>
                                    </div><!-- .entry-meta -->
                                </div>
                            </li>
                        <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </ul>
                </div> <!-- .related-post-block -->
                <?php
            }
        }
    }
endif;
add_action('ocius_related_posts', 'ocius_related_post', 10, 1);