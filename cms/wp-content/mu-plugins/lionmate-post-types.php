<?php

/* === LION-MATE CUSTOM POST TYPES === */
function lionmate_post_types() {

	add_post_type_support( 'team', 'thumbnail' );
	add_post_type_support( 'team', 'excerpt' );

	add_filter( 'lionmate_gallery_metabox_post_types', function( $types ) {
		$types[] = 'gallery';
		return $types;
	} );



	/* --- Custom Post Type FAQ --- */
	$labels = array(
		'name' =>  'FAQs',
		'add_new' => 'Neue FAQ erstellen',
		'edit_item' => 'FAQ bearbeiten',
		'singular_name' => 'FAQ',
		'all_items' => 'Alle FAQs',
		'supports' => array('title', 'editor', 'author', 'custom-fields',
	));

	register_post_type( 'faq', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'taxonomies' => array( 'faq-category' ),
		'labels' => $labels,
		'supports' => ['editor', 'page-attributes', 'revisions', 'thumbnail', 'title', 'custom-fields'],
		'has_archive' => false,
		'exclude_from_search' => false,
		'rewrite' => array('slug' => 'faq', 'with_front' => true, 'pages' => true, 'feeds' => true,),
		'menu_position' => 9,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-lightbulb'
	));

	add_post_type_support( 'faq', 'thumbnail' );


	/* --- Custom Post Type REZEPTE --- */
	$labels = array(
		'name' =>  'Rezepte',
		'add_new' => 'Neues Rezept erstellen',
		'edit_item' => 'Rezept bearbeiten',
		'singular_name' => 'Rezept',
		'all_items' => 'Alle Rezepte',
		'supports' => array('title', 'editor', 'author', 'custom-fields',
	));

	register_post_type( 'recipe', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'labels' => $labels,
		'taxonomies' => array('recipe-category'),
		'supports' => ['editor', 'revisions', 'thumbnail', 'title', 'excerpt', 'custom-fields'],
		'has_archive' => false,
		'exclude_from_search' => false,
		'rewrite' => array('slug' => 'rezept', 'with_front' => true, 'pages' => true, 'feeds' => true,),
		'menu_position' => 8,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-clipboard'
	));

	add_post_type_support( 'recipe', 'thumbnail' );


	/* --- Custom Post Type HANDELSPARTNER --- */
	$labels = array(
		'name' =>  'Handelspartner',
		'add_new' => 'Neuen Handelspartner anlegen',
		'edit_item' => 'Partner bearbeiten',
		'singular_name' => 'Partner',
		'all_items' => 'Alle Partner',
		'supports' => array('title', 'editor', 'author', 'custom-fields'
	));

	register_post_type( 'partner', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'taxonomies' => array( 'partner-category' ),
		'labels' => $labels,
		'supports' => ['editor', 'revisions', 'thumbnail', 'title', 'custom-fields'],
		'has_archive' => false,
		'exclude_from_search' => false,
		'menu_position' => 11,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-networking'
	));

	add_post_type_support( 'partner', 'thumbnail' );



	/* --- Custom Post Type AKTUELLER HINWEIS --- */
	$labels = array(
		'name' =>  'Hinweis',
		'add_new' => 'Neuen Hinweis erstellen',
		'edit_item' => 'Hinweis bearbeiten',
		'singular_name' => 'Hinweis',
		'all_items' => 'Alle Hinweise',
		'supports' => array('title', 'editor', 'author', 'custom-fields',
	));

	register_post_type( 'notification', array(
		'show_in_rest' => true,
		'public' => true,
		'show_ui' => true,
		'supports' => ['editor', 'page-attributes', 'revisions', 'thumbnail', 'title', 'custom-fields'],
		'labels' => $labels,
		'has_archive' => false,
		'exclude_from_search' => true,
		'rewrite' => array('slug' => 'hinweise'),
		'menu_position' => 12,
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'publicly_queryable'  => true,
		'menu_icon' => 'dashicons-bell'
	));

}



/* === LION-MATE CUSTOM TAXONOMIES === */

function lionmate_taxonomies() {

	/* --- Custom Taxonomie FAQ-KATEGORIE --- */
	$labels = array(
		'name' => _x( 'FAQ-Kategorie', 'taxonomy general name' ),
		'singular_name' => _x( 'FAQ-Kategorie', 'taxonomy singular name' ),
		'search_items' =>  __( 'FAQ-Kategorien durchsuchen' ),
		'popular_items' => __( 'Meist benutzte FAQ-Kategorien' ),
		'all_items' => __( 'Alle FAQ-Kategorien' ),
		'parent_item' => __( 'Übergeordnete FAQ-Kategorie' ),
		'parent_item_colon' => __( 'Übergeordnete FAQ-Kategorien:' ),
		'edit_item' => __( 'FAQ-Kategorie bearbeiten' ),
		'update_item' => __( 'FAQ-Kategorie aktualisieren' ),
		'add_new_item' => __( 'Neue FAQ-Kategorien hinzufügen' ),
		'new_item_name' => __( 'Name der neuen FAQ-Kategorien' ),
	);

	register_taxonomy('faq-category', array('faqs'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'faqs' ),
	));


	/* --- Custom Taxonomie REZEPT-KATEGORIE --- */
	$labels = array(
		'name' => _x( 'Rezept-Kategorie', 'taxonomy general name' ),
		'singular_name' => _x( 'Rezept-Kategorie', 'taxonomy singular name' ),
		'search_items' =>  __( 'Rezept-Kategorien durchsuchen' ),
		'popular_items' => __( 'Meist benutzte Rezept-Kategorien' ),
		'all_items' => __( 'Alle Rezept-Kategorien' ),
		'parent_item' => __( 'Übergeordnete Rezept-Kategorie' ),
		'parent_item_colon' => __( 'Übergeordnete Rezept-Kategorien:' ),
		'edit_item' => __( 'Rezept-Kategorie bearbeiten' ),
		'update_item' => __( 'Rezept-Kategorie aktualisieren' ),
		'add_new_item' => __( 'Neue Rezept-Kategorien hinzufügen' ),
		'new_item_name' => __( 'Name der neuen Rezept-Kategorien' ),
	);

	register_taxonomy('recipe-category', array('recipe'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'recipes' ),
	));




	/* --- Custom Taxonomie HANDELSPARTNER-KATEGORIE --- */
	$labels = array(
		'name' => _x( 'Handelspartner-Kategorien', 'taxonomy general name' ),
		'singular_name' => _x( 'Partner-Kategorie', 'taxonomy singular name' ),
		'search_items' =>  __( 'Partner-Kategorien durchsuchen' ),
		'popular_items' => __( 'Meist benutzte Partner-Kategorien' ),
		'all_items' => __( 'Alle Partner-Kategorien' ),
		'parent_item' => __( 'Übergeordnete Partner-Kategorie' ),
		'parent_item_colon' => __( 'Übergeordnete Partner-Kategorien:' ),
		'edit_item' => __( 'Partner-Kategorie bearbeiten' ),
		'update_item' => __( 'Partner-Kategorie aktualisieren' ),
		'add_new_item' => __( 'Neue Partner-Kategorien hinzufügen' ),
		'new_item_name' => __( 'Name der neuen Partner-Kategorie' ),
	);

	register_taxonomy('partner-category', array('partner'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
		'query_var' => true,
	));

}

add_action('init', 'lionmate_post_types');
add_action( 'init', 'lionmate_taxonomies', 0 );

?>