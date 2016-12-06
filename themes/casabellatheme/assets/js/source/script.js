'use strict';

var j = jQuery.noConflict();


/*|----------------------------------------------------------------------|*/
/*|-----  CAROUSEL HOME  LIBRERIA OWL CAROUSEL -----|*/
/*|----------------------------------------------------------------------|*/
function HomeCarousel()
{
	if( j("#carousel-home").length )
	{
		j("#carousel-home").revolution({
			sliderType      : "standard",
			//sliderLayout    : "fullwidth",
			autoHeight      : "on",
			delay           : 9000,
			minHeight       : 280, 
			disable_onmobile: 'off',
			responsiveLevels: [1343, 1024, 778, 480],
			gridwidth       : [1343, 1024, 778, 480],
			gridheight      : [480, 480, 400, 400],
			navigation      : {
				onHoverStop: "off",
				touch:{
					drag_block_vertical: false,
					swipe_direction    : "vertical",
					swipe_min_touches  : 1,
					swipe_treshold     : 60,
					touchenabled       : "on",
	            },

				arrows : { 
					enable      : true ,  
					hide_onleave: false, 
					left        : { h_offset: 0 } , 
					right       : { h_offset: 0 } , 
				},

				bullets: {
 
					enable   : true,
					tmp      : '',
					direction: 'horizontal',
					h_align  : 'center',
					v_align  : 'bottom',
					h_offset : 0,
					v_offset : 24,
					space    : 10,
			 
			    }
			}
    	}); 
	}
}

/*|----------------------------------------------------------------------|*/
/*|-----  CAROUSEL TEMPLATES - LIBRERIA OWL CAROUSEL -----|*/
/*|----------------------------------------------------------------------|*/
function customOwlCarousels()
{
	if( j(".js-carousel-gallery").length ){

		j(".js-carousel-gallery").each(function(){

			/* Carousel */
			var current = j(this);

			/* Valor de Items */
			var Items  = current.attr('data-items') !== null && typeof(current.attr('data-items') ) !== "undefined" ? current.attr('data-items') : 3;

			/* Valor de Items Responsive */
			var Itemsresponsive  = current.attr('data-items-responsive') !== "" && typeof(current.attr('data-items-responsive') ) !== "undefined" ? current.attr('data-items-responsive') : Items;

			/* Valor de Márgenes */
			var Margins = current.attr('data-margins') !== null && typeof(current.attr('data-margins') ) !== "undefined"  ? current.attr('data-margins') : 10;	

			/* Habilitar autoplay */
			var Autoplay = current.attr('data-autoplay') !== null && typeof( current.attr('data-autoplay') ) !== "undefined"  && current.attr('data-autoplay') !== "false" ? true : false;
			
			/* Habilitar time autoplay */
			var timeAutoplay = current.attr('data-timeautoplay') !== null && typeof( current.attr('data-timeautoplay') ) !== "undefined"  && current.attr('data-timeautoplay') !== "false" ? current.attr('data-timeautoplay') : 2500;

			/* Habilitar dots */
			var Dot = current.attr('data-dots') !== null && typeof( current.attr('data-dots') ) !== "undefined" && current.attr('data-dots') !== "false" ? true : false;

			/* Generar el carousel */
			current.owlCarousel({
				items          : parseInt( Items ),
				lazyLoad       : false,
				loop           : true,
				margin         : parseInt( Margins ),
				nav            : false,
				autoplay       : Autoplay,
				responsiveClass: true,
				mouseDrag      : true,
				autoplayTimeout: parseInt( timeAutoplay ),
				fluidSpeed     : 2000,
				smartSpeed     : 2000,
				dots           : Dot,
				responsive:{
			      	320:{
			            items: parseInt( Itemsresponsive )
			        },
			        650:{
			            items: parseInt( Items )
			        },
		    	}	
			});
		
		/* end each */
		});
	/* end conditional */
	}

	/* FLECHAS DE CAROUSEL */

	//prev carousel
	j(".js-carousel-prev").on('click',function(e){ 
		e.preventDefault();
		var slider = j(this).attr('data-slider');	
		j("#"+slider).trigger('prev.owl.carousel' , [900] );
	});

	//next carousel
	j(".js-carousel-next").on('click',function(e){ 
		e.preventDefault();
		var slider = j(this).attr('data-slider');	
		j("#"+slider).trigger('next.owl.carousel' , [900] );
	});

	//Indicadores de Carousel
	j(".js-carousel-indicator").on("click",function(e){
			e.preventDefault();
			var slider  = j(this).attr('data-slider');
			var slideto = parseInt( j(this).attr('data-to') );
			j("#"+slider).trigger( 'to.owl.carousel' , [ slideto , 900 ] );

			//Activar elemento
			j(".js-carousel-indicator").removeClass("active");
			j(this).addClass("active");
		});

}


/*|----------------------------------------------------------------------|*/
/*|-----  SCROLLREVEAL - animación on scroll   -----|*/
/*|----------------------------------------------------------------------|*/
function scrollRevealElements()
{
	window.sr = ScrollReveal({ reset: true });

	// Customizing a reveal set
	sr.reveal('.scroll-animate' , { duration: 1200 } , 50 );

	//Perspective 
	sr.reveal('.sr-perpective', { 
		rotate  : { y: 65 },
		easing  : 'ease-in',
		delay   : 400,
		scale   : 0.9,
		reset   : false,
		duration: 1500,
	} , 50 );

	//RollIn
	sr.reveal('.sr-rollIn', { 
		rotate   : { x:0 , y:1 , z:-120 },
		delay    : 200,
		reset    : true,
		duration : 600,
	} , 50 );

	//LightSpeedIn
	sr.reveal('.sr-lightSpeedIn', { 
		easing   : 'ease-out',
		origin   : 'right',
		distance : '50px',
		scale    : 1,
		delay    : 200,
		reset    : true,
		duration : 1000,

	} , 50 );


}


/*|----------------------------------------------------------------------|*/
/*|-----  ENVIAR DATOS DE CONTACTO POR AJAX  -----|*/
/*|----------------------------------------------------------------------|*/
		
function sendDataFormularybyAjax( formulario )
{
	formulario.submit( function(e){

		e.preventDefault();
		//Subir el formulario mediante ajax
		j.post( data.themeroot + '/email/enviar.php', 
		{ 
			name    : j("#input_name").val(),
			email   : j("#input_email").val(),
			phone   : j("#input_phone").val(),
			address : j("#input_address").val(),
			message : j("#input_message").val(),
			
		},function(data){

			console.log(data);

			var dataParse = JSON.parse(data);

			if( String(dataParse.exito) == 'ok' )
			{ 
				alert( dataParse.message ); 
	
				j("#input_name").val("");
				j("#input_email").val("");
				j("#input_phone").val("");
				j("#input_address").val("");
				j("#input_message").val("");
				
				window.location.reload(false);
			}
			else{ 
				
				var phrase = 'Un error a ocurrido, por favor ';
				phrase += 'inténtelo nuevamente dentro de unos minutos';
				alert(phrase);

				window.location.reload(false);
			}


		});			
	}); 
}


/*|----------------------------------------------------------------------|*/
/*|-----  ELEVATEZOOM - ZOOM TO ELEMENTS   -----|*/
/*|----------------------------------------------------------------------|*/
function zoomtoItems()
{
	j(document).find('.elevatezoom-js').each(function(index,value){

		j(this).elevateZoom({
			easing           : true,
			lensFadeIn       : 500,
			lensFadeOut      : 500,
			zoomWindowFadeIn : 500,
			zoomWindowFadeOut: 500,
			zoomWindowHeight : 315,
			zoomWindowWidth  : 315,
		});

	});
}


function changeImagesItem()
{

	j(document).on('click' , '.js-change-image' , function(e){

		e.preventDefault(); 

		var this_item = j(this);

		//Obtener la url de imagen
		var this_image = this_item.find('img');
		var url_image  = this_image.attr('src');
		//Obtener el texto alternativo 
		var alt_image  = this_image.attr('alt');	
		//Obtener las clases
		var class_image = this_image.attr('class');

		//Obtener y Setear dentro del div de imagen objetivo
		var div_target = this_item.attr('data-target');

		if( j('#'+div_target).length ){
			//asignar contenedor padre
			var container_image = j('#'+div_target);

			//vaciar elementos
			container_image
			.html('')
			.html('<img src='+url_image+' data-zoom-image='+url_image+' alt='+alt_image+' class="elevatezoom-js '+ class_image +'" />');
		}

		zoomtoItems();

	});

}


(function($){
/*|- LIMITE --------------------------------------------------------------|*/

	j(document).on('ready',function(){


		/*
		 * Llamar a funcion Home Carousel
		 */
		HomeCarousel();

		/*
		 * Llamar funcion customiza los OWL carouseles 
		 */
		 customOwlCarousels();

		/*
		 * Llamar funcion customiza para galeria fancybox
		 */
		j("a.gallery-fancybox").fancybox({
			'overlayShow': false,
			'openEffect' : 'elastic',
			'closeEffect': 'elastic',
			'openSpeed'  : 300,
			'closeSpeed' : 300,
		});	
		/*
		 * Llamar funcion customiza para animacion cuando se hace
		 * scroll
		 */
		scrollRevealElements();

		/*
		 * Formulario validador y ajax
		 */
		if( j('#form-contacto').length )
		{

			var formulario = j('#form-contacto');

			//validador parsley 
			formulario.parsley();

			//enviar por ajax
			sendDataFormularybyAjax( formulario );
		}

		/*
		 *  Llamar a función menú mobile 
		 */

		/*
		 *  Función Zoom Elementos
		 */
		zoomtoItems();

		//Funcion Cambiar Imágenes
		changeImagesItem();



	/*|- LIMITE ON READY  -----------------------------------------------*/
	});


/*|--LIMITE -------------------------------------------------------------|*/
})(jQuery);