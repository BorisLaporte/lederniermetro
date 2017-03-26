<?php 

/**
 * The Homepage
 *
 * @package WordPress
 * @subpackage LeDernierMetro
 * @since LeDernierMetro 1.0
 *
 *
 */
global $index;
$index = 0;


require_once 'Mobile_Detect.php';

$detect = new Mobile_Detect;
global $mobile;
if ( $detect->isMobile() ) {
 $mobile = true;
} else {
	$mobile = false;
}

get_header(); ?>

<section id="home">
	<?php get_template_part('templates/template-go-up'); ?>
	<div class="home_header_wrapper">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/img/header.jpg" alt="Le Dernier Métro" class="header_img">
	</div>
	<div class="content_sideinformation">
		<span class="bottomStroke"></span>
		<h2 class="sideInformation">bonnes adresses</h2>
	</div>
	<div class="content_wrapper">
		<div class="goodadress_container">
		<?php
			$terms = get_terms( array(
			    'taxonomy' => 'type_bon_plan',
			    'hide_empty' => true,
			) );


			foreach ($terms as $key => $value) : ?>

				<div>
					<?php 

						$tax_query = array(array(
		                    'taxonomy' => 'type_bon_plan',
		                    'field' => 'slug',
		                    'terms' => $value
                    	));

						$args=array(
				          'post_type' => 'adresses',
				          'post_status' => 'publish',
				          'orderby' => 'date',
				          'order' => 'DESC',
				          'posts_per_page' => 1,
				          'ignore_sticky_posts'=> 1,
			              'tax_query' => $tax_query,
				        );

	        		?>
					<?php 
		        	 	$query_suporte = new WP_Query($args);
				        if( $query_suporte->have_posts() ) {
			          	while ($query_suporte->have_posts()) : $query_suporte->the_post();?>
				          
						<?php 
							global $index;
							global $mobile;
							if ($mobile || $index%2 != 0): 
						?>
							
							<div class="card_wrapperleft">
								<div class="innerleft">
									<!-- <img src="<?php echo get_template_directory_uri();?>/assets/img/restaurant.jpg?>" alt="Bonnes adresses"> -->
									<?php the_post_thumbnail( 'prez' ); ?>
								</div>
								<div class="innerright">
									<div class="title_wrapper">
										<div class="main_subtitle">
											<span class="leftStroke"></span>
											<h2 class="subtitle"><?= get_the_terms($post->id, 'type_bon_plan')[0]->name; ?></h2>
											<span class="rightStroke"></span>
										</div>
										<h1 class="main_title"><?= the_title(); ?></h1>
									</div>
									<?php if (function_exists('get_wp_term_image') && !$mobile): ?>
										<?php
											$term = get_the_terms($post->id, 'type_bon_plan')[0];
											if ( !empty($term) ): ?>
											<?php
												$term_id = $term->term_id;
											    $meta_image = get_wp_term_image($term_id);
											?>

										<?php if ( !empty($meta_image) ): ?>
										<img class="corner_img" src="<?= $meta_image ?>" alt="<?= $term->name ?>"/>
										<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
									<p class="card_description"><?= get_field('resume', false, false); ?></p>
									<a href="<?= the_permalink() ?>" class="btn_more">En savoir plus</a>
									
								</div>
							</div>

						<?php else: ?>

							
							<div class="card_wrapperright">
								<div class="innerleft">
									<div class="title_wrapper">
										<div class="main_subtitle">
											<span class="leftStroke"></span>
											<h2 class="subtitle"><?= get_the_terms($post->id, 'type_bon_plan')[0]->name; ?></h2>
											<span class="rightStroke"></span>
										</div>
										<h1 class="main_title"><?= the_title(); ?></h1>
									</div>
									<?php if (function_exists('get_wp_term_image') && !$mobile): ?>
										<?php
											$term = get_the_terms($post->id, 'type_bon_plan')[0];
											if ( !empty($term) ): ?>
											<?php
												$term_id = $term->term_id;
											    $meta_image = get_wp_term_image($term_id);
											?>
										<?php if ( !empty($meta_image) ): ?>
										<img class="corner_img" src="<?= $meta_image ?>" alt="<?= $term->name ?>"/>
										<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
									<p class="card_description"><?= get_field('resume', false, false); ?></p>
									<a href="<?= the_permalink() ?>" class="btn_more">En savoir plus</a>
								</div>
								<div class="innerright">
									<!-- <img src="<?php echo get_template_directory_uri();?>/assets/img/restaurant.jpg?>" alt="Bonnes adresses"> -->
									<?php the_post_thumbnail( 'prez' ); ?>
									
								</div>
							</div>

						<?php endif ?>	
					<?php
						$index ++;
			          	endwhile;
				        }
				        wp_reset_query();  // Restore global post data stomped by the_post().
			        ?>
				</div>
			<?php endforeach ?>
		</div>
		<div class="culture_container">
			<?php
			$terms = get_terms( array(
			    'taxonomy' => 'rubrique',
			    'hide_empty' => true,
			) );


			foreach ($terms as $key => $value) : ?>

				<div>
					<?php 

						$tax_query = array(array(
		                    'taxonomy' => 'rubrique',
		                    'field' => 'slug',
		                    'terms' => $value
                    	));

						$args=array(
				          'post_type' => 'culture',
				          'post_status' => 'publish',
				          'orderby' => 'date',
				          'order' => 'DESC',
				          'posts_per_page' => 1,
				          'ignore_sticky_posts'=> 1,
			              'tax_query' => $tax_query,
				        );

	        		?>
					<?php 
		        	 	$query_suporte = new WP_Query($args);
				        if( $query_suporte->have_posts() ) {
			          	while ($query_suporte->have_posts()) : $query_suporte->the_post();?>
				          
						<?php 
							global $index;
							global $mobile;
							if ($mobile || $index%2 != 0): 
						?>

						
							<div class="card_wrapperleft">
								<div class="innerleft">
									<?php the_post_thumbnail( 'prez' ); ?>
								</div>
								<div class="innerright">
									<div class="title_wrapper">
										<div class="main_subtitle">
											<span class="leftStroke"></span>
											<h2 class="subtitle"><?= get_the_terms($post->id, 'rubrique')[0]->name; ?></h2>
											<span class="rightStroke"></span>
										</div>
										<h1 class="main_title"><?= the_title(); ?></h1>
									</div>
									<?php if (function_exists('get_wp_term_image') && !$mobile): ?>
										<?php
											$term = get_the_terms($post->id, 'rubrique')[0];
											if ( !empty($term) ): ?>
											<?php
												$term_id = $term->term_id;
											    $meta_image = get_wp_term_image($term_id);
											?>
										<?php if ( !empty($meta_image) ): ?>
										<img class="corner_img" src="<?= $meta_image ?>" alt="<?= $term->name ?>"/>
										<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
									<p class="card_description"><?= get_field('resume', false, false); ?></p>
									<a href="<?= the_permalink() ?>" class="btn_more">En savoir plus</a>
									
								</div>
							</div>

							
						<?php else: ?>

							<div class="card_wrapperright">
								<div class="innerleft">
									<div class="title_wrapper">
										<div class="main_subtitle">
											<span class="leftStroke"></span>
											<h2 class="subtitle"><?= get_the_terms($post->id, 'rubrique')[0]->name; ?></h2>
											<span class="rightStroke"></span>
										</div>
										<h1 class="main_title"><?= the_title(); ?></h1>
									</div>
									<?php if (function_exists('get_wp_term_image') && !$mobile): ?>
										<?php
											$term = get_the_terms($post->id, 'rubrique')[0];
											if ( !empty($term) ): ?>
											<?php
												$term_id = $term->term_id;
											    $meta_image = get_wp_term_image($term_id);
											?>
										<?php if ( !empty($meta_image) ): ?>
										<img class="corner_img" src="<?= $meta_image ?>" alt="<?= $term->name ?>"/>
										<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
									<p class="card_description"><?= get_field('resume', false, false); ?></p>
									<a href="<?= the_permalink() ?>" class="btn_more">En savoir plus</a>
								</div>
								<div class="innerright">				
									<?php the_post_thumbnail( 'prez' ); ?>
									
								</div>
							</div>

						<?php endif ?>	
					<?php
						$index ++;
			          	endwhile;
				        }
				        wp_reset_query();  // Restore global post data stomped by the_post().
			        ?>
				</div>
			<?php endforeach ?>
		</div>
	</div>
</section>
    

<?php get_footer(); ?>