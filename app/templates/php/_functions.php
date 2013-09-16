<?php
// Let's hook in our function with the javascript files with the wp_enqueue_scripts hook 
 
add_action( 'wp_enqueue_scripts', 'wp_modern_frontend_theme_load_scripts' );
add_action( 'wp_enqueue_scripts', 'wp_modern_frontend_theme_load_styles' );
 
// Register some javascript files, because we love javascript files. Enqueue a couple as well 
 
function wp_modern_frontend_theme_load_scripts() {
	$template_uri = get_template_directory_uri();
	wp_deregister_script('jquery');
	wp_register_script( 'jquery', '//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js', null, null, true );
	wp_register_script( 'app', $template_uri . '/app/assets/js/app.js', null, null, true );
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('app');
}

function wp_modern_frontend_theme_load_styles () {
	$template_uri = get_template_directory_uri();
	
	wp_register_style( 'main-style', $template_uri . '/style.css', array(), null, 'all' );
	wp_register_style( 'theme', $template_uri . '/app/assets/css/theme.css', array(), null, 'all' );

	wp_enqueue_style( 'main-style' );
	wp_enqueue_style( 'theme' );
}

?>