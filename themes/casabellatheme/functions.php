<?php
/*
 * Theme KAYREL THEME funciones y definiciones
 *
 * Configurar el tema y proporciona algunas funciones auxiliares , que se utilizan en el
 * Tema como etiquetas de plantillas personalizadas . Otros están unidos a la acción y el filtro
 * Ganchos en WordPress para cambiar la funcionalidad básica .
 *
 * Cuando se utiliza un tema niño puede anular ciertas funciones (aquellos envueltos
 * En un function_exists ( ) llamada) definiéndolos por primera vez en su tema del niño
 * Archivo functions.php . archivo functions.php del tema de los niños está incluido antes
 * Archivo del tema de los padres , por lo que se utilizarían las funciones de temas niño.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 */

/*
 * Opciones del tema
 */

$options = get_option("theme_settings");


/*
 * Definiendo Constantes
 */
if( stream_resolve_include_path('functions/constants.php') )
  require('functions/constants.php');

/* ---------------------------------------------------
 * LIMPIANDO CODIGO INNECESARIO
 *---------------------------------------------------*/

if( stream_resolve_include_path('functions/code/clean-code.php') )
	include('functions/code/clean-code.php');


/* ---------------------------------------------------
 * ADMINISTRADOR DE SISTEMA
 *---------------------------------------------------*/

//css
if( stream_resolve_include_path('admin/assets/custom-styles.php') )
	include('admin/assets/custom-styles.php');

//javascript
if( stream_resolve_include_path('admin/assets/custom-scripts.php') )
	include('admin/assets/custom-scripts.php');

//OPCIONES DE TEMA
if( stream_resolve_include_path('admin/theme-customizer-modal.php') )
	include('admin/theme-customizer-modal.php');

//PÁGINA OPCIONES DE TEMA v 2.0
$path_options = realpath( dirname(__FILE__) . '/administrator/options-page.php' );
if( $path_options ) 
  include( $path_options );

/*
 * Desabilitar barra de menu (solo en backend)
 */
add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
  add_filter('show_admin_bar', '__return_false');
}

/*--------------------------------------
 * Reescribir enlaces de CUSTOM POST TYPES
 *--------------------------------------*/
$path_rewrite_cpt = realpath( dirname(__FILE__) . '/admin/rewrite/rewrite_slug.php' );
if( realpath($path_rewrite_cpt) )
include($path_rewrite_cpt);


/* ---------------------------------------------------
 * CONFIGURACIÓN EN EL TEMA
 *---------------------------------------------------*/

/*--------------------------------------------
 * Registrar Menús
 *--------------------------------------------*/
if( stream_resolve_include_path('functions/register/register-menu.php') )
  include('functions/register/register-menu.php');

/*--------------------------------------------
 * Registrar Nuevos Tipos de Post Personalizados
 *--------------------------------------------*/
if( stream_resolve_include_path('functions/register/register-cpt.php') )
  include('functions/register/register-cpt.php');

/*--------------------------------------------
 * Registrar Nuevos Metabox
 *--------------------------------------------*/
if( stream_resolve_include_path('functions/register/register-metabox.php') )
  include('functions/register/register-metabox.php');

/*--------------------------------------------
 * Registrar Nuevos Javascript
 *--------------------------------------------*/
if( stream_resolve_include_path('functions/register/register-scripts.php') )
  include('functions/register/register-scripts.php');

/*--------------------------------------------
 * Registrar Nuevos Funciones Personalizadas
 *--------------------------------------------*/
if( stream_resolve_include_path('functions/register/register-custom-functions.php') )
  include('functions/register/register-custom-functions.php');

/*--------------------------------------------
 * Registrar Nuevas Taxonomías
 *--------------------------------------------*/
if( stream_resolve_include_path('functions/register/register-taxonomies.php') )
  include('functions/register/register-taxonomies.php');

/*--------------------------------------------
 * Customizar Campos de Taxonomías
 *--------------------------------------------*/
if( stream_resolve_include_path('functions/taxonomy/custom-fields-taxonomies.php') )
  include('functions/taxonomy/custom-fields-taxonomies.php');

/*--------------------------------------------
 * Soporte de Tema
 *--------------------------------------------*/
if( stream_resolve_include_path('functions/support-formats.php') )
	include('functions/support-formats.php');


/*--------------------------------------------
 * PERSONALIZACIÓN de Columnas
 *--------------------------------------------*/
if( stream_resolve_include_path('functions/personalize/new-columns.php') )
  include('functions/personalize/new-columns.php');


/*--------------------------------------------
 * PERSONALIZACIÓN de Elemento Padre Activo (Pára los menús y custom post
 * types )
 *--------------------------------------------*/
if( stream_resolve_include_path('functions/personalize/nav-active-parent.php') )
	include('functions/personalize/nav-active-parent.php');
