<?php 
function fragaris_create_post_type() {
	register_post_type( 'portfolio',
		array(
			'labels' => array(
				'name' => esc_html__( 'Наши работы','fragaris' ),
			),
			'public' => true,
			'has_archive' => false,
			'publicly_queryable' => false,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
	register_post_type( 'popular',
		array(
			'labels' => array(
				'name' => esc_html__( 'Популярные работы','fragaris' ),
			),
			'public' => true,
			'has_archive' => false,
			'publicly_queryable' => false,
			'menu_icon' => 'dashicons-admin-site',
			'supports' => array('title','editor','thumbnail'),
		)
	);
}
add_action( 'init', 'fragaris_create_post_type' );

//add_action( 'init', 'fragaris_tax' );
//function fragaris_tax() {
//	register_taxonomy(
//		'product_cat',
//		['product'],
//		array(
//			'label' => __( 'Категории товаров' ),
//			'rewrite' => array( 'slug' => 'product-category' ),
//			'hierarchical' => true,
//		)
//	);
//}

?>