<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ocius
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
        /**
         * ocius_before_main_content hook.
         *
         * @since 0.1
         */
        do_action( 'ocius_before_main_content' );

        /**
         * ocius_breadcrumb hook.
         *
         * @since 1.0
         * @hooked ocius_construct_breadcrumb -  10
         *
         */
        do_action( 'ocius_breadcrumb' );

		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

            /**
             * ocius_after_single_post_navigation hook
             * @since Ocius 1.0.0
             *
             */
            do_action( 'ocius_after_single_post_navigation' );


            /**
             * ocius_related_posts hook
             * @since Ocius 1.0.0
             *
             * @hooked ocius_related_posts -  10
             */
            do_action( 'ocius_related_posts' ,get_the_ID() );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.

        /**
         * ocius_after_main_content hook.
         *
         * @since 0.1
         */
        do_action( 'ocius_after_main_content' );
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
/**
 * ocius_sidebar hook
 * @since Ocius 1.0.0
 *
 * @hooked ocius_sidebar -  10
 */
do_action( 'ocius_sidebar');

get_footer();
