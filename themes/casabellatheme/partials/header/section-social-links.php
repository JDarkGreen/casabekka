<?php 

/*
 * @file { section - social - link }
 * @return { html   despliega redes sociales }
 */     ?>

<!-- Seccion redes sociales -->
<section class="mainHeader__social-link">
	<div class="container">
		<ul class="list-inline">
			<li>Síguenos en: </li>
			<!-- Facebook -->
			<?php $fb = $options['red_social_fb']; if( !empty($fb)): ?>
				<li><a target="_blank" href="<?= $fb ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<?php endif; ?>
			<!-- Twitter -->
			<?php $tw = $options['red_social_twitter']; if( !empty($tw)): ?>
				<li><a target="_blank" href="<?= $tw ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			<?php endif; ?>
			<!-- Youtube -->
			<?php $ytube = $options['red_social_ytube']; if( !empty($ytube)): ?>
				<li><a target="_blank" href="<?= $ytube ?>"><i class="fa fa-youtube" aria-hidden="true"></i>
				</a></li>
			<?php endif; ?>
		</ul>
	</div> <!-- /.container -->
</section> <!-- /.mainHeader__social-link -->