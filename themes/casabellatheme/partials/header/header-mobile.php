<!-- Header Mobile -->
<header class="mainHeader hidden-sm-up fixed">
	
	<!-- Botón abrir navegación -->
	<button class="toggle-button">
		<i class="fa fa-bars" aria-hidden="true"></i>
	</button>
	
	<!-- Logo -->
	<h1 class="logo">
		<a href="<?= site_url() ?>">
			<?php if( !empty($options['logo']) ) : ?>
				<img src="<?= $options['logo'] ?>" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
			<?php else: ?>
				<img src="<?= IMAGES ?>/logo.png" alt="<?= "-logo-" . bloginfo('name') ?>" class="img-fluid center-block" />
			<?php endif; ?>
		</a>
	</h1><!-- /logo -->

</header> <!-- /.mainHeader hidden-sm-up -->