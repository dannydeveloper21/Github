<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ocius
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> <?php ocius_do_microdata('article'); ?>>
    <?php
    global $ocius_theme_options;
    $ocius_show_image = $ocius_theme_options['ocius-single-page-featured-image'];
    $ocius_show_content = $ocius_theme_options['ocius-content-show-from'];
    $ocius_thumbnail = (has_post_thumbnail() && ($ocius_show_image == 1)) ? 'ocius-has-thumbnail' : 'ocius-no-thumbnail';
    ?>
    <div class="ocius-content-container <?php echo $ocius_thumbnail; ?>">
        <?php
        if ($ocius_thumbnail == 'ocius-has-thumbnail'):
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

                if (is_singular()) :
                    the_title('<h1 class="entry-title" '.ocius_get_microdata("heading").'>', '</h1>');
                else :
                    the_title('<h2 class="entry-title" '.ocius_get_microdata("heading").'><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                endif;

                if ('post' === get_post_type()) :
                    ?>
                    <div class="entry-meta">
                        <?php
                        ocius_posted_on();
                        ocius_posted_by();
                        ?>
                    </div><!-- .entry-meta -->
                <?php endif; ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php
                if (is_singular()) :
                    the_content();
                else :
                    if ( $ocius_show_content == 'excerpt' ) {
                        the_excerpt();
                    } else {
                        the_content();
                    }
                endif;

                wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'ocius'),
                    'after' => '</div>',
                ));
                ?>

                <?php
                $ocius_read_more_text =  $ocius_theme_options['ocius-read-more-text'];
                if ( ( !is_single() ) && ( $ocius_show_content == 'excerpt' ) ) {
                    if(!empty($ocius_read_more_text)){                ?>
                        <p><a href="<?php the_permalink(); ?>" class="read-more-text">
                            <?php echo esc_html( $ocius_read_more_text ); ?>

                        </a></p>
                        <?php
                    }
                }
                ?>
            </div>
            <!-- .entry-content -->

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
