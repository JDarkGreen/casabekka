<?php /*File Name: Category */
/*
 * File: 
 * return html ¨{despliega categoria de entradas / post }
 */

/*
 * Objecto Actual
 */
$current_object = get_queried_object();

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

$page_required = get_page_by_title('blog');

$banner        = $page_required;

$path_banner   = realpath( dirname(__FILE__) . '/partials/pages/banner-top-page.php' );
if(stream_resolve_include_path($path_banner)) include($path_banner);


/*
 * Obtener todos los post
 */ 
$posts_per_page = 6;
$paged          = get_query_var('paged') ? get_query_var('paged') : 1;

$args = array(
	'order'          => 'DESC',
	'orderby'        => 'modified',
	'post_status'    => 'publish',
	'cat'            => $current_object->term_id,
	'post_type'      => 'post',
	'paged'          => $paged,
	'posts_per_page' => $posts_per_page,
);

//Obtener todos los post
$query = new WP_Query( $args ); ?>

<!-- Layout de Página -->
<main class="pageContentLayout">

	<div class="container">

		<div class="row">

			<!-- Contenido -->
			<section class="col-xs-12 col-sm-8">

				<!-- Título de Categoría -->
				<h2 class="titleOfSection text-uppercase">
				<?= $current_object->name; ?> </h2>

				<?php if( $query->have_posts() ) : ?>

				<?php while( $query->have_posts() ) : $query->the_post(); ?>
				
				<?php 
				   $img_url =  has_post_thumbnail() ? wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) : IMAGES . '/default-post.jpg'; 

					$img_alt = has_post_thumbnail() ? get_post_meta( get_post_thumbnail_id( get_the_ID() ) , '_wp_attachment_image_alt' , true ) : get_the_title();
				?>

				<article class="previewPostInPage">
					
					<!-- Imágen Destacada -->
					<a href="<?= get_the_permalink(); ?>" title="<?= get_the_title(); ?>">
						
						<div class="featured-image" style="background-image: url(<?= $img_url ?>)"></div>
						
					</a>

					<!-- Extracto -->
					<div class="content-excerpt">

						<h2 class="titleOfSection text-uppercase">
							<a href="<?= get_the_permalink(); ?>" title="<?= get_the_title(); ?>"><?= get_the_title(); ?> </a>
						</h2>
						
						<p>
							<?php 
							$excerpt = wp_strip_all_tags( get_the_content() ); 
							echo wp_trim_words( $excerpt , 25 , '' ); ?>
						</p>

						<a href="<?= get_the_permalink(); ?>" title="<?= get_the_title(); ?>" class="read-more"> VER MÁS </a>
						
					</div> <!-- /.content-excerpt -->

				</article> <!-- /.previewPostInPage -->
				

				<?php endwhile; ?>

				<!-- PAGINATION HERE -->
				<section class="sectionPagination text-xs-center">

					<?php $max_pages = $query->max_num_pages; ?>
					
					<?php for( $i = 1 ; $i <= $max_pages ; $i++ ) { ?>
					
					<!-- Link -->
					<a href="<?= get_pagenum_link($i); ?>" class="<?= $paged == $i ? 'active' : '' ?>"> <?= $i ?></a>

					<?php } ?>
					
					<!-- Next -->
					<a href="<?= get_pagenum_link($paged+1); ?>" class="arrow-paginator <?= $paged == $max_pages ? 'disabled' : '' ?>" role="button" aria-disabled="<?= $paged == $max_pages ? 'true' : '' ?>" tabindex="<?= $paged == $max_pages ? -1 : '' ?>">

						<!-- Icon --><i class="fa fa-long-arrow-right" aria-hidden="true"></i>
					</a>
					
				</section> <!-- /.sectionPagination -->
	
				<?php /*Si no hay post */ else: ?>

					<div class="alert alert-success" role="alert">
						<h4 class="alert-heading">Ops Lo Sentimos!</h4>
						<p> En estos momentos estamos actualizando esta sección, puede visitar nuestras diversas secciones. Gracias!</p>
					</div>

				<?php endif; ?>
				
			</section> <!-- /.col-xs-12 col-sm-8 -->

			<!-- Sidebar -->
			<aside class="col-xs-12 col-sm-4">

			<?php  
			/*
			 * Incluir partial de categorias
			 */
			include( locate_template('partials/sidebars/categories-post.php') ); ?> 

			<!-- Espacios --> <br/><br/>
            
            <?php 
			/* 
			 * Incluir partial de Facebook
			 */
			include( locate_template('partials/common-section/fan-page-facebook.php') );
			?>

			</aside> <!-- / -->
			
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
