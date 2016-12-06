<?php  
/*
 *  Cargar los archivos JS pero del administrador WP con sus respectivos estilos
 */

/* Add the media uploader script */
function load_admin_custom_enqueue() {

	//upload media
	wp_enqueue_media();


	//JQUERY UI
	wp_enqueue_script('wp-js-jqueryui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', array('jquery' ), '1.10.3', true );


	/*
	 * ESTILOS MODAL - portBox
	 */
	wp_enqueue_style( 'wp-css-portbox', THEMEROOT . "/admin/assets/css/portbox/portBox.css" );
	wp_enqueue_script('wp-js-portbox', THEMEROOT . '/admin/assets/js/portbox/portBox.slimscroll.min.js', array('jquery' ), '1.0', true);


	/*
	 * OPCIONES DEL TEMA
	 */

	//configuraciones generales de acuerdo a las librerias usadas anteriormente
	wp_enqueue_style( 'wp-css-custom-theme-admin', THEMEROOT . "/admin/assets/css/custom-theme-admin.css" );

	//Registrar script
	wp_register_script( 'wp-js-custom-theme-admin' , THEMEROOT . '/admin/assets/js/custom-theme-admin.js' , array('jquery') , '1.0' , true );

	//Localización enviar nueva data
	$theme_data = array(
		'themeroot' => THEMEROOT
	);

	//Asignar
	wp_localize_script( 'wp-js-custom-theme-admin' , 'data' , $theme_data );
	wp_enqueue_script('wp-js-custom-theme-admin');


	/*
	 * JS DE SUBIR GALERIA DE IMAGENES 
	 */
	wp_enqueue_script('wp-js-upload-gallery', THEMEROOT . '/admin/assets/js/upload-container-gallery.js', array('jquery' ), '', true);
	//Imágen Simple
	wp_enqueue_script('wp-js-upload-single-image', THEMEROOT . '/admin/assets/js/upload-single-image.js', array('jquery' ), '', true);

	/*
	 * JS ELEMENTOS CON COLOR PICKER
	 */
	wp_enqueue_style( 'wp-color-picker');
	wp_enqueue_script( 'wp-color-picker');
	wp_enqueue_script('wp-js-colorpicker', THEMEROOT . '/admin/assets/js/wpcolorpicker-input.js', array('jquery' ), '', true);

	/*
	 * JS CARGAR ELEMENTOS DINÁMICAMENTE
	 */
	wp_enqueue_script('wp-js-elements-dinamyc', THEMEROOT . '/admin/assets/js/elements-dinamyc.js', array('jquery' ), '', true);


}

add_action('admin_enqueue_scripts', 'load_admin_custom_enqueue');
