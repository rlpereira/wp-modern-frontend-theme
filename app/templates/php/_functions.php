<?php
// Let's hook in our function with the javascript files with the wp_enqueue_scripts hook 
 
add_action( 'wp_enqueue_scripts', 'wp_modern_frontend_theme_load_scripts' );
add_action( 'wp_enqueue_scripts', 'wp_modern_frontend_theme_load_styles' );

define('TEMPLATE_URI', get_template_directory_uri());
 
// Register some javascript files, because we love javascript files. Enqueue a couple as well 
 
function wp_modern_frontend_theme_load_scripts() {
	wp_deregister_script('jquery');
	wp_register_script( 'jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.js', null, null, true );
	wp_register_script( 'underscore', TEMPLATE_URI . '/app/bower_components/underscore/underscore.js', array(), null, true );
	wp_register_script( 'backbone', TEMPLATE_URI . '/app/bower_components/backbone/backbone.js', array(), null, true );
	wp_register_script( 'bootstrap', TEMPLATE_URI . '/app/bower_components/bootstrap-sass/dist/js/bootstrap.js', array(), null, true );
	wp_register_script( 'app', TEMPLATE_URI . '/app/assets/js/app.js', null, null, true );
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('underscore');
    wp_enqueue_script('backbone');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('app');
}

function wp_modern_frontend_theme_load_styles () {
	wp_register_style( 'bootstrap', TEMPLATE_URI . '/app/bower_components/bootstrap-sass/dist/css/bootstrap.css', array(), null, 'all' );
	wp_register_style( 'bootstrap-theme', TEMPLATE_URI . '/app/bower_components/bootstrap-sass/dist/css/bootstrap-theme.css', array(), null, 'all' );
	wp_register_style( 'main-style', TEMPLATE_URI . '/style.css', array(), null, 'all' );

	wp_enqueue_style( 'main-style' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'bootstrap-theme' );
}

?>