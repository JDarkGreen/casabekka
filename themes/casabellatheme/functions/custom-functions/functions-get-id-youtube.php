<?php 
/*
 * Funcion Customizada:
 * Permite obtener el id de youtube del objeto 
 * pasado como parametro
 */

if( !function_exists('getidYoutube') ):

function getidYoutube( $url = '' )
{

	/*
	 * Obtener mediante patron de busqueda
	 */
	$patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?:/embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';

	$array  = preg_match( $patron , $url , $parte );

	if( false !== $array ){ return $parte[1]; }

	return false; 
}


endif;