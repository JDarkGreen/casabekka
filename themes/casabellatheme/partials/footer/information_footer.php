<?php 
/*
 * @FILE { INFORMATION - FOOTER }
 * @return html { despliega información del footer }
 */  
?>

<!-- Información del footer -->
<section class="mainFooter__content">
	
	<!-- Titulo -->
	<h2 class="mainFooter__content__title text-uppercase">
		<strong><?php _e('empresa', LANG ); ?></strong>
	</h2>

	<!-- Limpiar Floats --> <div class="clearfix"></div>
						
	<div class="row"> 

		<!-- Contenido -->
		<div class="col-xs-12 col-sm-4">
			
			<!-- Imagen -->
			<figure>
				<img src="<?= $footer_image_url; ?>" alt="<?= $description_theme; ?>" class="img-fluid d-block" />
			</figure> <!-- /.figure -->

		</div> <!-- /.col-xs-6 -->

		
		<div class="col-xs-12 col-sm-8">
			
			<?php 
			/* { Mostrar información de Footer } */
			echo apply_filters('the_content', $footer_information ); ?>
		
		</div> <!-- /.col-xs-6 -->

		<div class="col-xs-12">

			<?php  
			/*
			 * Importar template de Section Sociales en el Footer
			 */
			include( locate_template('../footer/section-social-links.php') );  ?>
			
		</div> <!-- /. -->

	</div> <!-- /.row -->

</section> <!-- /.mainFooter__content -->

