<?php  
/*
 * Contiene los metabox que serán utilizados por sus respectivos 
 * tipos de post como post , páginas , etc.
 */


/*
 * Metabox de Orden
 */
$path_order_post = realpath( dirname(dirname(__FILE__)) . '/metabox/mb_order_posts.php' );
if( stream_resolve_include_path($path_order_post) )
include($path_order_post);


/******************************************************************/
/*- COMUNES */
/******************************************************************/

/**[ INCLUIR METABOX DE BANNER DE PÁGINAS ]**/
$path_custom_banner = realpath( dirname(dirname(__FILE__)) . '/metabox/common/mb_custom_banner.php' );
if( stream_resolve_include_path($path_custom_banner) )
include($path_custom_banner);


/**[ INCLUIR METABOX DE GALERÍAS PÁGINAS/POST/ETC ]**/
$path_custom_gallery = realpath( dirname(dirname(__FILE__)) . '/metabox/common/mb_custom_gallery.php' );
if( stream_resolve_include_path($path_custom_gallery) )
include($path_custom_gallery);

/**[ INCLUIR METABOX DE CUSTOM POST TYPE DESTACADO ]**/
$path_featured = realpath( dirname(dirname(__FILE__)) . '/metabox/common/mb_featured_cpt.php' );
if( stream_resolve_include_path($path_featured) )
include($path_featured);


/******************************************************************/
/*- HOME */
/******************************************************************/

/**[ INCLUIR METABOX DE REVOLUTION EFFECT ]**/
$path_slider_rev = realpath( dirname(dirname(__FILE__)) . '/metabox/home/mb_revolution_slider.php' );
if( stream_resolve_include_path($path_slider_rev) )
	include($path_slider_rev);


/******************************************************************/
/*- PRODUCTOS */
/******************************************************************/

/**[ INCLUIR METABOX DE CODIGO ]**/
$path_product_code = realpath( dirname(dirname(__FILE__)) . '/metabox/product/mb_product_code.php' );
if( stream_resolve_include_path($path_product_code) )
	include($path_product_code);

/**[ INCLUIR METABOX DE TALLAS ]**/
$path_product_sizes = realpath( dirname(dirname(__FILE__)) . '/metabox/product/mb_product_sizes.php' );
if( stream_resolve_include_path($path_product_sizes) )
	include($path_product_sizes);

/**[ INCLUIR METABOX DE COLORES ]**/
$path_product_colors = realpath( dirname(dirname(__FILE__)) . '/metabox/product/mb_product_colors.php' );
if( stream_resolve_include_path($path_product_colors) )
	include($path_product_colors);
