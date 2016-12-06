
var j = jQuery.noConflict();

(function($){

	j(document).on('ready',function(){


		/*************************************************************************
		* SECCIÓN SUBIR IMAGENES ()
		**************************************************************************/
	    if( j(".js-add-custom-img").length ){

	    	j(document).on('click', '.js-add-custom-img' , function(e){
	    		//Prevenir accion por defecto
	    		e.preventDefault();

	    		//Referenciarse asi mismo
	    		var this_btn_add_img = j(this);

	    		//Escoger attributo o tipo [si es imagen o pdf ]
	    		var type_custom_file = this_btn_add_img.attr('data-type') !== null && typeof(this_btn_add_img.attr('data-type') ) !== "undefined" ? this_btn_add_img.attr('data-type') : "image";
			
				//var input_img_tax = j(this).attr('data-input');
				var Uploader;

				if ( Uploader) {
					mediaUploader.open(); 
					return; 
				}

				Uploader = wp.media.frames.file_frame = wp.media({
					title: 'Escoge Image',
					button: {
						text: 'Escoge Image'
					}, multiple: false 
				}); 

				Uploader.on('select', function() {
					attachment = Uploader.state().get('selection').first().toJSON();

					/**
					  * Setear el tipo de Campo Actual.
					  */

					var current_id_field  = this_btn_add_img.attr("data-field-id");  
					var current_field = j( '#' + current_id_field );

	          		//setea el campo
	          		current_field.val(attachment.url);

	          		var vistaPrevia = "<div>";

	          		//Agregamos una imagen de vista previa segun el tipo de archivo 
	          		switch( type_custom_file )
	          		{
	          			//En caso de ser Imagen
	          			case "image":
	          				vistaPrevia += "<img src='"+attachment.url+"' style='width:200px; height:auto;' />";
	          			break;
	          			
	          			//En caso de ser pdf
	          			case "pdf":
	          				vistaPrevia += "<img src='https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcSA4zxxkv13OnM5Iis67kokyEU4oXBjKdvRg14SDOyzpEBBH-be' style='width:50px; height:50px;' />";
	          			break;

	          			//En caso default
	          			default:
	          				vistaPrevia += "<img src='"+attachment.url+"' style='width:200px; height:auto;' />";;
	          			break;
	          		}

	          		vistaPrevia += "</div>";

	          		//al contenedor de vista previa
	          		this_btn_add_img.parent(".customize-img-container")
	          		.find(".container-preview").html("").html( vistaPrevia );

	          		//cambiar texto de boton
	          		this_btn_add_img.html( "Cambiar Imagen" );

	          	});

	        	// Open the uploader dialog
	        	Uploader.open();
	    	});
	    }

	    /**
	    * Botón Remover Imagen Subida
	    */
	    j(document).on('click', '.js-remove-custom-img' ,function(e){
	    	//remover funcion por defecto
	    	e.preventDefault(); 

	    	/** Setear el campo **/
			var current_id_field = j(this).attr("data-field-id");  
			var current_field    = j("#"+ current_id_field );

	    	//Remover el valor actual del campo oculto
	    	current_field.val("");
	    	//Eliminar la imagen preview 
	    	j(this).parent(".customize-img-container")
	    	.find(".container-preview img").slideUp('slow');

	    	//Cambiar texto de botón de agregado
	    	j(this).parent(".customize-img-container")
	    	.find('button.js-add-custom-img').html("Agregar Imagen");
	    });


	    /************************************************************************
	    * SUBIR LA IMAGEN CON UN WIDGET
	    ************************************************************************/
	    if( j(".upload-img-btn-widget").length ){ 

	    	j(document).on( "click", ".upload-img-btn-widget", function ( e ){
	    		//Prevenir accion por defecto
	    		e.preventDefault();
	    		//boton
	    		var btn_add_img_tax = j(this);
				
				var Uploader;

				if ( Uploader) { mediaUploader.open();  return; }

				Uploader = wp.media.frames.file_frame = wp.media({
					title: 'Escoge Image',
					button: {
						text: 'Escoge Image'
					}, multiple: false 
				}); 

				Uploader.on('select', function() {
					attachment = Uploader.state().get('selection').first().toJSON();

					var campo_field = btn_add_img_tax.parent("p").find("input");
					console.log(campo_field);
	          		//setea el campo
	          		campo_field.val(attachment.url);
	          	});

	        	// Open the uploader dialog
	        	Uploader.open();
	    	});
	    } else{
	    	console.log("no widget available");
	    }  


	/*---------------------------- LIMITE ------------------------------*/
	});

})(jQuery);