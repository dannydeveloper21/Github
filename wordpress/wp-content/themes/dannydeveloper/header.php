<?php /**
 * This is the header or my theme dannydeveloper.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * Version 1.0
 * dannydeveloper
 */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3c.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>;charset=<?php bloginfo('charset'); ?>" />
    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="txt/css" media="all" />
    <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
    <link rel="alternate" href="<?php bloginfo('atom_url') ?>" type="application/atom+xml" title="Atom">
    <link rel="pingback" href="<?php bloginfo('pinkback_url') ?>">
    <link rel="shortcut icon" href="<?php print IMAGES; ?>/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script type="text/javascript" src="<?php print TEMPPATH; ?>/js/jquery-3.3.1.min.js"></script>
</head>
<?php wp_head(); ?>
<style type="text/css">
</style>
<body class="custom-background">
    <header style="background: url(<?php header_image();?>) no-repeat; background-size: cover;" class="main-header">
        <nav id="main-nav-header" class="navbar-padding">
            <div class="navbar-logo">
                <a href="<?php bloginfo('url') ?>" class="navbar-brand-site"><i class="fas fa-chevron-left"></i><span><?php bloginfo('name'); ?><span><i class="fas fa-chevron-right"></i></a>
            </div>
            <?php if (has_nav_menu('top_nav_menu')):?>
            <button id="menu-toggle" class="menu-toggle"><i class="fas fa-bars"></i></button>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'top_nav_menu',
                    'container_class' => 'menu-navigation',
                    'container' => 'nav',
                    'container_id' => 'site-navigation',
                    'menu_class' => 'primary-menu'
                )
            );
        endif;?>
        </nav>
    </header>