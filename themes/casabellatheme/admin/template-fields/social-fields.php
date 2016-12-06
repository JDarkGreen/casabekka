<?php 

/*------------------------
* REDE SOCIALES 
*------------------------*/

add_settings_section( PREFIX."_themePage_section_social" , __( 'Redes Sociales:' , 'LANG' ), 'custom_settings_section_callback', 'customThemePageSocial' );

function custom_settings_section_callback()
{ 
	echo __( 'Coloca los links de redes sociales correspondientes', 'LANG' );
}


//FACEBOOK
add_settings_field( 'theme_social_fb_text', __( 'Link Facebook', 'LANG' ), 'custom_social_fb_render', 'customThemePageSocial', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_fb_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id="theme_social_fb_text" class="js-field-ajax input-field" value='<?= !empty($options['theme_social_fb_text']) ? $options['theme_social_fb_text'] : "" ; ?>'>
	<?php
}




//TWITTER
add_settings_field( 'theme_social_twitter_text', __( 'Link Twitter', 'LANG' ), 'custom_social_tw_render', 'customThemePageSocial', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_tw_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id="theme_social_twitter_text" class="js-field-ajax input-field" value='<?= !empty($options['theme_social_twitter_text']) ? $options['theme_social_twitter_text'] : "" ; ?>'>
	<?php
}



//youtube
add_settings_field( 'theme_social_youtube_text', __( 'Link Youtube', 'LANG' ), 'custom_social_yt_render', 'customThemePageSocial', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_yt_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id="theme_social_youtube_text" class="js-field-ajax input-field" value='<?= !empty($options['theme_social_youtube_text']) ? $options['theme_social_youtube_text'] : "" ; ?>'>
	<?php
}




//instagram
add_settings_field( 'theme_social_instagram_text', __( 'Link Instragram', 'LANG' ), 'custom_social_instagram_render', 'customThemePageSocial', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_instagram_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id="theme_social_instagram_text" class="js-field-ajax input-field" value='<?= !empty($options['theme_social_instagram_text']) ? $options['theme_social_instagram_text'] : "" ; ?>'>
	<?php
}


//linkedin
add_settings_field( 'theme_social_linkedin_text', __( 'Link Linkedin', 'LANG' ), 'custom_social_linkedin_render', 'customThemePageSocial', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_linkedin_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id="theme_social_linkedin_text" class="js-field-ajax input-field" value='<?= !empty($options['theme_social_linkedin_text']) ? $options['theme_social_linkedin_text'] : "" ; ?>'>
	<?php
}


//google plus
add_settings_field( 'theme_social_gplus_text', __( 'Link Google Plus', 'LANG' ), 'custom_social_gplus_render', 'customThemePageSocial', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_gplus_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id="theme_social_gplus_text" class="js-field-ajax input-field" value='<?= !empty($options['theme_social_gplus_text']) ? $options['theme_social_gplus_text'] : "" ; ?>'>
	<?php
}


//Pinterest
add_settings_field( 'theme_social_pinterest_text', __( 'Link Pinterest', 'LANG' ), 'custom_social_pinterest_render', 'customThemePageSocial', PREFIX."_themePage_section_social" );
//Renderizado 
function custom_social_pinterest_render() 
{ 
	$options = get_option( 'theme_settings' ); 
	?>
	<input type='text' id="theme_social_pinterest_text" class="js-field-ajax input-field" value='<?= !empty($options['theme_social_pinterest_text']) ? $options['theme_social_pinterest_text'] : "" ; ?>'>
	<?php
}



?>