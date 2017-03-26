<?php 

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage LeDernierMetro
 * @since LeDernierMetro 1.0
 */

?>
<div class="show-nothing">
	<?php get_header(); ?>

	<section id="lost_in_the_woods">
		<div class="content_wrapper">
			<div class="content_container">
				<img class="metro-illu" src="<?php echo get_template_directory_uri();?>/assets/img/metro-illu.png" alt="un metro">
				<h1 class="title">Interruption momentanée !</h1>
				<p class="description">Nous venons de rencontrer un problème, nous nous efforçons
				de remettre le trafic à la normale.</p>
				<a class="back-home" href="/">Retourner sur la page d'accueil</a>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
</div>
