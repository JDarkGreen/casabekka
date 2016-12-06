<?php  
/**
  * Archivo que incluye funciones personalizadas de 
  * páginas de wordpress
  */


/**
*
* Conseguir Item Imágenes gracias al metabox de galeria 
* personalizado
*
**/

function get_gallery_post( $post_id  = null )
{
	global $post , $options;

	/**
	  * Verificar si tiene metabox de galeria
	  */
	$mb_gallery = get_post_meta( $post_id , 'mb_image_gallery' , true );

	if( $mb_gallery ) :

		//Convertir en arreglo
		$array_id_images  = explode(',', $mb_gallery ); 
		$array_id_images  = array_filter( $array_id_images );

		//Eliminar elementos no deseados
		$remove_array    = array( -1,'',' ');
		$array_id_images = array_diff( $array_id_images , $remove_array );


		//Setear los datos de todas las imágenes en un array
		$container_array_images = array();

		//Hacemos recorrido para setear
		foreach ( $array_id_images as $item_img ) :

			//Conseguir todos los datos de este item
			$item = get_post( $item_img  ); 
			//Seteamos en array
			$container_array_images[] = $item;

		endforeach;

		return $container_array_images;

	else: return false; endif;

}