<?php 

/**
 * Le template de à propos de nous
 *
 * @package WordPress
 * @subpackage LeDernierMetro
 * @since LeDernierMetro 1.0
 *
 *	
 */

/* Template name: template-apropos */	
?>

<?php 

	global $social;
	$social = get_option('wpseo_social');
	global $id;
	$id = $post->ID;
	get_header(); ?>

	<section id="about">
		<div class="title_wrapper">
			<div class="main_subtitle">
				<span class="leftStroke"></span>
				<h2 class="subtitle">L'équipe</h4>
				<span class="rightStroke"></span>
			</div>
			<h1 class="main_title"><?php the_title(); ?></h1>
		</div>
		<div class="header_single_wrapper" style="background-image: url(<?php the_post_thumbnail_url('header'); ?>); background-size: cover;">
		</div>
		<div class="content_wrapper">
			<div class="side_container_about">
				<div class="infos_wrapper">
					<!-- La boucle pour les auteurs </-->
					<div class="infos_title">L'équipe</div>
					<div class="infos_container">
						<p>Arthur Belmer</p>
						<p>Jacques Parmentier</p>
						<p>Pauline Taveneau</p>
						<p>Boris Laporte</p>
						<p>Matthieu Tourdes</p>
					</div>
				</div>
				<?php get_template_part('templates/template-share-social'); ?>
			</div>
			<article class="article_wrapper">
				<?php the_content(); ?>
				<?php if ( !empty(get_field('link')) ): ?>
					<a class="link" href="<?= get_field('link') ?>">Découvrez le site</a>
				<?php endif; ?>
				<div class="gallery">
					<!-- La boucle pour les images supplémentaires -->
					<?php 
					$images = get_field('gallerie');

					if( $images ): ?>

					        <?php foreach( $images as $image ): ?>
								<div class="about_img" style="background-image: url(<?php echo $image['sizes']['gallerie']; ?>); background-size: cover;"></div>
					        <?php endforeach; ?>

					<?php endif; ?>
				</div>
			</article>
		</div>
		<div class="contact_wrapper">
			<div class="contact_container">
				<h2 class="contact_title">Nous contacter</h2>
				<div class="contact_description">
					<p>Une question ? Un commentaire ? Une suggestion ?</p>
					<p>Désireux de nous faire partager vos idées ou encore de collaborer avec nous, contactez-nous !</p>
				</div>
				<?= do_shortcode('[contact-form-7 id="4" title="Contact form about"]'); ?>
	        </div>
		</div>
	</section>

<?php get_footer(); ?>