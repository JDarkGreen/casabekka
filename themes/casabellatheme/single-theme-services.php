<?php 
/*
 * File: Single Theme Service
 * return html ¨{despliega detalle de servicios }
 */

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

$page_required = get_page_by_title('servicios');

$banner        = $page_required;
$path_banner   = realpath( dirname(__FILE__) . '/partials/pages/banner-top-page.php' );
if(stream_resolve_include_path($path_banner)) include($path_banner);


/*
 * Obtener todos los servicios
 */ 
$args = array(
	'meta_key'       => 'mbox_order_post',
	'order'          => 'ASC',
	'orderby'        => 'meta_value_num',
	'post_status'    => 'publish',
	'post_type'      => 'theme-services',
	'posts_per_page' => -1,
);

//
$all_services = get_posts( $args ); ?>

<!-- Layout de Página -->
<main class="pageContentLayout">

	<div class="container">

		<div class="row">

			<!-- Sidebar -->
			<aside class="col-xs-12 col-sm-4">

				<section id="section-menu-services">

					<!-- Tìtulo -->
					<h2 class="titleOfSection titleOfSection--orange text-uppercase">
						<?= __( 'servicios' , LANG ); ?>
					</h2>

					<?php if( count($all_services) > 0 ): ?>

					<?php foreach( $all_services as $service ): ?>

						<a href="<?= get_permalink( $service->ID ); ?>" title="<?= $service->post_title; ?>" class="link-to-service <?= $post->ID === $service->ID ? 'active' : '' ?>"> <?= $service->post_title; ?> </a>

					<?php endforeach; ?>

					<?php endif; ?>
					
				</section> <!-- /.section-menu-services -->

			</aside> <!-- / -->

			<!-- Contenido -->
			<section class="col-xs-12 col-sm-8">

				<!-- Title -->
				<h2 class="titleOfSection text-uppercase">
					<?= $post->post_title; ?>
				</h2>

				<?php 
				/*
				 * Mostrar si posee galería
				 */
				$mb_gallery = get_gallery_post( $post->ID );

				if( count($mb_gallery) > 1 ) : ?>

				<div class="relative">
					
					<div id="carousel-single-service" class="section__single_gallery js-carousel-gallery" data-items="1" data-items-responsive="1" data-margins="5" data-dots="false" data-autoplay="true" data-timeautoplay="4000">

					<?php foreach( $mb_gallery as $image ): ?>

						<img src="<?= $image->guid; ?>" alt="<?= $image->post_content; ?>" class="img-fluid" />

					<?php endforeach; ?>

					</div> <!-- #carousel-single-service -->
					
					<!-- Flechas de Carousel -->
					<a href="#" data-slider="carousel-single-service" class="arrow-single-service arrow--left js-carousel-prev">
						<i class="fa fa-chevron-left" aria-hidden="true"></i>
					</a>					

					<a href="#" data-slider="carousel-single-service" class="arrow-single-service arrow--right js-carousel-next">
						<i class="fa fa-chevron-right" aria-hidden="true"></i>
					</a>

				</div> <!-- /.relative -->

				
				<?php else: ?>

					<?= get_the_post_thumbnail( $post->ID , 'full' , array('class'=>'img-fluid d-block') ); ?>

				<?php endif; ?>

				<!-- Espacio --> <br/>

				<!-- Contenido -->
				<?= apply_filters( 'the_content' , $post->post_content ); ?>
				
			</section> <!-- /.col-xs-12 col-sm-8 -->
			
		</div> <!-- /.row -->

	</div> <!-- /.container -->

<!-- Espacios --> <br/><br/>

<?php 
/*
 * Importar banner a contacto 
 */ 
include( locate_template('partials/common-section/section-contact-strip.php') ); 	

/*
 * Importar Secciòn Clientes
 */ 
include( locate_template('partials/common-section/section-our-clients.php') );  ?>

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>