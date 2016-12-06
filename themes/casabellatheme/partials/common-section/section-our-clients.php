<?php 
/*
 * FILE : SECTION OUR CLIENTS
 * return @html despliega el carousel de clientes
 */

//Obtener todos los clietes
$args = array(
	'meta_key'       => 'mbox_order_post',
	'order'          => 'ASC',
	'orderby'        => 'meta_value_num',
	'post_status'    => 'publish',
	'post_type'      => 'theme-clients',
	'posts_per_page' => -1,
	'meta_query' => array(
		array( 'key' => '_thumbnail_id' , 'compare' => 'EXISTS' )
	)
);

//Todas los clientes
$all_clients = get_posts( $args );  ?>

<section id="section-our-clients">
	
	<div class="container">

		<!-- Tìtulo -->
		<h2 class="titleOfSection text-uppercase">
			<?= 'nuestros clientes' ?>
		</h2>

		<!-- Carousel -->
		<?php if( count($all_clients) > 1 ): ?>

			<div id="carousel-clients" class="section__single_gallery js-carousel-gallery" data-items="7" data-items-responsive="1" data-margins="10" data-dots="false" data-autoplay="true" data-timeautoplay="5000">

			<?php foreach( $all_clients as $client ): ?>

				<div class="previewClient">
	
					<?= get_the_post_thumbnail( $client->ID , 'full' , array('class'=>'img-fluid d-block m-x-auto') ); ?>
					
				</div> <!-- /.previewClient -->

			<?php endforeach; ?>

			</div> <!-- /# -->

		<?php endif; ?>
		
	</div> <!-- /.container -->
	
</section> <!-- /#section-our-clients -->