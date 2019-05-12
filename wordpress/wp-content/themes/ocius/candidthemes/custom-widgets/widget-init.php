<?php

if ( ! function_exists( 'ocius_load_widgets' ) ) :

    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function ocius_load_widgets() {

        // Highlight Post.
        register_widget( 'Ocius_Featured_Post' );

        // Author Widget.
        register_widget( 'Ocius_Author_Widget' );
		
		// Social Widget.
        register_widget( 'Ocius_Social_Widget' );

    }

endif;
add_action( 'widgets_init', 'ocius_load_widgets' );


