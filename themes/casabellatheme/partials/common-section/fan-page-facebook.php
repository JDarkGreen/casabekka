<?php  
/*
 * Archivo Parcial Despliega EL FACEBOOK FAN PAGE PLuGiN
 */

//Extraer todas las opciones de personalización
$options = get_option("theme_settings"); 

//Facebook bg
$bg_facebook = IMAGES . '/backgrounds/bg_facebook.png';  ?>


<div id="facebookContainer" style="background-image:url(<?= $bg_facebook; ?>); width : 100%">

	<div id="fb-root"></div>
	
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.7";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

	<?php //if( has_facebook() ) : ?>

	<?php $prueba = 'https://www.facebook.com/Ingenioartweb/'; ?>

	<div class="fb-page" data-href="<?= $prueba ?>" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-width="502" data-height="465" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?= $prueba ?>" class="fb-xfbml-parse-ignore"><a href="<?= $prueba ?>"> <?= get_bloginfo('name'); ?> </a></blockquote></div>
	
	<?php //endif; ?>


</div> <!-- /. -->