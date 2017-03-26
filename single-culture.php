<?php 

/**
 * Page qui affiche une adresse spécifique
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

	<section id="culture">
		<div class="title_wrapper">
			<div class="main_subtitle">
				<span class="leftStroke"></span>
				<h2 class="subtitle"><?= get_the_terms($post->id, 'rubrique')[0]->name; ?></h4>
				<span class="rightStroke"></span>
			</div>
			<h1 class="main_title"><?php the_title(); ?></h1>
		</div>
		<div class="header_single_wrapper" style="background-image: url(<?php the_post_thumbnail_url('header'); ?>); background-size: cover;">
		</div>
		<div class="content_wrapper">
			<div class="side_container_adress">
				<div class="infos_wrapper">
					<!-- La boucle pour les auteurs </-->
					<div class="infos_title">Infos pratiques</div>
					<div class="infos_container">
						<div class="adress"><?= get_field('adresse') ?></div>
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
								<img class="adress_img" src="<?php echo $image['sizes']['gallerie']; ?>" alt="<?php echo $image['alt']; ?>" />
								<!--<div class="adress_img" style="background-image: url(<?php echo $image['sizes']['gallerie']; ?>); background-size: cover;"></div>-->
					        <?php endforeach; ?>

					<?php endif; ?>
				</div>
			</article>
		</div>
		<div class="location_wrapper">
				<?php 

					$location = get_field('map');
					if( !empty($location) ):
				?>
					<div class="acf-map">
						<div class="marker" data-lat="<?= $location['lat']; ?>" data-lng="<?= $location['lng']; ?>"></div>
					</div>
				<?php endif; ?>
		</div>
		<div class="suggestions_wrapper">
				
			<!-- Boucle pour les suggestions -->
			<?php
				global $id;
				global $type;
				$type = array(get_the_terms($post->id, 'rubrique')[0]->slug);
		        $args=array(
		        	'rubrique' => $type,
		          'post_type' => 'culture',
		          'post_status' => 'publish',
		          'orderby' => 'date',
		          'order' => 'DESC',
		          'posts_per_page' => 3,
		          'ignore_sticky_posts'=> 1,
		          'post__not_in' => array($id),
		        );

		        $query_header = new WP_Query($args);
		        if( $query_header->have_posts() ) : ?>
		        
						<h2 class="suggestions_title">Bons plans similaires</h2>
						<div class="suggestions_container">

		        <?php
		          while ($query_header->have_posts()) : $query_header->the_post(); ?>
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