<?php 
/* Template Name: Page Contacto Template */

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
$banner = $post;
$path_banner = realpath(dirname(dirname(__FILE__)) . '/partials/pages/banner-top-page.php' );
if(stream_resolve_include_path($path_banner)) include($path_banner); ?>

<!-- Layout de Página -->
<main class="pageContentLayout">

	<div class="container">

		<div class="row">

			<!-- Section de Information -->
			<div class="col-xs-12 col-sm-5">

			<?php 
			/*
			 * Incluir partial de Datos De Contacto
			 */
			include( locate_template('partials/contact/section-contact-data.php') );
			?>
				
			</div> <!-- /.col-xs-12 col-sm-5 -->

			<!-- Formulario de Contacto -->
			<div class="col-xs-12 col-sm-7">

			<?php 
			/*
			 * Incluir partial de Formulario De Contacto
			 */
			include( locate_template('partials/contact/section-contact-form.php') );
			?>
				
			</div> <!-- /.col-xs-12 col-sm-7 -->
			
		</div> <!-- /.row -->
		
	</div> <!-- /.container -->

	<!-- Espacios --> <br/><br/>

	<div class="container">
		
		<h2 class="titleOfSection text-uppercase">
			mapa de contacto
		</h2>

	</div> <!-- -/.container -->
	
	<!-- Mapa -->
	<div id="canvas-map"></div>

	<?php 
	/*
	 * Importar banner a contacto 
	 */ 
	include( locate_template('partials/common-section/section-contact-strip.php') ); ?>

</main> <!-- /.pageWrapper -->

<!-- Script Google Mapa -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCNMUy9phyQwIbQgX3VujkkoV26-LxjbG0"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<script type="text/javascript">	
		<?php  
			$lat = -19.919271;
			$lng = -43.93866;

			$zoom_mapa = isset( $options['theme_zoom_mapa'] ) && !empty( $options['theme_zoom_mapa'] ) ? $options['theme_zoom_mapa'] : 16;
		?>

	    var map;
	    var lat = <?= $lat ?>;
	    var lng = <?= $lng ?>;

	    function initialize() {
	      //crear mapa
	      map = new google.maps.Map(document.getElementById('canvas-map'), {
	        center: {lat: lat, lng: lng},
	        zoom  : <?= $zoom_mapa; ?>,
	      });
	      //infowindow
	      <?php  

	      	$default_markup = "";

	      	if ( isset($options['theme_text_markup_map']) and !empty($options['theme_text_markup_map']) ) :
	      		$contenido_markup = trim( $options['theme_text_markup_map'] );

	      		$contenido_markup = !empty($contenido_markup) ? apply_filters("the_content" , $options['theme_text_markup_map']  ) : $default_markup;
	      	else:

	      		$contenido_markup = $default_markup;

	      	endif;
	      ?>

	      var contenido_markup = <?= json_encode( $contenido_markup ) ?>;

	      var infowindow  = new google.maps.InfoWindow({
	        content: contenido_markup
	      });
	      //icono
	      //var icono = "<?= IMAGES ?>/icon/contacto_icono_mapa.jpg";
	      //crear marcador
	      marker = new google.maps.Marker({
	        map      : map,
	        draggable: false,
	        animation: google.maps.Animation.DROP,
	        position : {lat: lat, lng: lng},
	        title    : "<?php _e(bloginfo('name') , LANG )?>",
	        //icon     : "<?= IMAGES . '/icon/icon_map.png' ?>",
	      });
	      //marker.addListener('click', toggleBounce);
	      marker.addListener('click', function() {
	        infowindow.open( map, marker);
	      });
	    }
	    google.maps.event.addDomListener(window, "load", initialize);
	</script>

<!-- Footer -->
<?php get_footer(); ?>

