<?php  

/**
<?php add_settings_section( $id, $title, $callback, $page ); ?>
* PERSONALIZAR FOOTER

//Inputs
add_settings_field( $id, $title, $callback, $page, $section, $args );
**/
add_settings_section( PREFIX."_themePage_footer" , __( 'Personalizar Footer:' , 'LANG' ), 'custom_settings_footer_callback', 'customThemePageFooter' );

function custom_settings_footer_callback()
{ 
	echo __( 'Personaliza los campos correspondientes:', 'LANG' );
}

//TEXTO FOOTER
add_settings_field( 'theme_footer_text', __( 'Texto Presentación', 'LANG' ), 'custom_footer_text_render', 'customThemePageFooter', PREFIX."_themePage_footer" );

//Renderizado 
function custom_footer_text_render() 
{ 
	$options = get_option( 'theme_settings' ); 
?>

	<textarea id="theme_footer_text" class="js-field-ajax textarea-field"><?= !empty($options['theme_footer_text']) ? $options['theme_footer_text'] : "" ; ?></textarea>	
		
	<?php
}



?>