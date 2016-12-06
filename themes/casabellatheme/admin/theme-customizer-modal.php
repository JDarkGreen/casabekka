<?php  
/*
 * Archivo de creación de opciones del tema, donde configuraremos parametros
 * para setearlos despues.
 */

$themename = __( get_bloginfo('name') , LANG ); //Nombre de la opcion

//definir prefijo
define("PREFIX", "kairel" );

/*
 * Agregar Hooks
 */

/*
 * Esta acción se utiliza para agregar opciones de menú y submenús adicionales a la 
 * estructura de menús del panel de administración . Se ejecuta después de que la 
 * estructura básica del menú del panel de administración está en su lugar .
 */
add_action( 'admin_menu', 'custom_theme_add_admin_menu' );

/*
 * admin_init se dispara antes de que cualquier otro gancho cuando un usuario accede a la 
 * zona de administración . Este gancho no proporciona ningún parámetro , por lo que sólo 
 * se puede utilizar para devolución de llamada una función especificada 
 */
add_action( 'admin_init', 'custom_theme_settings_init' );

/*
 * FUNCION CALLBACK DE AGREGAR MENU AL PANEL
 */
function custom_theme_add_admin_menu() 
{
	add_menu_page( 'Optiones tema: ' . get_bloginfo("name") , 'Opciones Tema' , 'manage_options', 'optiones_tema', 'custom_theme_options_page' , IMAGESADMIN . '/loader.gif' , 2 );
}

/*
 * FUNCION CALLBACK DE custom_theme_settings_init
 */
function custom_theme_settings_init() 
{ 
	/*
	 * REGISTRO un ajuste de devolución de llamada y su desinfección .
	 * register_setting( $option_group, $option_name, $sanitize_callback )
	 */

	//panel rewrite url
	register_setting( 'customThemeRewriteUrl' , 'theme_settings' );

	//panel redes sociales
	register_setting( 'customThemePageSocial' , 'theme_settings' );

	//panel EMPRESA
	register_setting( 'customThemePageEmpresa' , 'theme_settings' );

	//panel información Header
	register_setting( 'customThemePageHeader' , 'theme_settings' );	

	//panel información Nosotros
	register_setting( 'customThemePageNosotros' , 'theme_settings' );

	//panel Footer
	register_setting( 'customThemePageFooter' , 'theme_settings' );

	//panel contacto mapa
	register_setting( 'customThemePageContactoMapa' , 'theme_settings' );
	
	//panel proyectos
	register_setting( 'customThemeProyects' , 'theme_settings' );

	//panel cuentas
	register_setting( 'customThemePageCuentas' , 'theme_settings' );

	/*
	 * Incluir archivo de Configuracion de Secciones y campos , inputs y texarea
	 */
	if( stream_resolve_include_path('template-add-fields-custom.php') )
		include('template-add-fields-custom.php');
}


/*
 * Mostrardo el renderizado final y las opciones del tema
 */
function custom_theme_options_page()
{ ?>

	<!-- Contenedor de Opciones -->
    <div class="containerSectionOptions">

    	<!-- Titulo -->
		<h2 class="title-options">Opciones tema:</h2>

		<!-- Menu -->
		<div class="options__menu">

			<?php 
				/*
				*Effects options
				* blind,bounce,clip,drop,explode,fade,fold,highlight,puff,pulsat,escale,
				* shake,size,slide,transfer
				*/
			?>

			<!-- portBox Handler -->
	        <a href="#" class="bg-danger" data-display="optionsCustomUrl" data-animation="explode" data-animationspeed="500"> 
	       	<?= __("Customizar Url" , LANG ); ?> </a>

			<!-- portBox Handler -->
	        <a href="#" class="bg-social" data-display="optionsSocialLinks" data-animation="slide" data-animationspeed="500"> 
	       	<?= __("Redes Sociales" , LANG ); ?> </a>
	       	
			<!-- portBox Handler Empresa -->
	        <a href="#" class="bg-data" data-display="optionsBusiness" data-animation="clip" data-animationspeed="500"> 
	       	<?= __("Personalización Empresa ( Tel. , emails , etc )" , LANG ); ?> </a>   

			<!-- portBox Handler CONTACTO -->
	        <a href="#" data-display="optionsContactoMapa" data-animation="blind" data-animationspeed="500"> 
	       	<?= __("Personalización Contacto - Mapa" , LANG ); ?> </a>

			<!-- portBox Handler -->
	        <a href="#" data-display="optionsSocialLinks" data-animation="slide" data-animationspeed="500"> 
	       	<?= __("Personalización Header" , LANG ); ?> </a>

			<!-- portBox Handler -->
	        <a href="#" data-display="optionsFooter" data-animation="bounce" data-animationspeed="500"> 
	       	<?= __("Personalización Footer" , LANG ); ?> </a>

	    </div> <!-- /.options__menu -->

	    <?php /*-------------------------------------------*/ ?>

    	<!-- portBox Content CUSTOM URLS  -->
		<div id="optionsCustomUrl" class="portBox">
			<?php
				settings_fields( 'customThemeRewriteUrl' );
				do_settings_sections( 'customThemeRewriteUrl' );
			?>
			<button class="js-update-ajax-options button button-primary" data-id="optionsCustomUrl"> Actualizar 
			</button>
		</div> <!---->

    	<!-- portBox Content REDES SOCIALES -->
		<div id="optionsSocialLinks" class="portBox">
			<?php
				settings_fields( 'customThemePageSocial' );
				do_settings_sections( 'customThemePageSocial' );
			?>
			<button class="js-update-ajax-options button button-primary" data-id="optionsSocialLinks"> Actualizar 
			</button>
		</div> <!---->

    	<!-- portBox Content EMPRESA -->
		<div id="optionsBusiness" class="portBox">
			<?php
				settings_fields( 'customThemePageEmpresa' );
				do_settings_sections( 'customThemePageEmpresa' );
			?>
			<button class="js-update-ajax-options button button-primary" data-id="optionsBusiness"> Actualizar 
			</button>
		</div> <!---->

    	<!-- portBox Content CONTACTO MAPA -->
		<div id="optionsContactoMapa" class="portBox">
			<?php
				settings_fields( 'customThemePageContactoMapa' );
				do_settings_sections( 'customThemePageContactoMapa' );
			?>
			<button class="js-update-ajax-options button button-primary" data-id="optionsContactoMapa"> Actualizar 
			</button>
		</div> <!---->    	

		<!-- portBox Content FOOTER -->
		<div id="optionsFooter" class="portBox">
			<?php
				settings_fields( 'customThemePageFooter' );
				do_settings_sections( 'customThemePageFooter' );
			?>
			<button class="js-update-ajax-options button button-primary" data-id="optionsFooter"> Actualizar 
			</button>
		</div> <!---->

    </div> <!--/.containerSectionOptions-->


<?php
}


?>