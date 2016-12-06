<?php 

/*
 * @file [ Sidebar -nav - mobile ]
 * @return [html] sidebar menu de navegación mobile
 */  ?>


<aside id="slideout-menu-mobile" class="sidebarMobile">
	
	<!-- Logo -->
	<h1 class="logo">
		<a href="<?= site_url() ?>" title="<?= get_bloginfo('name') ?>">
			<img src="<?= $logo_url ?>" alt="<?= $description_theme ?>" class="img-fluid d-block" />
		</a>
	</h1><!-- /logo -->

	<?php 
		/*
		 * Opciones 
		 */
		$tel = $options['contact_tel']; $cel = $options['contact_cel'];
		if( !empty($tel) || !empty($cel) ) : 
	?>
	    <article class="mainHeader__content__article">
			<!-- Icono -->
			<i class="fa fa-phone" aria-hidden="true"></i>
			<!-- Texto --> 
			<?php if( !empty($tel) ) { echo $tel . "<br/>"; } ?> 
			<?php if( !empty($cel) ) { echo $cel; } ?> 
		</article> <!-- /.mainHeader__content__article -->
	<?php endif; ?>

	<!-- Espacio --> <br />

    <!-- Título -->
    <h2 class="sidebar-title"> Menú </h2>

    <?php include('main-menu-nav.php'); ?>
</aside>