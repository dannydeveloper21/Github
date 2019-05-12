<?php

    $default = ocius_default_theme_options_values();
    /* Theme Options Panel */
        $wp_customize->add_panel( 'ocius_panel', array(
         'priority' => 30,
         'capability' => 'edit_theme_options',
         'title' => __( 'Ocius Theme Options', 'ocius' ),
        ) );

        /**
         * Load Customizer Color 
         *
         * Color Setting
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-colors.php';

        /**
         * Load Customizer Header Top setting 
         *
         * Header section need to manage from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-top-header.php';

        /**
         * Load Customizer Slider Setting
         *
         * Manage Carousel Slider from here
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-slider.php';

        /**
         * Load Customizer Blog Page Setting
         *
         * Manage Blog page 
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-blog-page.php';

        /**
         * Load Customizer Single Page Setting
         *
         * Manage Single page 
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-single-page.php';	    
        
        /**
         * Load Customizer Sticky Sidebar
         *
         * Manage Sticky Sidebar
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-sticky-sidebar.php';  

        /**
         * Load Customizer Footer
         *
         * Manage Footer
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-footer.php';  

        /**
         * Load Typography
         *
         * Manage Fonts 
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-typography.php'; 


        /**
         * Load Additonal Settings
         *
         * Manage Breadcrumbs
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-additional.php'; 

        /**
         * Load About Page
         *
         * Manage Breadcrumbs
        */
        require get_template_directory() . '/candidthemes/customizer/customizer-about.php';       
