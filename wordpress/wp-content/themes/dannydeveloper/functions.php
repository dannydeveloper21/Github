<?php
/**
 * Danny Developer functions and definitions
 *
 * https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * WordPress
 * dannydeveloper
 * 1.0
 **/
require_once('options.php');
define('TEMPPATH', get_bloginfo('stylesheet_directory'));
define('IMAGES', TEMPPATH . '/images');

//adding image support
add_theme_support('post-thumbnails');

//Adding menu support example 1
/*function wp_top_nav_menu()
{
    register_nav_menu('top_nav_menu', __('Primary Menu'));
}
add_action('init', 'wp_top_nav_menu');*/

//adding menu support example 2
//add_theme_support( 'top_nav_menu');
register_nav_menus(
    array(
        'top_nav_menu' => __('Primary Menu', 'dannydeveloper'),
        'social'  => __( 'Social Links Menu', 'twentysixteen' ),
    )
);

//adding .css file
function add_custom_style(){
    wp_enqueue_style('style', TEMPATH.'style.css');
}
add_action('wp_enqueue_style','add_custom_style');

//adding .js file
function add_custom_script(){
    wp_register_script('custom_script', TEMPPATH.'/js/custom_script.js', array('jquery'));
    wp_enqueue_script( 'custom_script');

    wp_register_script('functions', TEMPPATH.'/js/functions.js', array('jquery'));
    wp_enqueue_script( 'functions');
}
add_action('wp_enqueue_scripts', 'add_custom_script');


//adding widgets
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => __('Primary Sidebar','primary_sidebar'),
        'id' => 'primary-widget-area',
        'description' => __('The primary widget area', 'dir'),
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}

//adding footer support
register_sidebar(array(
    'name' => __('Main Footer','main_footer'),
    'id' => 'footer',
    'description' => __('The main footer','dannydeveloper'),
    'before_widget' => '<div class="footer-widget">',
    'after_widget' => '</div>',
));

add_action('wp_footer', 'custom_footer');
function custom_footer()
{?>    
    <footer class="group" id="footer">
        <div class="container">
            <?php
            if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Main Footer')) :
            ?>
            <?php endif;?>        
        </div>
        <div class="footer-content">
            <div class="footer-copyright">
                © Web Developer - All rights reserved
                <div class="credits">
                    Designed by <a href="">Danny Hernandez Simons</a>
                </div>
            </div>
        </div>
        
    </footer>
<?php  
}

//adding header backgroung image support
function dannydeveloper_custom_header_setup(){
    $args = array(
        'default-image' => get_template_directory_uri().'images/banner.jpg',
        'default-text-color' => '000',
        'height' => 600,
        'flex-width' => true,
        'flex-height' => true
    );
    add_theme_support('custom-header', $args);
}
add_action('after_setup_theme','dannydeveloper_custom_header_setup');

//adding background support
$defaults = array(
	'default-color' => 'f2f2f2',
	'default-image' => '%1$s/images/background.jpg',
);
add_theme_support( 'custom-background', $defaults );


//Page Navigation
function round_num($num, $to_nearest){
    return floor($num/$to_nearest)*$to_nearest;
}

//Perform a boxed style numered
/*function pagenavi($before = '', $after = ''){
    global $wpdb, $wp_query;
    $pagenavi_options = array();
    $pagenavi_options['page_text'] = ('Page %CURRENT_PAGE% of %TOTAL_PAGES%:');
    $pagenavi_options['current_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['page_text'] = '%PAGE_NUMBER%';
    $pagenavi_options['first_text'] = ('First');
    $pagenavi_options['last_text'] = ('Last');
    $pagenavi_options['next_text'] = 'Next &raquo;';
    $pagenavi_options['prev_text'] = '&laquo; Previous';
    $pagenavi_options['dotright_text'] = '...';
    $pagenavi_options['dotleft_text'] = '...';
    $pagenavi_options['num_pages'] = 5;
    $pagenavi_options['always_show'] = 0;
    $pagenavi_options['num_larger_page_numbers'] = 0;
    $pagenavi_options['larger_page_numbers_multiple'] = 5;

    if (!is_single()) {
        $request = $wp_query->request;
        $posts_per_page =intval(get_query_var('posts_per_page'));
        $paged = intval(get_query_var('paged'));
        $numposts = $wp_query->found_posts;
        $max_page = $wp_query->max_num_pages;

        if (empty($paged) || $paged == 0) {
            $paged = 1;
        }

        $page_to_show = intval($pagenavi_options['num_pages']);
        $larger_page_to_show = intval($pagenavi_options['num_larger_page_numbers']);
        $larger_page_multiple = intval($pagenavi_options['larger_page_numbers_multiple']);
        $pages_to_show_minus_1 = $page_to_show - 1;
        
        $half_page_start = floor($pages_to_show_minus_1/2);
        $half_page_end = ceil($pages_to_show_minus_1/2);
        $start_page = $paged - $half_page_start;

        if ($start_page <= 0) {
            $start_page = 1;
        }

        $end_page = $paged + $half_page_end;
        if (($end_page - $start_page) != $pages_to_show_minus_1) {
            $end_page = $start_page + $pages_to_show_minus_1;
        }

        if ($end_page > $max_page) {
            $start_page = $max_page - $pages_to_show_minus_1;
            $end_page = $max_page;
        }

        if ($start_page <= 0) {
            $start_page = 1;
        }

        $larger_per_page = $larger_page_to_show*$larger_page_multiple;

        $larger_start_page_start = (round_num($start_page,10) + $larger_page_multiple) - $larger_per_page;
        $larger_start_page_end = round_num($start_page,10) + $larger_page_multiple;
        $larger_end_page_start = round_num($end_page,10) + $larger_page_multiple;
        $larger_end_page_end = round_num($end_page,10) + ($larger_per_page);

        if ($larger_start_page_end - $larger_page_multiple == $larger_per_page) {
            $larger_start_page_start = $larger_start_page_start - $larger_page_multiple;
            $larger_start_page_end = $larger_start_page_end - $larger_page_multiple;
        }
        if ($larger_start_page_start <= 0) {
            $larger_start_page_start = $larger_page_multiple;
        }
        if ($larger_start_page_end > $max_page) {
            $larger_start_page_end = $max_page;
        }
        if ($larger_end_page_end > $max_page) {
            $larger_end_page_end = $max_page;
        }
    }
}*/

?>
