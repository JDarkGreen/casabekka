<?php  
/* 
 * Template registra nuevas taxonomías en el tema
 */


//create a custom taxonomy
add_action( 'init', 'create_category_taxonomy', 0 );

function create_category_taxonomy() {

	/*
	 * Arrray de Taxonomías
	 */
	$taxonomies_array = array();

  	/*
     * Categoría Productos
     */
  	$taxonomies_array['producto_category'] = array(
		'name'          => 'Categoría Producto',
		'singular_name' => 'Categoría de Producto',
		'custom_types'  => array('theme-products'),
  	);

  	/*
  	 * Hacemos Loop
  	 */
  	foreach( $taxonomies_array as $taxonomy_array => $value ) :

  		//Nombre
		$name          = $value['name'];
		$singular_name = $value['singular_name'];

		//Custom types 
		$custom_types  = $value['custom_types'];


		${'label_'.$taxonomy_array} = array(
		    'name'             => __( $name ),
		    'singular_name'    => __( $singular_name ),
		    'search_items'     => __( 'Buscar ' . $singular_name ),
		    'all_items'        => __( 'Todas ' . $name ),
		    'parent_item'      => __( 'Padre de ' . $singular_name ),
		    'parent_item_colon'=> __( 'Categoría padre:' ),
		    'edit_item'        => __( 'Editar ' . $singular_name ), 
		    'update_item'      => __( 'Actualizar ' . $singular_name ),
		    'add_new_item'     => __( 'Agregar nuev@ ' . $singular_name ),
		    'new_item_name'    => __( 'Nuevo nombre ' . $singular_name ),
		    'menu_name'        => __( $name ),
		);

		// Ahora registramos esta taxonomia
		register_taxonomy( $taxonomy_array , $custom_types , array(
		    'hierarchical'     => true,
		    'labels'           => ${'label_'.$taxonomy_array},
		    'show_ui'          => true,
		    'show_admin_column'=> true,
		    'query_var'        => true,
		)); 

  	endforeach;
}
