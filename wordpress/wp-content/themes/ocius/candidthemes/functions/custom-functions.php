<?php
/**
 * Header elements.
 *
 * @package ocius
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
/**
 * Function to list categories of a post
 *
 * @since 1.0.0
 *
 * @param int $post_id
 * @return void Lists of categories with its link
 *
 */
if (!function_exists('ocius_list_category')) :
    function ocius_list_category($post_id = 0)
    {

        if (0 == $post_id) {
            global $post;
            if (isset($post->ID)) {
                $post_id = $post->ID;
            }
        }
        if (0 == $post_id) {
            return null;
        }
        $categories = get_the_category($post_id);
        $separator = '&nbsp;';
        $output = '';
        if ($categories) {
            $output .= '<span class="cat-name"><i class="fa fa-folder-open"></i>';
            foreach ($categories as $category) {
                $output .= '<a href="' . esc_url(get_category_link($category->term_id)) . '"  rel="category tag">' . esc_html($category->cat_name) . '</a>' . $separator;
            }
            $output .= '</span>';
            echo trim($output, $separator);
        }

    }
endif;


/**
 * Function to modify tag clouds font size
 *
 * @since 1.0.0
 *
 * @param none
 * @return array $args
 *
 */
if (!function_exists('ocius_tag_cloud_widget')) :
    function ocius_tag_cloud_widget($args)
    {
        $args['largest'] = 12; //largest tag
        $args['smallest'] = 12; //smallest tag
        $args['unit'] = 'px'; //tag font unit
        return $args;
    }
endif;
add_filter('widget_tag_cloud_args', 'ocius_tag_cloud_widget');


/**
 * Callback functions for comments
 *
 * @since 1.0.0
 *
 * @param $comment
 * @param $args
 * @param $depth
 * @return void
 *
 */
if (!function_exists('ocius_commment_list')) :

    function ocius_commment_list($comment, $args, $depth)
    {
        $args['avatar_size'] = apply_filters('ocius_comment_avatar_size', 50);

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
            <div class="comment-body">
                <?php _e('Pingback:', 'ocius'); // WPCS: XSS OK. ?><?php comment_author_link(); ?><?php edit_comment_link(__('Edit', 'ocius'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>"
                     class="comment-body" <?php ocius_do_microdata('comment-body'); ?>>
                <footer class="comment-meta">
                    <?php
                    if (0 != $args['avatar_size']) {
                        echo get_avatar($comment, $args['avatar_size']);
                    }
                    ?>
                    <div class="comment-author-info">
                        <div class="comment-author vcard" <?php ocius_do_microdata('comment-author'); ?>>
                            <?php printf('<span itemprop="name" class="fn"><strong>%s</strong></span>', get_comment_author_link()); ?>
                        </div><!-- .comment-author -->

                        <div class="entry-meta comment-metadata">
                            <span><i class="fa fa-calendar"></i><a
                                        href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                <time datetime="<?php comment_time('c'); ?>" itemprop="datePublished">
                                    <?php printf( // WPCS: XSS OK.
                                    /* translators: 1: date, 2: time */
                                        _x('%1$s at %2$s', '1: date, 2: time', 'ocius'),
                                        get_comment_date(),
                                        get_comment_time()
                                    ); ?>s
                                </time>
                            </a></span>
                            <?php edit_comment_link(__('Edit', 'ocius'), '<span class="edit-link"><i class="fa fa-pencil"></i> ', '</span>'); ?>
                            <?php
                            comment_reply_link(array_merge($args, array(
                                'add_below' => 'div-comment',
                                'depth' => $depth,
                                'max_depth' => $args['max_depth'],
                                'before' => '<span class="reply"><i class="fa fa-comment-o"></i> ',
                                'after' => '</span>',
                            )));
                            ?>
                        </div><!-- .comment-metadata -->
                    </div><!-- .comment-author-info -->

                    <?php if ('0' == $comment->comment_approved) : ?>
                        <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'ocius'); // WPCS: XSS OK. ?></p>
                    <?php endif; ?>
                </footer><!-- .comment-meta -->

                <div class="comment-content" itemprop="text">
                    <?php comment_text(); ?>
                </div><!-- .comment-content -->
            </article><!-- .comment-body -->
        <?php
        endif;
    }
endif;

/**
 * Add sidebar class in body
 *
 * @since 1.0.0
 *
 */
if (!function_exists('ocius_custom_body_class')) :
    function ocius_custom_body_class($classes)
    {
        global $ocius_theme_options;
        $ocius_sidebar = $ocius_theme_options['ocius-sidebar-blog-page'];
        $ocius_sticky_sidebar = $ocius_theme_options['ocius-enable-sticky-sidebar'];
        if( $ocius_sticky_sidebar == 1){
            $classes[] = 'ct-sticky-sidebar';
        }
        if ($ocius_sidebar == 'no-sidebar') {
            $classes[] = 'no-sidebar';
        } elseif ($ocius_sidebar == 'left-sidebar') {
            $classes[] = 'left-sidebar';
        } elseif ($ocius_sidebar == 'middle-column') {
            $classes[] = 'middle-column';
        } else {
            $classes[] = 'right-sidebar';
        }
        return $classes;
    }
endif;

add_filter('body_class', 'ocius_custom_body_class');

/**
 * Remove ... From Excerpt
 *
 * @since 1.0.0
 *
 */
if ( !function_exists('ocius_excerpt_more') ) :
    function ocius_excerpt_more( $more ) {
        if(!is_admin() ){
            return '';
        }
    }
endif;
add_filter('excerpt_more', 'ocius_excerpt_more');



/**
 * Add class in post list
 *
 * @since 1.0.0
 *
 */
add_filter('post_class', 'ocius_post_column_class');
function ocius_post_column_class($classes)
{
    global $ocius_theme_options;
    if( !is_singular()){
        $classes[] =  esc_attr( $ocius_theme_options['ocius-column-blog-page']);
    }
    return $classes;
}