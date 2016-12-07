<?php 

/*
 * FILE: SECTION CONTACT DATA
 * return { despliega html con datos de la empresa en }
 * página de contacto
 */

?>

<!-- SECTION DATA CONTACT  -->
<section id="sectionContactData" class="sectionItemContact">

	<!-- Titulo -->
	<h2 class="titleOfSection text-uppercase">
		<?= isset($post) && !empty($post->post_excerpt) ? $post->post_excerpt : 'casabella'; ?>
	</h2>

	<!-- Lista de Informacion -->
	<ul id="menuContacto">

		<!-- Telefono -->
		<li>
			<i class="fa fa-phone" aria-hidden="true"></i>
			 T.(511) 351 2809
		</li>

		<!-- Celular -->
		<li>
			<i class="fa fa-mobile" aria-hidden="true"></i>
			C.993 726 026 / 958 640 790
		</li>

		<!-- Email -->
		<li class="text-orange">
			<i class="fa fa-envelope" aria-hidden="true"></i>
			servicios@casabella.com.pe
		</li>

	</ul> <!-- /.menuContacto -->

</section> <!-- /.sectionItemContact -->


<!-- SECTION SOCIAL LINKS -->
<section class="sectionItemContact">

	<!-- Titulo -->
	<h2 class="titleOfSection text-uppercase">
		Redes Sociales
	</h2>

	<ul id="menu-contact-social-link">

		<!-- Youtube -->
		<?php //$ytube = $options['red_social_ytube']; if( !empty($ytube)): ?>
			<li><a target="_blank" href="#"><i class="fa fa-youtube" aria-hidden="true"></i>
			</a></li>
		<?php //endif; ?>

		<!-- Twitter -->
		<?php //$tw = $options['red_social_twitter']; if( !empty($tw)): ?>
			<li><a target="_blank" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		<?php //endif; ?>

		<!-- Facebook -->
		<?php //$fb = $options['red_social_fb']; if( !empty($fb)): ?>
			<li><a target="_blank" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
		<?php //endif; ?>

	</ul> <!-- /.menu-contact-social-link -->

</section> <!-- /.sectionItemContact -->