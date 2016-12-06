<?php  
/**
** Archivo para actualizar las opciones por ajax
***/

//Incluir archivo load 
require('../../../../wp-load.php');

//Extraer todas las opciones de personalización
$options = is_array(get_option("theme_settings")) ? get_option("theme_settings") : array();


//Array tempora
$array_temp    = array();
$options_theme = array();

$post_options_theme = isset( $_POST['options_theme'] ) ?  $_POST['options_theme'] : array();

/** Combinar en un solo array **/
for ( $i=0; $i < count($post_options_theme) ; $i++) 
{ 
	$options_theme = array_merge_recursive( $options_theme , $post_options_theme[$i] );
}

/** actualizacion */

//Combinar los dos arrays
$options_updated = array_merge( $options , $options_theme );


//Actualizar Opciones
update_option( 'theme_settings' , $options_updated );

//var_dump($options_theme);
//echo json_encode($options);
echo json_encode( "actualización completa" );
