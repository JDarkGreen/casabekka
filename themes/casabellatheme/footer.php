<?php 
/*
 * @FILE { Footer .php }
 * @return { html despliga footer del tema }
 */ 

/*
 * Opciones de Personalización
 */
$options = get_option('theme_settings'); 

/*
 * Imágen de Footer
 */
$footer_image_url   = isset($options['logo_footer']) && !empty($options['logo_footer']) ? $options['logo_footer'] : IMAGES . '/footer/logo_footer_casabella.png';

/*
 * Texto del Footer
 */
$footer_information = isset($options['footer_information']) ? $options['footer_information'] : '';

 ?>

<!-- Main Footer -->
<footer id="mainFooter">

	<div class="container">
		
		<div class="row">
			
			<!-- Empresa -->
			<div class="col-xs-12 col-sm-8">

				<div id="item-footer-information">
	
					<!-- Tìtulo -->
					<h3 class="title-footer text-uppercase">
						<?= __( 'empresa' , LANG ); ?>
					</h3>

					<div class="row">
						
						<!-- Logo y redes sociales -->
						<div class="col-xs-12 col-sm-6">
							
							<!-- Logo footer -->
							<figure id="logo-footer">
								<img src="<?= IMAGES ?>/logo_casabella_blanco.png" alt="<?= get_bloginfo('description') ?>" class="img-fluid" />
							</figure> <!-- /. -->

							<?php
							/* Incluir template redes */
							include( locate_template('partials/footer/section-social-links.php') );  ?>
							
						</div> <!-- /. -->

						<!-- Info Footer -->
						<div class="col-xs-12 col-sm-6">

							<p>Somos Casa Bella, una empresa de construcción y mantenimiento que ofrece la más alta calidad en servicios generales, tales como edificaciones, limpieza, instalaciones eléctricas, sistema drywall, entre otros.</p>
							
						</div> <!-- /. -->
						
					</div> <!-- /.row -->
					
				</div> <!-- #item-footer-information -->			
				
			</div> <!-- /.col-xs-12 col-sm -->

			<!-- Datos de Contacto -->
			<div class="col-xs-12 col-sm-4">

				<?php 
				/* Importar template de Contacto */
				include( locate_template('partials/footer/section-contact-data.php') ); ?>
				
			</div> <!-- /.col-xs-12 col-sm -->

		</div> <!-- /.row -->

	</div><!-- ./container -->

</footer><!-- /.#mainFooter -->

<!-- Desarrollo -->
<section id="section-developer" class="text-xs-center">
	CASABELLA &copy; <?= date('Y'); ?>
</section> <!-- /#.section-developer -->
	
<?php wp_footer(); ?>


</main> <!-- /#menu -->


</body>
</html>

