<?php  
/*
 * Plantila Slider Home modificado para trabajar con libreria 
 * SLIDER REVOLUTION
 */

	// The Query
	$args = array(
    'post_status'    => 'publish',
    'post_type'      => 'theme-slider-home',
    'posts_per_page' => -1,
    'meta_key'       => 'mbox_order_post',
    'order'          => 'ASC',
    'orderby'        => 'meta_value_num',
	);

	$the_query = new WP_Query( $args );

  /*
   * Link de Slider Home
   */
  $page_contacto = get_page_by_title('contacto');
  $slider_link   = !empty($page_contacto) ? get_permalink($page_contacto->ID) : '#';


	// The Loop
	if ( $the_query->have_posts() ) : ?>

<!-- START REVOLUTION SLIDER 5.0 -->
<div class="rev_slider_wrapper">
	
	<div id="carousel-home" class="slider rev_slider manual" data-version="5.0">
  		
  		<ul style="padding: 0; margin: 0; list-style-type: none;"> 

  			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>

  			<?php  
  				/*
  				 * Obtener metabox de efecto de transición para el slider
  				 */
  				$mb_transition = get_post_meta( get_the_ID() , 'mb_rev_slider_select' , true );

  				$mb_transition = !empty($mb_transition) ? $mb_transition : 'notransition';
  			
  				/*
  				 * Ruta Imagen destacada
  				 */
  				$feat_img = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
  			?>	
   			
   			<li data-transition="<?= $mb_transition; ?>"> 
     			
     			<!-- MAIN IMAGE -->
				  <img src="<?= $feat_img ?>"  alt=""  width="1920" height="1080" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina />

   				<!-- Container Text -->
   				<div class="contentTextSlider">

            <div class="tp-caption maincaption"
              data-x="['right','right,30,10]" data-hoffset="80"
              data-y="['middle','middle,30,10]" data-voffset="0"
              data-transform_idle="o:1;"
              data-transform_in="y:50px;opacity:0;s:700;e:Power3.easeOut;"
              data-transform_out="y:50px;opacity:0;s:500;e:Power2.easeInOut;
              data-start="1000">
            
   					  <?php 
                $text_slider = apply_filters( 'the_content' , get_the_content() );

                /* Reemplazar */
                $new_text    = str_replace( array("<p>",'<p style="text-align: right;">') , array("<p><span>",'<p style="text-align: right;"><span>') , $text_slider );
                echo $new_text;

              ?>

              <div class="clearfix"></div>

            </div> <!-- /.tp-caption maincaption -->

          </div><!-- /.Container Text -->

   			</li> <!-- /end li -->

   			<?php endwhile; ?>

  		</ul>  <!-- /end ul -->
	
	</div><!-- END REVOLUTION SLIDER -->

</div><!-- END OF SLIDER WRAPPER -->


<?php endif; wp_reset_postdata(); ?>