<?php  

/*--------------------------------------------------------------------------------*/


/**
* PERSONALIZAR CONTACTO MAPA
*/

add_settings_section( PREFIX."_themePage_contacto" , __( 'Personalizar Contacto Mapa:' , 'LANG' ), 'custom_settings_contacto_callback', 'customThemePageContactoMapa' );

function custom_settings_contacto_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}


//LATITUD COORDENADA MAPA
add_settings_field( 'theme_lat_coord', __( 'Latitud:', 'LANG' ), 'custom_latitud_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );
//Renderizado 
function custom_latitud_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<p class="description"><?= __( "Digita Coordenada : Latitud" , "LANG" ); ?></p>

	<input type='text' id='theme_lat_coord' class="js-field-ajax" value='<?= !empty($options['theme_lat_coord']) ? $options['theme_lat_coord'] : "" ; ?>' />

	<?php
}


//LONGITUD COORDENADA MAPA
add_settings_field( 'theme_long_coord', __( 'Longitud:', 'LANG' ), 'custom_longitud_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );

//Renderizado 
function custom_longitud_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	<p class="description"><?= __( "Digita Coordenada : Longitud" , "LANG" ); ?></p>

	<input type='text' id='theme_long_coord' class="js-field-ajax" value='<?= !empty($options['theme_long_coord']) ? $options['theme_long_coord'] : "" ; ?>' />
	<?php
}


//LONGITUD COORDENADA MAPA
add_settings_field( 'theme_zoom_mapa', __( 'Zoom Mapa:', 'LANG' ), 'custom_zoom_map_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );

//Renderizado 
function custom_zoom_map_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>

	<p class="description"><?= __( "Zoom Mapa defecto 16" , "LANG" ); ?></p>

	<input type='text' id='theme_zoom_mapa' class="js-field-ajax" value='<?= !empty($options['theme_zoom_mapa']) ? $options['theme_zoom_mapa'] : 16 ; ?>' />
	<?php
}

//Texto Marcador Mapa
add_settings_field( 'theme_text_markup_map', __( 'Texto del Marcador:', 'LANG' ), 'custom_text_markup_map_render', 'customThemePageContactoMapa', PREFIX."_themePage_contacto" );

//Renderizado 
function custom_text_markup_map_render() 
{ 
	$options = get_option( 'theme_settings' ); ?>
	<p class="description"><?= __( "Texto del Marcador de Mapa" , "LANG" ); ?></p>

	<textarea id="theme_text_markup_map" class='js-field-ajax textarea-field'><?= !empty($options['theme_text_markup_map']) ? $options['theme_text_markup_map'] : "" ; ?></textarea>
	<?php
}



?>