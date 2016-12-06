<?php  

/*--------------------------------------------------------------------------------*/


/**
* PERSONALIZAR PÁGINA HOME
*/

add_settings_section( PREFIX."_themePage_home" , __( 'Personalizar Página Home:' , 'LANG' ), 'custom_settings_home_callback', 'customThemepageHome' );

function custom_settings_home_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}


//TEXTO DE BIENVENIDA
add_settings_field( 'theme_welcome_text_home' , __( 'Texto de Bienvenida Home:', LANG ), 'custom_welcome_home_render', 'customThemepageHome', PREFIX."_themePage_home" );

//Renderizado 
function custom_welcome_home_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>

	<p class="description"><?= __( "Escribe texto de Bienvenida" , "LANG" ); ?></p>

	<?php

	/*
	 * Titulo
	 */
?>
	<label for="theme_welcome_title_home"> Título: </label> <br/>
	<input type='text' id="theme_welcome_title_home" class="js-field-ajax input-field" value='<?= !empty($options['theme_welcome_title_home']) ? $options['theme_welcome_title_home'] : "" ; ?>' />

	<br /><br />

<?php

	/**
	  * Contenido
	  */
?>	

	<label for="theme_welcome_text_home"> Contenido: </label> <br/>
	<textarea id="theme_welcome_text_home" class="js-field-ajax textarea-field"><?= !empty($options['theme_welcome_text_home']) ? $options['theme_welcome_text_home'] : "" ; ?></textarea>	

<?php } ?>