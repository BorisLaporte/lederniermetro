<?php 

/**
 * Page qui affiche un portrait spécifique
 *
 * @package WordPress
 * @subpackage LeDernierMetro
 * @since LeDernierMetro 1.0
 *
 *
 */

?>

<?php 

	global $id;
	$id = $post->ID;
	get_header(); ?>

	<section id="portrait">
		<div class="title_wrapper">
			<div class="main_subtitle">
				<span class="leftStroke"></span>
				<h2 class="subtitle">Portrait</h4>
				<span class="rightStroke"></span>
			</div>
			<h1 class="main_title"><?php the_title(); ?></h1>
		</div>
		<div class="header_single_wrapper" style="background-image: url(<?php the_post_thumbnail_url('header'); ?>); background-size: cover;">
		</div>
		<div class="content_wrapper">
			<div class="side_container">
				<div class="authors_wrapper">
					<!-- La boucle pour les auteurs </-->
					<div class="authors_title">Rédigé par</div>
					<div class="authors_container">
						<div class="authors_icon"></div>
						<div class="authors_names">
							<?php 
								$auteurs = get_field('auteurs');

								if( $auteurs ): ?>
								    <?php foreach( $auteurs as $auteur ): ?>
								        <div><?= $auteur["user_firstname"] ?> <?= $auteur["user_lastname"] ?></div>
								    <?php endforeach; ?>
							<?php endif; ?>
						</div>
						<h3 class="date_wrapper">Le <?= the_date('j F Y') ?></h3>
					</div>
				</div>
				<?php get_template_part('templates/template-share-social'); ?>
			</div>
			<article class="article_wrapper">
				<?php the_content(); ?>
			</article>
		</div>
		<div class="suggestions_wrapper">
			<!-- Boucle pour les suggestions -->
			<?php
				global $id;

		        $args=array(
		          'post_type' => 'portraits',
		          'post_status' => 'publish',
		          'orderby' => 'date',
		          'order' => 'DESC',
		          'posts_per_page' => 3,
		          'ignore_sticky_posts'=> 1,
		          'post__not_in' => array($id),
		        );

		        $query_header = new WP_Query($args);
		        if( $query_header->have_posts() ) : ?>

						<h2 class="suggestions_title">Portraits similaires</h2>
						<div class="suggestions_container">

		        <?php  while ($query_header->have_posts()) : $query_header->the_post(); ?>
		          	<div class="suggestion_content">
		          		<a href="<?= the_permalink(); ?>" style="background-image: url(<?php the_post_thumbnail_url('suggestion'); ?>); background-size: cover;">
						</a>
						<h3><?= the_title(); ?></h3>
		          	</div>
		            <?php
		          endwhile; ?>
								
	        		</div>
		        <?php endif;
		        wp_reset_query();  // Restore global post data stomped by the_post().
	        ?>
		</div>
	</section>

<?php get_footer(); ?>