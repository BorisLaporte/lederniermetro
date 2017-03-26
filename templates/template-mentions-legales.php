<?php 

/**
 * Le template des mentions légales
 *
 * @package WordPress
 * @subpackage LeDernierMetro
 * @since LeDernierMetro 1.0
 *
 *	
 */

/* Template name: template-mentions-legales */	
?>

<?php 
	global $id;
	$id = $post->ID;
	get_header(); ?>

	<section id="mentions-legales">
		<div class="title_wrapper">
			<div class="main_subtitle">
				<span class="leftStroke"></span>
				<h2 class="subtitle">Crédits &</h4>
				<span class="rightStroke"></span>
			</div>
			<h1 class="main_title"><?php the_title(); ?></h1>
		</div>
		<div class="content_wrapper">
			<article class="article_wrapper">
				<?php the_content(); ?>
			</article>
		</div>
	</section>

<?php get_footer(); ?>