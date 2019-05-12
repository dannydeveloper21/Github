<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ocius
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php ocius_do_microdata('article'); ?>>
    <?php
    $ocius_thumbnail = (has_post_thumbnail()) ? 'ocius-has-thumbnail' : 'ocius-no-thumbnail';
    ?>
    <div class="ocius-content-container <?php echo $ocius_thumbnail; ?>">
        <?php
        if (has_post_thumbnail()):
            the_post_thumbnail();
        endif;
        ?>
        <div class="ocius-content-area">
            <header class="entry-header">
                <?php the_title('<h1 class="entry-title" '.ocius_get_microdata("heading").'>', '</h1>'); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'ocius'),
                    'after' => '</div>',
                ));
                ?>
            </div><!-- .entry-content -->

            <?php if (get_edit_post_link()) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(
                        sprintf(
                            wp_kses(
                            /* translators: %s: Name of current post. Only visible to screen readers */
                                __('Edit <span class="screen-reader-text">%s</span>', 'ocius'),
                                array(
                                    'span' => array(
                                        'class' => array(),
                                    ),
                                )
                            ),
                            get_the_title()
                        ),
                        '<span class="edit-link">',
                        '</span>'
                    );
                    ?>
                </footer><!-- .entry-footer -->
            <?php endif; ?>
        </div> <!-- .ocius-content-area -->
        <?php
        /**
         * ocius_social_sharing hook
         * @since 1.0.0
         *
         * @hooked ocius_constuct_social_sharing -  10
         */
        do_action( 'ocius_social_sharing' ,get_the_ID() );
        ?>
    </div> <!-- .ocius-content-container -->
</article><!-- #post-<?php the_ID(); ?> -->
