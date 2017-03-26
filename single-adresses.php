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

	global $social;
	$social = get_option('wpseo_social');
	global $id;
	$id = $post->ID;
	get_header(); ?>

	<section id="adress">
		<div class="title_wrapper">
			<div class="main_subtitle">
				<span class="leftStroke"></span>
				<h2 class="subtitle"><?= get_the_terms($post->id, 'type_bon_plan')[0]->name; ?></h4>
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
						<div class="phone"><?= get_field('telephone') ?></div>
					</div>
				</div>
				<div class="schedule_wrapper">
					<div class="schedule_title">Horaires</div>
					<div class="schedule_container">
						<!-- la boucle pour avoir les horaires d'ouvertures -->
						<?php
							$horaires = get_field('horaires')[0];
							if( $horaires ): ?>
						        <?php foreach( $horaires as $day => $value ): ?>
						            <h3 class= "time"><?= $day ?>:
						            <?php if( !empty($value[0]["h1"]) && !empty($value[0]["h2"]) && !empty($value[0]["h3"]) && !empty($value[0]["h4"]) ): ?>

										<!-- 9h - 12h / 14h - 21h -->
										<?= $value[0]["h1"] ?>h - <?= $value[0]["h2"] ?>h / <?= $value[0]["h3"] ?>h - <?= $value[0]["h4"] ?>h


						            <?php elseif (!empty($value[0]["h1"]) && !empty($value[0]["h2"])): ?>

										<!-- 9h - 18h -->
										<?= $value[0]["h1"] ?>h - <?= $value[0]["h2"] ?>h


						            <?php else : ?>

										<!-- Fermé -->
										Fermé


						            <?php endif; ?></h3>
						        <?php endforeach; ?>
						<?php endif; ?>
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
								<div class="adress_img" style="background-image: url(<?php echo $image['sizes']['gallerie']; ?>); background-size: cover;"></div>
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
			<h2 class="suggestions_title">Bons plans similaires</h2>
			<div class="suggestions_container">
				
			<!-- Boucle pour les suggestions -->
			<?php
				global $id;
				global $type;
				$type = array(get_the_terms($post->id, 'type_bon_plan')[0]->slug);
		        $args=array(
		          'post_type' => 'adresses',
		          'post_status' => 'publish',
		          'orderby' => 'date',
		          'order' => 'DESC',
		          'posts_per_page' => 3,
		          'ignore_sticky_posts'=> 1,
		          'post__not_in' => array($id),
		          'type_bon_plan' => $type
		        );
		        $query_footer = new WP_Query($args);
		        if( $query_footer->have_posts() ) {
		          while ($query_footer->have_posts()) : $query_footer->the_post(); ?>
		          	<div class="suggestion_content">
		          		<a href="<?= the_permalink(); ?>" style="background-image: url(<?php the_post_thumbnail_url('suggestion'); ?>); background-size: cover;">
						</a>
						<h3><?= the_title(); ?></h3>
		          	</div>
		            <?php
		          endwhile;
		        }
		        wp_reset_query();  // Restore global post data stomped by the_post().
	        ?>
	        </div>
		</div>
	</section>

<?php get_footer(); ?>