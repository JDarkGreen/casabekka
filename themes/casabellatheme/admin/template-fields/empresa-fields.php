<?php  


/*-----------------------------------*
** TELEFONOS
*------------------------------------*/
add_settings_section( PREFIX."_themePage_section_phone" , __( 'Personalizar Teléfonos:' , 'LANG' ), 'custom_settings_section_phone_callback', 'customThemePageEmpresa' );

function custom_settings_section_phone_callback()
{ 
	echo __( 'Coloca los números correspondientes', 'LANG' );
}



//TELEFONO
add_settings_field( 'theme_phone_text_1', __( 'Numero Telefono 1', 'LANG' ), 'custom_phone_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_phone_render() 
{ 

	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id='theme_phone_text_1' class='js-field-ajax' value='<?= !empty($options['theme_phone_text_1']) ? $options['theme_phone_text_1'] : "" ; ?>'>
	<?php
}



//TELEFONO
add_settings_field( 'theme_phone_text_2', __( 'Número Telefono 2', 'LANG' ), 'custom_phone2_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_phone2_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id='theme_phone_text_2' class='js-field-ajax' value='<?= !empty($options['theme_phone_text_2']) ? $options['theme_phone_text_2'] : "" ; ?>'>
	<?php
}



//CELULAR
add_settings_field( 'theme_cel_text_1', __( 'Numero Celular 1', 'LANG' ), 'custom_cel_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_cel_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id='theme_cel_text_1' class='js-field-ajax' value='<?= !empty($options['theme_cel_text_1']) ? $options['theme_cel_text_1'] : "" ; ?>'>
	<?php
}



//CELULAR 2
add_settings_field( 'theme_cel_text_2', __( 'Numero Celular 2', 'LANG' ), 'custom_cel2_render', 'customThemePageEmpresa', PREFIX."_themePage_section_phone" );
//Renderizado 
function custom_cel2_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id='theme_cel_text_2' class='js-field-ajax' value='<?= !empty($options['theme_cel_text_2']) ? $options['theme_cel_text_2'] : "" ; ?>'>
	<?php
}


/*-----------------------------*
* SECCION EMAIL 
*-------------------------------*/

add_settings_section( PREFIX."_themePage_section_email" , __( 'Personalizar Email:' , 'LANG' ), 'custom_settings_section_email_callback', 'customThemePageEmpresa' );

function custom_settings_section_email_callback()
{ 
	echo __( 'Coloca email(s) correspondientes', 'LANG' );
}


//EMAIL
add_settings_field( 'theme_email_text', __( 'Email Empresa:', 'LANG' ), 'custom_email_render', 'customThemePageEmpresa', PREFIX."_themePage_section_email" );
//Renderizado 
function custom_email_render() 
{ 
	$options = get_option( 'theme_settings' ); 

	?>
	<input type='text' id='theme_email_text' class='js-field-ajax' value='<?= !empty($options['theme_email_text']) ? $options['theme_email_text'] : "" ; ?>'>
	<?php
}



/*-----------------------------*
* SECCION DIRECCIÓN
*------------------------------*/
add_settings_section( PREFIX."_themePage_section_address" , __( 'Personalizar Dirección:' , 'LANG' ), 'custom_settings_section_address_callback', 'customThemePageEmpresa' );

function custom_settings_section_address_callback()
{ 
	echo __( 'Coloca dirección correspondiente', 'LANG' );
}


//DIRECCIÓN
add_settings_field( 'theme_address_text', __( 'Dirección Empresa:', 'LANG' ), 'custom_address_render', 'customThemePageEmpresa', PREFIX."_themePage_section_address" );
//Renderizado 
function custom_address_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>

	<textarea id="theme_address_text" class='js-field-ajax textarea-field' ><?= !empty($options['theme_address_text']) ? $options['theme_address_text'] : "" ; ?></textarea>

	<?php
}



/*----------------------*
* SECCION ATENCIÓN
*------------------------*/
add_settings_section( PREFIX."_themePage_section_atention" , __( 'Personalizar Horario Atención:' , 'LANG' ), 'custom_settings_section_atention_callback', 'customThemePageEmpresa' );

function custom_settings_section_atention_callback()
{ 
	echo __( 'Coloca horario de atención', 'LANG' );
}


//ATENCIÓN
add_settings_field( 'theme_atention_text', __( 'Horario de atención:', 'LANG' ), 'custom_atention_render', 'customThemePageEmpresa', PREFIX."_themePage_section_atention" );
//Renderizado 
function custom_atention_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<textarea id="theme_atention_text" class='js-field-ajax textarea-field'><?= !empty($options['theme_atention_text']) ? $options['theme_atention_text'] : "" ; ?></textarea>
	<?php
}


/*-----------------------------------------*
* SECCION CATÁLOGO - BROCHURE
*------------------------------------------*/

add_settings_section( PREFIX."_themePage_section_pdf" , __( 'Personalizar Catálogos:' , 'LANG' ), 'custom_settings_section_pdf_callback', 'customThemePageEmpresa' );

function custom_settings_section_pdf_callback() { 
	echo __( 'Coloca Pdf Correspondientes' , 'LANG' );
}


//BROCHURE
add_settings_field( 'theme_meta_brochure', __( 'Brochure / Catálogo - Empresa:', 'LANG' ), 'custom_theme_brochure_render', 'customThemePageEmpresa', PREFIX."_themePage_section_pdf" );

//Renderizado 
function custom_theme_brochure_render() 
{ 
	//Opciones del Tema
	$options = get_option( 'theme_settings' ); 
	
	//Variable brochure
	$theme_brochure = isset($options['theme_meta_brochure']) && !empty($options['theme_meta_brochure']) ? $options['theme_meta_brochure'] : "";  ?>

	    <!-- Contenedor de Imagen -->
    <section class="customize-img-container">

        <!-- Input oculto guarda imagen -->
        <input type="hidden" id="theme_meta_brochure" class="js-field-ajax" value="<?= $theme_brochure; ?>" />

        <!-- Contenedor Agregar PDF Imágen Previa -->
        <div class="container-preview">
            <?php if( !empty( $theme_brochure ) && !is_null( $theme_brochure ) ) : ?>
            	<a href="<?= $theme_brochure; ?>" target="_blank">
            		<img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSA4zxxkv13OnM5Iis67kokyEU4oXBjKdvRg14SDOyzpEBBH-be" style="width:50px; height:50px;" />
            	</a> 
            <?php endif ?>
        </div> 

        <!-- Botón agregar --> 
        <br/><button class="js-add-custom-img button button-primary" data-field-id="theme_meta_brochure" data-type="pdf">

            <?php empty( $theme_brochure ) || is_null( $theme_brochure ) ? _e( 'Agregar Archivo' , LANG ) : _e( 'Cambiar Archivo' , LANG ) ; ?>
        </button> 

        <!-- Botón remover -->
        <button class="js-remove-custom-img button button-primary" data-field-id="theme_meta_brochure">
            <?php _e( 'Remover Archivo' , LANG ); ?>
        </button>

        <!-- Descripcion -->
        <br/><p class="description"><?php _e('Subir un archivo pdf para este campo'); ?></p>

    </section> <!-- /.customize-img-container -->	

    <div style="clear:both; height: 1px;"></div>
		
	<?php
}


