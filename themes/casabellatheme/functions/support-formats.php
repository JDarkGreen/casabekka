<?php  

/* Archivo de pagina solo muestra formatos que soporta el tema */

/*************************************************************/
/* Add Theme Support for Post Formats, Post Thumbnails and Automatic Feed Links */
/************************************************************/

	add_theme_support('post-formats', array('link', 'quote', 'gallery', 'video'));

	/**
	* Imagen destacada
	**/
	add_action( 'init' , 'function_callback_post_types' );

	function function_callback_post_types()
	{
		#Obtener todos los tipos de post registrados 
		$all_post_registered = get_post_types();
		#Setear a todos agregando una imagen destacada
		add_theme_support('post-thumbnails', $all_post_registered );
	}


	set_post_thumbnail_size(210, 210, true);

	add_image_size('custom-blog-image', 784, 350);

	add_theme_support('automatic-feed-links');

	//Agregar Excerpt a las páginas
	add_post_type_support('page', 'excerpt');

	/**
	  * CUSTOMIZACION DE HEADER
	  * https://codex.wordpress.org/Custom_Headers
	  */

	$args = array(
		'flex-width'    => true,
		'width'         => 250,
		'flex-height'   => true,
		'height'        => 60,
		'uploads'       => true,
	);

	add_theme_support( 'custom-header', $args );
