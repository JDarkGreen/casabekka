<?php 
/*
 * File: Partial
 * @return html { archivo partial de navegacion principal }
 */     ?>

<nav id="main-navigation" class="text-xs-center text-uppercase">

	<div class="container">

		<?php 
		/*
		 * Template Navigation
		 */   
		wp_nav_menu(
			array(
				'menu_class'     => 'main-menu',
				'theme_location' => 'main-menu'
		));    ?>
		
	</div> <!-- /.container -->
	
</nav> <!-- /.main-navigation -->