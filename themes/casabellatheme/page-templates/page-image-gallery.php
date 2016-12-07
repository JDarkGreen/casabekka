<?php /*Template Name: Page Galería Imágenes Template */
/*
 * File: 
 * return html ¨{despliega página de imágenes }
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
	'post_type'      => 'theme-gallery-images',
	'posts_per_page' => -1,
	'meta_query'     => array(
		array( 'key' => '_thumbnail_id' , 'compare' => 'EXISTS' )
	)
);

//Obtener todos las imágenes
$all_images = get_posts( $args ); ?>

<!-- Layout de Página -->
<main class="pageContentLayout">

	<div class="container">

		<div class="flexible flexible-wrap">

		<?php if( count($all_images) > 0 ): ?>

		<?php foreach( $all_images as $item ): ?>

		<figure class="PreviewImageGallery">

			<?php $img_url = wp_get_attachment_url( get_post_thumbnail_id($item->ID) ); ?>

			<a href="<?= $img_url; ?>" class="gallery-fancybox" title="<?= $item->post_title; ?>">
	
				<div class="featured-image" style="background-image: url( <?= $img_url ?>);"></div>
				
				<!-- Contenido Oculto -->
				<div class="hidden-title text-uppercase"> <?= $item->post_title; ?> </div>
				
			</a>
			
		</figure> <!-- /.PreviewImageGallery -->

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
include( locate_template('partials/common-section/section-contact-strip.php') );  ?>

</main> <!-- /.pageWrapper -->


<!-- Footer -->
<?php get_footer(); ?>