<?php
/*
 * File Partial: Section Franja de Contacto
 * return html{ franja de contacto}
 */  

//Página solicitada 
$page_required = get_page_by_title('contacto');
//Link de página
$page_link     = !empty($page_required) ? get_permalink( $page_required->ID ) : '#'; ?>

<section id="section-contact-strip" class="text-xs-center">

	<div class="container">
		
		<!-- Texto -->
		<p class="text-uppercase item-contact-strip"> solicite más información </p>
		
		<!-- Boton ver más -->
		<a href="<?= $page_link ?>" class="text-uppercase item-contact-strip">aquí</a>

	</div><!-- /.container -->

</section> <!-- #section-contact-strip -->