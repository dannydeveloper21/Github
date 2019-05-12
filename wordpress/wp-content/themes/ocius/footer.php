<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ocius
 */

?>
</div> <!-- .container-inner -->
</div><!-- #content -->
<?php

/**
 * ocius_before_footer hook.
 *
 * @since 1.0.0
 *
 */
do_action('ocius_before_footer');


/**
 * ocius_header hook.
 *
 * @since 1.0.0
 *
 * @hooked ocius_footer_start - 10
 * @hooked ocius_footer_widget - 10
 * @hooked ocius_footer_siteinfo - 10
 * @hooked ocius_footer_end - 10
 */
do_action('ocius_footer');
?>

<?php
/**
 * ocius_construct_gototop hook
 *
 * @since 1.0.0
 *
 */
do_action('ocius_gototop');

?>

<?php

/**
 * ocius_after_footer hook.
 *
 * @since 1.0.0
 *
 */
do_action('ocius_after_footer');
?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
