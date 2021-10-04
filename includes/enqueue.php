<?php
/*
 * Load the theme styles within Gutenberg.
 */
function compulse_add_gutenberg_assets() {
	wp_enqueue_style( 'compulse-gutenberg', get_stylesheet_directory_uri(). '/includes/gutenberg-editor-style.css' , false );
}
add_action( 'enqueue_block_editor_assets', 'compulse_add_gutenberg_assets' );

/*
 * Loads jQuery from Google CDN
*/
function use_jquery_from_google () {
	if (is_admin()) {
		return;
	}

	global $wp_scripts;
	if (isset($wp_scripts->registered['jquery']->ver)) {
		$ver = $wp_scripts->registered['jquery']->ver;
                $ver = str_replace("-wp", "", $ver);
	} else {
		$ver = '1.12.4';
	}

	wp_deregister_script('jquery');
	wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/$ver/jquery.min.js", false, $ver);
}
add_action('init', 'use_jquery_from_google');

add_action( 'wp_enqueue_scripts', function() {

		wp_enqueue_style( 'Swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css' );
		wp_enqueue_script( 'Swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js', null, null, true );

		wp_enqueue_style( 'datatables', 'https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.css' );
		wp_enqueue_script('datatables', 'https://cdn.datatables.net/v/bs4/dt-1.10.24/datatables.min.js', array( 'jquery' ), null, true );

    // Enqueue the child theme's style.css
    wp_enqueue_style( 'compulse-bootstrap-child', get_stylesheet_uri(), [], '' );

    // Enqueue the child theme's app.js and vendor.js
    wp_enqueue_script( 'compulse-bootstrap-vendor', get_stylesheet_directory_uri() . '/js/vendor.js', [], '', true );
    wp_enqueue_script( 'compulse-bootstrap-app', get_stylesheet_directory_uri() . '/js/app.js?v=2020022702', ['compulse-bootstrap-vendor'], '', true );
} );

/*
 * Loads fontawesome
*/
function fa_enqueue_scripts() {
	$style_path = get_stylesheet_directory_uri();

	wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/3adada7ed7.js', null, null, true);

}
add_action('wp_enqueue_scripts', 'fa_enqueue_scripts');
