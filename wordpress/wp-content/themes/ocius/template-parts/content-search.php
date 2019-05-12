<?php
/**
 * Template part for displaying results in search pages
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
            ocius_post_thumbnail();
        endif;
        ?>
        <div class="ocius-content-area">
            <header class="entry-header">
                <?php
                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        ocius_entry_category();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif;
                ?>
                <?php the_title(sprintf('<h2 class="entry-title" '.ocius_get_microdata("heading").'><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>

                <?php if ('post' === get_post_type()) : ?>
                    <div class="entry-meta">
                        <?php
                        ocius_posted_on();
                        ocius_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-summary">
                <?php
                $ocius_show_content = 'excerpt';
                if ( $ocius_show_content == 'excerpt' ) {
                    the_excerpt();
                } else {
                    the_content();
                }
                ?>
            </div><!-- .entry-summary -->

            <footer class="entry-footer">
                <?php ocius_entry_footer(); ?>
            </footer><!-- .entry-footer -->
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
