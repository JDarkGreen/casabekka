<?php  

/***
*---------------------------------------
* FUNCIONES PERSONALIZADAS 
*---------------------------------------
***/

$options = get_option("theme_settings");

/**
* Definir si el mapa existe o no
*
**/

function exist_map()
{
	global $options;

	if( isset($options['theme_lat_coord']) && !empty($options['theme_lat_coord']) && isset($options['theme_long_coord']) && !empty($options['theme_long_coord']) ) :

	return true;
	
	else: return false; endif;
}


/**
* ---------------------------------------------------------------
* -- REDES SOCIALES
* ---------------------------------------------------------------
**/
$path_function_social = realpath( dirname(dirname(__FILE__)) . '/custom-functions/functions-social-links.php' );
if( stream_resolve_include_path($path_function_social) )
include($path_function_social);

/**
* ---------------------------------------------------------------
* -- BANNER DE PÁGINA
* ---------------------------------------------------------------
**/

$path_function_banner = realpath( dirname(dirname(__FILE__)) . '/custom-functions/functions-banner-page.php' );
if( stream_resolve_include_path($path_function_banner) )
include( $path_function_banner );


/**
* ---------------------------------------------------------------
* -- CONSEGUIR GALERIA DEL POST SI EXISTE METABOX DE GALERIA
* ---------------------------------------------------------------
**/
$path_function_gallery = realpath( dirname(dirname(__FILE__)) . '/custom-functions/functions-gallery-post.php' );
if( stream_resolve_include_path($path_function_gallery ) )
include( $path_function_gallery  );

/**
* ---------------------------------------------------------------
* -- NUEVOS FILTROS CUSTOMIZADOS - PERSONALIZADOS
* ---------------------------------------------------------------
**/
$path_function_filters = realpath( dirname(dirname(__FILE__)) . '/custom-functions/custom-filters.php' );
if( stream_resolve_include_path($path_function_filters) )
include($path_function_filters);


/**
* ---------------------------------------------------------------
* -- OBTENER ID DE YOUTUBE
* ---------------------------------------------------------------
**/
$path_function_id_youtube = realpath( dirname(dirname(__FILE__)) . '/custom-functions/functions-get-id-youtube.php' );
if( stream_resolve_include_path($path_function_id_youtube) )
include($path_function_id_youtube);

