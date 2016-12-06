<?php 

/*
 * @file Header Content { header - content }
 * @return { html } contenido de header
 */ 

/*
 * Opciones de teléfono
 */
$tel = isset( $options['contact_tel'] ) && !empty($options['contact_tel'])  ? $options['contact_tel'] : false;
$cel = isset( $options['contact_cel'] ) && !empty($options['contact_cel']) ? $options['contact_cel'] : false;

/*
 * Option de email
 */
$email = isset( $options['contact_email'] ) && !empty( $options['contact_email'] ) ? $options['contact_email'] : false;   ?>

 <!-- Seccion Principal-->
<section id="main-header-content">

	<!-- Container -->
	<div class="container">
	
		<div class="row">

			<!-- Logo  -->
			<div class="col-xs-12 col-sm-5">
				<h1 id="main-logo">
					<a href="<?= site_url() ?>">  

						<img src="<?= $logo_url; ?>"  alt="<?= get_bloginfo('description') ?>" class="img-fluid" /> 	
						
					</a>
				</h1><!-- /main-logo -->
			</div><!-- /.col-xs-12 col-sm-5 -->

			<div class="col-xs-12 col-sm-7">

				<div id="header-content-bottom">
					
					<div class="row">
						
						<!-- Teléfonos -->
						<div class="col-xs-6">

							<div class="main-header-info">
								<!-- Icono -->
								<i class="icon-header fa fa-phone" aria-hidden="true"></i>
								
								<!-- Texto --> 
								<div class="info-header">
									<span> (511) 351 2809 </span> <br />
									<span> 993 726 026 / 958 640 790 </span>    
								</div>
							
							</div> <!-- /.main-header-icon -->

						</div> <!-- /.col-xs-6 --> 

						<!-- Email -->
						<div class="col-xs-6">

							<div class="main-header-info">
								<!-- Icono -->
								<i class="icon-header fa fa-envelope" aria-hidden="true"></i>
								<div class="info-header"> casabellaservicios.com.pe </div>

							</div> <!-- /.main-header-icon -->

						</div>  <!-- /.col-xs-6 -->
		
					</div> <!-- ./row -->

				</div> <!-- /#header-content-bottom -->

			</div><!-- /.col-xs-12 col-sm-7 -->

		</div><!-- /.row -->

	</div><!-- /.container -->

</section> <!-- /#main-header-content -->