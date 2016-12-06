<?php 

/*
 * File : Section Carousel Services
 * return html { carousel de servicios en el home }
 */

//Obtener Servicios 
$args = array(
	'meta_key'       => 'mbox_order_post',
	'order'          => 'ASC',
	'orderby'        => 'meta_value_num',
	'post_status'    => 'publish',
	'post_type'      => 'theme-services',
	'posts_per_page' => -1,
);

//
$all_services = get_posts( $args );   ?>

<!-- Section -->
<section id="sectionCaroselServices" class="relative">

	<div class="container">
	
		<!-- Tìtulo -->
		<h2 class="titleOfSection titleOfSection--text-white">
			<?= __(  "SERVICIOS" , LANG ); ?>
		</h2>
		
		<!-- Carousel  -->
		<?php if( count($all_services) > 1 ): ?>

		<div id="carousel-services" class="section__single_gallery js-carousel-gallery" data-items="3" data-items-responsive="1" data-margins="37" data-dots="false" data-autoplay="true" data-timeautoplay="4000">

		<?php foreach( $all_services as $service ) : ?>

		<?php /*
		       * Image Of Service
		       */
		$image_url = has_post_thumbnail($service->ID) ? wp_get_attachment_url( get_post_thumbnail_id($service->ID) ) : IMAGES . 'default-service.jpg';
		?>
			
			<article class="previewService">

				<a href="<?= get_permalink( $service->ID ); ?>">
					
					<!-- Image -->
					<div class="previewImageService" style="background-image: url( <?= $image_url; ?>);"></div>

					<!-- Title -->
					<h3 class="text-uppercase text-xs-center"> <?= $service->post_title; ?> </h3>

				</a> <!-- /. -->
				
			</article> <!-- /.previewService -->

		<?php endforeach; ?>


		</div> <!-- /#carousel-services -->

		<?php endif; ?>

	</div> <!-- /.container -->

</section> <!-- /.sectionCaroselServices -->