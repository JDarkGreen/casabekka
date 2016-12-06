<?php  
/*
 * Archivo que incluye el banner top de la página 
 */

/*
 * Variables
 */

//El banner
$the_banner = isset($banner) && !empty($banner) ? $banner : get_queried_object();

//El título
$the_title = isset($banner_title) && !empty($banner_title) ? $banner_title : $the_banner->post_title;


/*
 * Renderizando el banner
 */ ?>

<!-- Banner top de Página -->
<section id="section-banner-top" class="relative">

	<!-- Figure only in mobile -->
	<figure class="featured-image hidden-sm-up" style="background-image: url( <?= get_banner_page( $the_banner->ID ); ?> )"></figure>

	<!-- Imagen -->
	<img src="<?= get_banner_page( $the_banner->ID ) ?>" alt="<?= $banner->post_name; ?>" class="img-fluid m-x-auto hidden-xs-down" />
	
	<!-- Título -->
	<h2 class="title-page text-uppercase"> 
		<?= __( $the_title , 'LANG' ); ?> 
	</h2>

</section> <!-- /.section-banner-top -->




