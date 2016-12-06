<?php 

/*
 * @FILE SECTION - SOCIAL - LINKS
 * @return { display la sección de redes sociales en footer }
 */    ?>

<ul id="main-footer-social-link">

	<li>Síguenos en: </li>

	<!-- Youtube -->
	<?php //$ytube = $options['red_social_ytube']; if( !empty($ytube)): ?>
		<li><a target="_blank" href="#"><i class="fa fa-youtube" aria-hidden="true"></i>
		</a></li>
	<?php //endif; ?>

	<!-- Twitter -->
	<?php //$tw = $options['red_social_twitter']; if( !empty($tw)): ?>
		<li><a target="_blank" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
	<?php //endif; ?>

	<!-- Facebook -->
	<?php //$fb = $options['red_social_fb']; if( !empty($fb)): ?>
		<li><a target="_blank" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
	<?php //endif; ?>

</ul> <!-- /.mainFooter__social-link -->