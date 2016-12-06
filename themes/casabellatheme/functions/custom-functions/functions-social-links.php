<?php  
/**
  * Archivo que incluye funciones personalizadas de 
  * las redes sociales.
  */


/**
* Definir si existe facebook
**/
function has_facebook()
{
	global $options;

	if( isset($options['theme_social_fb_text']) && !empty( $options['theme_social_fb_text']) )

	{ return true; } else { return false; } 
}

function get_facebook()
{
	global $options;

	if( has_facebook() ){ return $options['theme_social_fb_text']; }
	else{ return '#'; }
}


/**
* Definir si existe twitter
**/
function has_twitter()
{
	global $options;

	if( isset($options['theme_social_twitter_text']) && !empty( $options['theme_social_twitter_text']) )
		
	{ return true; } else { return false; } 
}

function get_twitter()
{
	global $options;

	if( has_twitter() ){ return $options['theme_social_twitter_text']; }
	else{ return '#'; }
}


/**
* Definir si existe youtube
**/
function has_youtube()
{
	global $options;

	if( isset($options['theme_social_youtube_text']) && !empty( $options['theme_social_youtube_text']) )
		
	{ return true; } else { return false; } 
}

function get_youtube()
{
	global $options;

	if( has_youtube() ){ return $options['theme_social_youtube_text']; }
}


/**
* Definir si existe linkedin
**/

function has_linkedin()
{
	global $options;

	if( isset($options['theme_social_linkedin_text']) && !empty( $options['theme_social_linkedin_text']) )
		
	{ return true; } else { return false; } 
}

function get_linkedin()
{
	global $options;

	if( has_linkedin() ){ return $options['theme_social_linkedin_text']; }
}


/**
* Definir si existe Google Plus
**/

function has_gplus()
{
	global $options;

	if( isset($options['theme_social_gplus_text']) && !empty( $options['theme_social_gplus_text']) )
		
	{ return true; } else { return false; } 
}

function get_gplus()
{
	global $options;

	if( has_gplus() ){ return $options['theme_social_gplus_text']; }
}


/**
* Definir si existe Pinterest
**/

function has_pinterest()
{
	global $options;

	if( isset($options['theme_social_pinterest_text']) && !empty( $options['theme_social_pinterest_text']) )
		
	{ return true; } else { return false; } 
}

function get_pinterest()
{
	global $options;

	if( has_pinterest() ){ return $options['theme_social_pinterest_text']; }
}


/**
* Definir si existe Instagram
**/

function has_instagram()
{
	global $options;

	if( isset($options['theme_social_instagram_text']) && !empty( $options['theme_social_instagram_text']) )
		
	{ return true; } else { return false; } 
}

function get_instagram()
{
	global $options;

	if( has_instagram() ){ return $options['theme_social_instagram_text']; }
}



/**
* Devolver Sidebar fijo de redes sociales
**/

if( !function_exists('display_social_links') ) :

function display_social_links()
{
	//Activa el almacenamiento en búfer de la salida
	ob_start(); ?>

	<!-- Menu de Redes Sociales Fijos -->
	<ul id="menu-social-links-fixed" canvas="">

	</ul> <!-- /.menu-social-links-fixed -->	

<?php

	$render_social = ob_get_contents(); ob_clean();

	echo $render_social;
}

endif;