<?php 
/*
 * Opciones del Tema:
 * 
 */

/*
 * 1.- Definiendo Constantes
 */

$themename = "Custom Theme";
$shortname = "ct";

/*
 * 2.- Array de todas las opciones del tema
 */
$options_theme = array(

	array( "name" => $themename." Options", "type" => "title"),
	array( "type" => "open"),

	array( 
		"name" => "Color Scheme",
		"desc" => "Select the color scheme for the theme",
		"id" => $shortname."_color_scheme",
		"type" => "select",
		"options" => array("blue", "red", "green"),
			"std" => "blue"
	),
);

/*
 * 3.- Agregar función para mostrar en el administrador del tema
 */

function customtheme_my_admin()
{
	global $themename , $shortname , $options_theme;

	//Si la variable $_GET['page'] igual al nombre de archivo entonces
	if( $_GET['page'] == basename(__FILE__) ) : 

	//y si la acción es de guardado
	if( isset($_REQUEST['action']) && $_REQUEST['action'] == 'save' ):

		//Actualizar las opciones del tema
		foreach( $options_theme as $value ):

			update_option( $value['id'] , $_REQUEST[ $value['id'] ] );

		endforeach;

		//Si ya existen entonces guardarlas sino eliminarlas
		foreach( $options_theme as $value ):

			if( isset($_REQUEST[ $value['id'] ]) ) :

			update_option( $value['id'] , $_REQUEST[ $value['id'] ] );

			else: 

			delete_option( $value['id'] );

			endif;

		endforeach;

		//Redirigir a la página de opciones
		header('Location: themes.php?page=functions.php&saved=true');
		die;

	elseif( isset($_REQUEST['action']) && $_REQUEST['action'] == 'reset' ):

		foreach( $options_theme as $value ):

		delete_option( $value['id'] );

		endforeach;

		//Redirigir a la página de opciones
		header('Location: themes.php?page=functions.php&reset=true');
		die;

	endif; endif;

	//Agregar al menú
	add_menu_page( $themename." Options" , "".$themename." Options" , 'edit_themes' , basename(__FILE__) , 'mytheme_admin' , 'dashicons-shield' , 3 );
}

/*
 * FUNCTION CALLBACK para guardar los datos
 */
function mytheme_admin()
{
	global $themename , $shortname , $options_theme;

	//Incluir template de administrador
	include('template.php');

	if( isset($_REQUEST['save']) ): 

		$message  = '<div id="message"><p></strong>' . $themename ;
	    $message .= ' configuraciones guardadas con éxito';
	    $message .= '</strong></p></div>';

	endif;

	if( isset($_REQUEST['reset']) ):

		$message  = '<div id="message"><p></strong>' . $themename ;
	    $message .= ' configuraciones guardadas con éxito';
	    $message .= '</strong></p></div>';

	endif;

}

/*
 * 4.- Hook / Gancho para llamar a la opciones del tema en el menu
 */
add_action('admin_menu', 'customtheme_my_admin');



/*
 * Cargar en administrador estilos y javascript
 */

function custom_options_admin_style() 
{
	//CSS
    wp_register_style( 'custom_wp_option_css', get_template_directory_uri() . '/administrator/css/options-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_wp_option_css' );

    //JS
    wp_enqueue_script( 'custom_wp_option_js', get_template_directory_uri() . '/administrator/js/options-script.js' );
}

add_action( 'admin_enqueue_scripts', 'custom_options_admin_style' );