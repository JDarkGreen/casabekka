<?php  
/*
 * Plantila Miscelaneo Incluye:
 * - Blog
 * - Facebook
 */

//Obtener entradas recientes
$args = array(
	'order'          => 'DESC',
	'orderby'        => 'date',
	'post_status'    => 'publish',
	'post_type'      => 'post',
	'posts_per_page' => 2,  );  

$entradas = get_posts( $args );  ?>


<section id="pageInicioMiscelaneo">

	<!-- Wrapper de Contenido / Contenedor Layout -->
	<div class="wrapperLayoutPage relative">

		<div class="row">
			
			<div class="col-xs-12 col-sm-8">

				<div id="container-article-preview">
					
					<!-- Título -->
					<h2 class="titleOfSection text-uppercase"> 
					<span> <?= __('blog',LANG) ?> </span> </h2>

					<?php foreach( $entradas as $entrada  ):

					$image_url = has_post_thumbnail($entrada->ID) ? wp_get_attachment_url( get_post_thumbnail_id($entrada->ID) ) : IMAGES . '/default-post.jpg';
					$image_alt = has_post_thumbnail($entrada->ID) ? get_post_meta( get_post_thumbnail_id($entrada->ID) , '_wp_attachment_image_alt' , true ) : $entrada->post_name;	?>

					<!-- Article Preview -->
					<article class="PreviewPost PreviewPost--box pull-xs-left">

						<!-- Imagen -->
						<figure class="featured-image">
							<a href="<?= get_permalink( $entrada->ID ); ?>" title="<?= $entrada->post_title; ?>">
								<img src="<?= $image_url; ?>" alt="<?= $image_alt ?>" class="img-fluid m-x-auto d-block" />
							</a>
						</figure> <!-- /. -->

						<!-- Título -->
						<h2> <?= $entrada->post_title; ?> </h2>

						<!-- Extracto -->
						<?php 
							$limit_words = 35;
							
							$content     = $entrada->post_content;
							$content     = apply_filters( 'the_content' , $content  );
							
							$content     = array_slice( explode(' ' , $content ) , 0 , $limit_words );
							$content     = implode( ' ' , $content ) . '<br/>';

							echo $content;
						?>
						
						<!-- Limpiar floats --> <div class="clearfix"></div>

						<a href="<?= get_permalink( $entrada->ID ); ?>" class="read-more text-uppercase"> ver más </a>
						
					</article> <!-- /.PreviewPost -->

					<?php endforeach; ?>

				</div> <!-- /#container-article-preview -->

				<!-- Limpiar floats --> <div class="clearfix"></div>

			</div> <!-- /.col-xs-12 col-sm-8 -->

			
			<div class="col-xs-12 col-sm-4">

				<!-- Título -->
				<h2 class="titleOfSection text-uppercase"> 
				<span> <?= __('facebook',LANG) ?> </span> </h2>
				
				<!-- Facebook  -->
				<?php 
				$path_facebook = realpath( dirname(dirname(__FILE__)). '/common-section/fan-page-facebook.php');
				include($path_facebook);  ?>
				
			</div> <!-- /.col-xs-12 col-sm-4 -->

		</div> <!-- /.row -->
	
	</div> <!-- /wrapperLayoutPage relative -->

	<!-- Espacio --> <br />
	
</section> <!-- /.pageInicioBlog -->