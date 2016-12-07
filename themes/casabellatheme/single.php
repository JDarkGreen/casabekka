<?php 

/*
 * File: Single
 * Muestra detalle de un post o tipo de post
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

$paged_required = get_page_by_title('blog');

$banner         = $paged_required;
$path_banner    = realpath( dirname(__FILE__) . '/partials/pages/banner-top-page.php' );
if(stream_resolve_include_path($path_banner)) include($path_banner);  ?>

<!-- Layout de Página -->
<main class="pageContentLayout">

	<div class="container">

		<div class="row">

			<!-- Contenido -->
			<section class="col-xs-12 col-sm-8">
				
				<article class="singleDetailPost">

					<!-- Título -->
					<h2 class="titleOfSection text-uppercase">
						<?= $post->post_title; ?>
					</h2> <!-- /.titleOfSection text-uppercase -->

					<!-- Imágen destacada -->
					<?php if( has_post_thumbnail($post->ID) ): ?>

					<figure class="featured-image">
						<?= get_the_post_thumbnail( $post->ID , 'full' , array('class'=>'img-fluid m-x-auto') ); ?>					
					</figure> <!-- /.featured-image -->

					<?php endif; ?>

					<!-- Contenido -->
					<?= apply_filters( 'the_content' , $post->post_content ); ?>

					<!-- Espacio --> <br/>

					<!-- Button share facebook -->
					<?php $share_link = get_permalink($post->ID); ?>

					<div class="fb-share-button" data-href="<?= $share_link; ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= $share_link; ?>">Compartir</a></div>	
					
				</article> <!-- /.singleDetailPost -->
				
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
include( locate_template('partials/common-section/section-contact-strip.php') );  ?>

</main> <!-- /.pageWrapper -->

<!-- Script for facebook share -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<!-- Footer -->
<?php get_footer(); ?>
