<?php 
/* Template Name: Page Nosotros Template */

/*
 * Objecto Actual
 */
global $post;

/*
 * Mostrar Header
 */
get_header();

/*
 * Opciones de Personalización
 */

$options = get_option("theme_settings");

/*
 * Variable para Template banner de página
 */ 
$banner = $post;
$path_banner = realpath(dirname(dirname(__FILE__)) . '/partials/pages/banner-top-page.php' );
if(stream_resolve_include_path($path_banner)) include($path_banner); ?>

<!-- Layout de Página -->
<main class="pageContentLayout">

	<div class="container">

		<div class="row">

			<!-- Text0 -->
			<div class="col-xs-12 col-sm-7">

				<!-- Tìtulo de Secciòn -->
				<h2 class="titleOfSection text-uppercase"> 
				<?= !empty($post->post_excerpt) ? $post->post_excerpt : 'casabella'; ?></h2>
				
				<!-- Contenido -->
				<?= apply_filters( 'the_content' , $post->post_content ); ?>
				
			</div> <!-- /.col-xs-12 col-sm- -->

			<!-- Carousel Post -->
			<div class="col-xs-12 col-sm-5">

				<?php  
				/*
				 * Galerìa de Pàgina
				 */
				$mb_gallery = get_gallery_post( $post->ID );

				if( count($mb_gallery) > 1 ) : ?>

				<div id="carousel-about-our" class="section__single_gallery js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="false" data-autoplay="true" data-timeautoplay="4000">

				<?php foreach( $mb_gallery as $image ): ?>

					<img src="<?= $image->guid ?>" alt="<?= $image->post_content; ?>" class="img-fluid" />
	
				<?php endforeach; ?>

				</div> <!-- /#carousel-about-our -->

				<?php endif; ?>
				
			</div> <!-- /.col-xs-12 col-sm- -->
			
		</div> <!-- /.row -->

		<?php 
		/*
		 * Importar template de Aptitudes
		 */
		include( locate_template('partials/nosotros/section-aptitudes.php') );
		?>
		
	</div> <!-- /.container -->

	<?php 
	/*
	 * Importar banner a contacto 
	 */ 
	include( locate_template('partials/common-section/section-contact-strip.php') ); ?>

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>

