<?php  
/* 
 * Template muestra o contiene los 
 * custom post type del tema 
 */

add_action( 'init', 'register_custom_post_types' );

if( !function_exists('register_custom_post_types') ):

function register_custom_post_types()
{
	/*
	 * Array de Custom Post Types
	 */
	$arr_cpt = array();

	/*Slider Home*/
	$arr_cpt['theme-slider-home'] = array(
		'plural_name' => 'Sliders Home',
		'name'        => 'Slider Home',
		'description' => '',
		'menu_icon'   => 'dashicons-images-alt',
	);

	/*Servicios*/
	$arr_cpt['theme-services'] = array(
		'plural_name' => 'Servicios',
		'name'        => 'Servicio',
		'description' => 'Servicios en el tema',
		'menu_icon'   => 'dashicons-portfolio',
	);

	/*Trabajos Realizados*/
	$arr_cpt['theme-projects'] = array(
		'plural_name' => 'Trabajos Realizados',
		'name'        => 'Projecto',
		'description' => 'Projectos en el tema',
		'menu_icon'   => 'dashicons-laptop',
	);

	/*Galería Imágenes*/
	$arr_cpt['theme-gallery-images'] = array(
		'plural_name' => 'Galería Imágenes',
		'name'        => 'Imágen',
		'description' => 'Imágenes en el tema',
		'menu_icon'   => 'dashicons-images-alt2',
	);

	/*Galería Videos*/
	$arr_cpt['theme-gallery-videos'] = array(
		'plural_name' => 'Galería Videos',
		'name'        => 'Video',
		'description' => 'Videos en el tema',
		'menu_icon'   => 'dashicons-video-alt3',
	);

	/*Clientes*/
	$arr_cpt['theme-clients'] = array(
		'plural_name' => 'Marcas / Clientes',
		'name'        => 'Cliente',
		'description' => 'Clientes en el tema',
		'menu_icon'   => 'dashicons-groups',
	);

	/*
	 * Hacer Loop de Custom Post Types
	 */
	foreach( $arr_cpt as $cptype => $value ) :

		//Nombre
		$plural_name = $value['plural_name'];
		$name        = $value['name'];

		//Descripción
		$description = $value['description'];

		//Menu Icon / Path
		$menu_icon   = $value['menu_icon'];

		//Args 
		${'label_'.$cptype} = array(
			'name'               => __( $plural_name , LANG ),
			'singular_name'      => __( $name, LANG ),
			'add_new'            => __( 'Agregar ' . $name , LANG ),
			'add_new_item'       => __( 'Agregar nuev@ ' . $name , LANG ),
			'new_item'           => __( 'Nuevo ' . $name , LANG ),
			'edit_item'          => __( 'Editar ' . $name ,  LANG ),
			'view_item'          => __( 'Ver ' . $name , LANG ),
			'all_items'          => __( 'Tod@s l@s ' . $name , LANG ),
			'search_items'       => __( 'Buscar ' . $name , LANG ),
			'parent_item_colon'  => __( $name . ' padre:', LANG ),
			'not_found'          => __( $name . ' no encontrado.', LANG ),
			'not_found_in_trash' => __( $name . ' no encontrado en la Papelera.', LANG ),
			'not_found_in_trash' => __( $name . ' no encontrado en la Papelera.', LANG )
		);

		${'args_'.$cptype} = array(
			'labels'             => ${'label_'.$cptype},
	        'description'        => __( $description , LANG ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'has_archive'        => true,
			'hierarchical'       => false,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			'menu_icon'          => $menu_icon,
		);

		flush_rewrite_rules();
		
		//Registrar Custom Post Type
		register_post_type( $cptype , ${'args_'.$cptype} );

	
	endforeach;

}

endif;