<?php 
/*
 * File: Section Welcome About Our
 * return html { despliega seccioón de bienvenida }
 */  ?>

<section id="section-welcome-about-our">

	<div class="container">

		<div class="row">
			
			<!-- Mensaje -->
			<div class="col-xs-12 col-sm-7">

				<!-- Título -->
				<h2 class="titleOfSection">
					<?= __(  "BIENVENIDOS" , LANG ); ?>
				</h2>

				<p> Somos Casa Bella,  una empresa de construcción y mantenimiento que ofrece la más alta calidad en servicios generales, tales como edificaciones, limpieza, instalaciones eléctricas, sistema drywall, entre otros. Para ello, contamos con personal altamente calificado y con experiencia en la realización de cada uno de los trabajos.</p>
				
			</div> <!-- /.col-xs-12 col-sm- -->
			
			<!-- Imágen -->
			<div class="col-xs-12 col-sm-5">

				<figure class="" id="image-about-our">
					<img src="<?= IMAGES . '/nosotros/bienvenidos_construccion_mantenimiento.jpg' ?>" alt="nosotros-construccion-casabella-equipo" class="img-fluid" />
				</figure>
				
			</div> <!-- /.col-xs-12 col-sm- -->

			
		</div> <!-- /.row -->
		
	</div> <!-- /.container -->
	
</section> <!-- /#section-welcome-about-our -->
