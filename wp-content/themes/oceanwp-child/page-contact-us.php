<?php
/**
 * Template Name: Contact
 * 
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package OceanWP WordPress theme
 */

//fonction php pour envoyer et traiter les mails




get_header(); ?>

	<?php do_action( 'ocean_before_content_wrap' ); ?>
	<!--echo do_shortcode( '[example_form]' ); -->

	
	<!--http://localhost/wordpress_site_vitrine/contact-us/(ouvre un nouvel onglet)//the_permalink()-->
	<form action= "<?php the_permalink(); ?>" method="POST" class="form" enctype="multipart/form-data">
	<?php wp_nonce_field( 'faire-form', 'form-verif' ); ?>
	
	<div class="container contact">
	<?php traitement_formulaire(); ?>

		<h2>Login</h2>
		
		<div class="row">
			<div class="col">
				<div class="inputBox">
					<input type="text" name="nom" required="obligatoire">
					<span class="text">Nom</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" name="telephone" required="obligatoire">
					<span class="text">Telephone</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="inputBox">
					<input type="mail" name="mail" required="obligatoire">
					<span class="text">Mail</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" name="adresse" required="obligatoire" >
					<span class="text">Adresse</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="inputBox">
					<input type="mail" name="ville" required="obligatoire">
					<span class="text">Ville</span>
					<span class="line"></span>
				</div>
			</div>
			<div class="col">
				<div class="inputBox">
					<input type="text" name="codepostal" required="obligatoire" >
					<span class="text">Code postal</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="file">
					<input type="file" name="file[]" multiple>
					<span class="line"></span>
					
				</div>
				<div class="filealert">
				<span>maintien touche ctrl pour envoyer plusieurs fichiers</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="inputBox textarea">
					<textarea name="message" required="obligatoire"></textarea>
					<span class="text">Tapez votre message</span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<input type="hidden" name="token_response" id="token_response">
		<div class="row">
			<div class="col">
				<input type="submit" name="formenvoi" value="envoyer" >
			</div>
		</div>
		
	</div>
</form>
			

	<?php do_action( 'ocean_after_content_wrap' ); ?>

<?php get_footer() ?>