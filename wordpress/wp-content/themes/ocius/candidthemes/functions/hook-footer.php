<?php
/**
 * Header Hook Element.
 *
 * @package ocius
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

if (!function_exists('ocius_footer_start')) {
    /**
     * Add footer start tag.
     *
     * @since 1.0.0
     *
     * @param none
     * @return void
     *
     */
    function ocius_footer_start()
    {
        ?>
        <footer id="colophon" class="site-footer">
        <?php
    }
}
add_action('ocius_footer', 'ocius_footer_start', 5);


if (!function_exists('ocius_footer_widget')) {
    /**
     * Add footer top widget blocks
     *
     * @since 1.0.0
     *
     * @param none
     * @return void
     *
     */
    function ocius_footer_widget()
    {
        //Check if there are widgets on any footer sidebar
        if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) {
            ?>

            <div class="top-footer">
                <div class="container-inner clear">
                    <?php
                    $count = 0;
                    for ($i = 1; $i <= 3; $i++) {
                        if (is_active_sidebar('footer-' . $i)) {
                            $count++;
                        }
                    }
                    $column = $count;
                    $column_class = 'widget-column footer-active-' . absint($count);
                    for ($i = 1; $i <= 4; $i++) {
                        if (is_active_sidebar('footer-' . $i)) {
                            ?>
                            <div class="ct-col-<?php echo esc_attr($column); ?>">
                                <?php dynamic_sidebar('footer-' . $i); ?>
                            </div>
                            <?php
                        }
                    }

                    ?>
                </div> <!-- .container-inner -->
            </div> <!-- .top-footer -->
            <?php
        }
    }
}
add_action('ocius_footer', 'ocius_footer_widget', 10);


if (!function_exists('ocius_footer_siteinfo')) {
    /**
     * Add footer site info block
     *
     * @since 1.0.0
     *
     * @param none
     * @return void
     */
    function ocius_footer_siteinfo()
    {
        ?>

        <div class="site-info" <?php ocius_do_microdata('footer'); ?>>
            <div class="container-inner">
                <?php
                global $ocius_theme_options;
                $ocius_copyright = wp_kses_post($ocius_theme_options['ocius-footer-copyright']);
                if( !empty( $ocius_copyright ) ):
                    ?>
                    <span class="copy-right-text"><?php echo $ocius_copyright; ?></span>
                    <?php
                endif; //$ocius_copyright
                ?>
                <a href="<?php echo esc_url(__('https://wordpress.org/', 'ocius')); ?>" target="_blank">
                    <?php
                    /* translators: %s: CMS name, i.e. WordPress. */
                    printf(esc_html__('Proudly powered by %s', 'ocius'), 'WordPress');
                    ?>
                </a>
                <span class="sep"> | </span>
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf(esc_html__('Theme: %1$s by %2$s.', 'ocius'), 'Ocius', '<a href="https://www.candidthemes.com/" target="_blank">Candid Themes</a>');
                ?>
            </div> <!-- .container-inner -->
        </div><!-- .site-info -->
        <?php
    }
}
add_action('ocius_footer', 'ocius_footer_siteinfo', 15);


if (!function_exists('ocius_footer_end')) {
    /**
     * Add footer end tag.
     *
     * @since 1.0.0
     *
     * @param none
     * @return void
     *
     */
    function ocius_footer_end()
    {
        ?>
        </footer><!-- #colophon -->
        <?php
    }
}
add_action('ocius_footer', 'ocius_footer_end', 20);

if (!function_exists('ocius_construct_gototop')) {
    /**
     * Add Go to Top Button on Site.
     *
     * @since 1.0.0
     *
     * @param none
     * @return void
     *
     */
    function ocius_construct_gototop()
    {
        global $ocius_theme_options;
        if ($ocius_theme_options['ocius-go-to-top'] == 1):
            ?>
            <a id="toTop" class="go-to-top" href="#" title="<?php esc_attr_e('Go to Top', 'ocius'); ?>">
                <i class="fa fa-angle-double-up"></i>
            </a>
        <?php
        endif;

    }
}
add_action('ocius_gototop', 'ocius_construct_gototop', 10);