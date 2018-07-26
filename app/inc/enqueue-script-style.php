<?php
function fragaris_scripts() {
    wp_enqueue_script( 'jquery');

	wp_enqueue_style( 'fragaris-style', get_template_directory_uri() . '/style.css' );


	wp_enqueue_script( 'fragaris-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '20151215', true );


	wp_localize_script( 'fragaris-scripts', 'settings', array(
		'ajax_url' => admin_url('admin-ajax.php'),
		'priceTable' => get_price_table(),
	));
}
add_action( 'wp_enqueue_scripts', 'fragaris_scripts' );
?>