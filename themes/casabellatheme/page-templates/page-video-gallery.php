<?php /*Template Name: Page Galería Video Template */
/*
 * File: 
 * return html ¨{despliega página de videos }
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

$banner        = $post;
$path_banner   = realpath( dirname(dirname(__FILE__)) . '/partials/pages/banner-top-page.php' );
if(stream_resolve_include_path($path_banner)) include($path_banner);


/*
 * Obtener todos las galerías de Imágenes
 */ 
$args = array(
	'meta_key'       => 'mbox_order_post',
	'order'          => 'ASC',
	'orderby'        => 'meta_value_num',
	'post_status'    => 'publish',
	'post_type'      => 'theme-gallery-videos',
	'posts_per_page' => -1,
);

//Obtener todos las videos
$all_videos = get_posts( $args ); ?>

<!-- Layout de Página -->
<main class="pageContentLayout">

	<div class="container">

		<div class="flexible flexible-wrap">

		<?php if( count($all_videos) > 0 ): ?>

		<?php foreach( $all_videos as $item ): ?>

		<?php 
		/*Obtener video de youtube */ 
		$id_youtube = getidYoutube( $item->post_content );

		if( $id_youtube ) : ?>

		<div class="PreviewVideoGallery">
			
			<!-- Video Youtube -->
			<div id="<?= $id_youtube ?>" class="video-youtube" style="width: 100%; height : 210px;"></div>

		</div> <!-- /.PreviewVideoGallery -->

		<?php endif; ?>

		<?php endforeach; ?>

		<?php else: ?>

			<div class="alert alert-warning" role="alert">
			  <h4 class="alert-heading">Ops! Lo sentimos</h4>
			  <p> En estos estamos haciendo mantenimiento de esta sección puede visitar nuestras diversas secciones. Gracias!</p>
			</div>

		<?php endif; ?>
			
		</div> <!-- /. -->


	</div> <!-- /.container -->

<!-- Espacios --> <br/><br/>

<?php 
/*
 * Importar banner a contacto 
 */ 
include( locate_template('partials/common-section/section-contact-strip.php') ); ?>

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>