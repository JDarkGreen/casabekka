<?php 
/*
 * Template que Contiene :
 * Nuevos filtros personalizados
 */

/*
 * Filtro para agregar clases customizadas a los párrafos a 
 * the_content
 */
function add_class_to_paragraphs( $content , $array_class )
{
	/* Convertir array de clase a string */
	$str_class  = implode( ' ' , $array_class ); 

	/* Aplicar filtro content al contenido */
	$current_content = apply_filters( 'the_content' , $content ); 
	#var_dump($new_content);

	/* Encontrar cadenar de caracteres como <p> y reemplazar */
	$search  = array( '<p>' , '<p class="' );
	$replace = array( "<p class='$str_class'>" , '<p class="' . $str_class . ' ' );
	$subject = $current_content;

	/* Retornar el contenido nuevo */
	echo $new_content =  str_replace( $search , $replace , $subject );

}

add_filter( 'classtoparagraphs' , 'add_class_to_paragraphs' , 10 , 2 );