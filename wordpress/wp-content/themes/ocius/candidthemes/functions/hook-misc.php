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
 * Display sidebar
 *
 * @since Ocius 1.0.0
 *
 * @param none
 * @return void
 *
 */
if (!function_exists('ocius_construct_sidebar')) :

    function ocius_construct_sidebar()
    {
        /**
         * Adds sidebar based on customizer option
         *
         * @since Ocius 1.0.0
         */
        global $ocius_theme_options;
        $sidebar = $ocius_theme_options['ocius-sidebar-blog-page'] ? $ocius_theme_options['ocius-sidebar-blog-page'] : 'right-sidebar';
        if (($sidebar == 'right-sidebar') || ($sidebar == 'left-sidebar')) {
            get_sidebar();
        }
    }
endif;
add_action('ocius_sidebar', 'ocius_construct_sidebar', 10);

/**
 * Display Breadcrumb
 *
 * @since Ocius 1.0.0
 *
 * @param none
 * @return void
 *
 */
if (!function_exists('ocius_construct_breadcrumb')) :

    function ocius_construct_breadcrumb()
    {
        global $ocius_theme_options;
        //Check if breadcrumb is enabled from customizer
        if ($ocius_theme_options['ocius-extra-breadcrumb'] == 1):
            /**
             * Adds Breadcrumb based on customizer option
             *
             * @since Ocius 1.0.0
             */
            ?>
            <div class="breadcrumbs">
                <?php
                $breadcrumb_args = array(
                    'container' => 'div',
                    'show_browse' => false
                );

                $ocius_you_are_here_text = esc_html($ocius_theme_options['ocius-breadcrumb-text']);
                if (!empty($ocius_you_are_here_text)) {
                    $ocius_you_are_here_text = "<span class='breadcrumb'>" . $ocius_you_are_here_text . "</span>";
                }
                echo "<div class='breadcrumbs init-animate clearfix'>" . $ocius_you_are_here_text . "<div id='ocius-breadcrumbs' class='clearfix'>";
                breadcrumb_trail($breadcrumb_args);
                echo "</div></div>";
                ?>
            </div>
        <?php
        endif;
    }
endif;
add_action('ocius_breadcrumb', 'ocius_construct_breadcrumb', 10);


/**
 * Filter to change excerpt lenght size
 *
 * @since 1.0.0
 */
if ( !function_exists('ocius_alter_excerpt') ) :
    function ocius_alter_excerpt( $length ){
        if(is_admin() ){
            return $length;
        }
        global $ocius_theme_options;
        $ocius_excerpt_length = $ocius_theme_options['ocius-excerpt-length'];
        if( !empty( $ocius_excerpt_length ) ){
            return $ocius_excerpt_length;
        }
        return 50;
    }
endif;
add_filter('excerpt_length', 'ocius_alter_excerpt');


/**
 * Post Navigation Function
 *
 * @since 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( !function_exists('ocius_posts_navigation') ) :
    function ocius_posts_navigation() {
        global $ocius_theme_options;
        $ocius_pagination_option = $ocius_theme_options['ocius-pagination-options'];
        if($ocius_pagination_option == 'default'){
            the_posts_navigation();
        }
        else{
            echo"<div class='candid-pagination'>";
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'prev_text' => __('&laquo; Prev', 'ocius'),
                'next_text' => __('Next &raquo;', 'ocius'),
            ));
            echo "</div>";
        }
    }
endif;
add_action( 'ocius_action_navigation', 'ocius_posts_navigation', 10 );


/**
 * Social Sharing Hook *
 * @since 1.0.0
 *
 * @param int $post_id
 * @return void
 *
 */
if ( !function_exists('ocius_constuct_social_sharing') ) :
    function ocius_constuct_social_sharing($post_id) {
        global $ocius_theme_options;
        $ocius_enable_blog_sharing = $ocius_theme_options['ocius-enable-blog-sharing'];
        $ocius_enable_single_sharing = $ocius_theme_options['ocius-enable-single-sharing'];
        if(($ocius_enable_blog_sharing != 1) && (!is_singular())){
            return;
        }
        if(($ocius_enable_single_sharing != 1) && (is_singular())){
            return;
        }
        $ocius_url = get_the_permalink($post_id);
        $ocius_title = get_the_title($post_id);
        $ocius_image = get_the_post_thumbnail_url($post_id);

        //sharing url
        $ocius_twitter_sharing_url = esc_url('http://twitter.com/share?text='.$ocius_title.'&url='.$ocius_url);
        $ocius_facebook_sharing_url = esc_url('https://www.facebook.com/sharer/sharer.php?u='.$ocius_url);
        $ocius_googleplus_sharing_url = esc_url('https://plus.google.com/share?url='.$ocius_url);
        $ocius_pinterest_sharing_url = esc_url('http://pinterest.com/pin/create/button/?url='.$ocius_url.'&media='.$ocius_image.'&description='.$ocius_title);
        $ocius_linkedin_sharing_url = esc_url('http://www.linkedin.com/shareArticle?mini=true&title=' . $ocius_title . '&url=' . $ocius_url);

        ?>
        <div class="meta_bottom">
            <div class="text_share header-text"><?php _e('Share', 'ocius');?></div>
            <div class="post-share">
                <a target="_blank" href="<?php echo $ocius_facebook_sharing_url; ?>"><i class="fa fa-facebook"></i></a>
                <a target="_blank" href="<?php echo $ocius_twitter_sharing_url; ?>"><i class="fa fa-twitter"></i></a>
                <a target="_blank" href="<?php echo $ocius_pinterest_sharing_url; ?>"><i class="fa fa-pinterest"></i></a>
                <a target="_blank" href="<?php echo $ocius_googleplus_sharing_url; ?>"><i class="fa fa-google-plus"></i></a>
                <a target="_blank" href="<?php echo $ocius_linkedin_sharing_url; ?>"><i class="fa fa-linkedin"></i></a>
            </div>
        </div>
        <?php
    }
endif;
add_action( 'ocius_social_sharing', 'ocius_constuct_social_sharing', 10 );