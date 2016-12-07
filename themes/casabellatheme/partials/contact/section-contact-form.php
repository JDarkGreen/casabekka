<?php 

/*
 * FILE: SECTION FORM DATA
 * return { despliega html con formulario de la empresa en }
 * página de contacto
 */

?>

<section class="sectionItemContact">

	<!-- Titulo -->
	<h2 class="titleOfSection text-uppercase">
		Nuestro Formulario
	</h2>

	<!-- Formulario -->
	<form id="form-contacto" action="" class="" method="POST">
		
		<div class="pageContacto__form__group">
			<label for="input_name" class="sr-only"></label>
			<input type="text" id="input_name" name="input_name" placeholder="<?php _e( 'Nombres y Apellidos', LANG ); ?>" required />
		</div> <!-- /.pageContacto__form__group -->
		
		<div class="pageContacto__form__group">
			<label for="input_address" class="sr-only"></label>
			<input type="text" id="input_address" name="input_address" placeholder="<?php _e( 'Dirección', LANG ); ?>" required />
		</div> <!-- /.pageContacto__form__group -->

		<div class="pageContacto__form__group">
			<label for="input_email" class="sr-only"></label>
			<input type="email" id="input_email" name="input_email" placeholder="<?php _e( 'E-mail', LANG ); ?>" data-parsley-trigger="change" required="" data-parsley-type-message="Escribe un email válido"/>
		</div> <!-- /.pageContacto__form__group -->
	
		<div class="pageContacto__form__group">
			<label for="input_consulta" class="sr-only"></label>
			<textarea name="input_consulta" id="input_consulta" placeholder="<?php _e( 'Consulta', LANG ); ?>" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="600" data-parsley-minlength-message="Necesitas más de 10 caracteres" data-parsley-validation-threshold="10"></textarea>
		</div> <!-- /.pageContacto__form__group -->
	
		<!-- Boton de enviar el formulario  -->
		<div class="pageContacto__form__group">
			<button id="send-form" class="btn__send-form text-uppercase">
			<?php _e( 'enviar' , LANG ); ?>
			</button> <!-- /.btn__send-form -->
		</div> <!-- /.pageContacto__form__group -->
		
	</form> <!-- /. -->
</section> <!-- /.pageContacto__form -->