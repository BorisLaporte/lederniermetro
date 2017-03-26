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

/* Template name: template-map */	

?>

<?php get_header(); ?>

<?php 
	global $nb_posts;
	$nb_posts = -1;

	global $kind;
	$kind = "adresses";

	global $type;
	$type = null;
	if ( isset($_GET['type']) && !empty($_GET['type']) ){
		$type = $_GET['type'];
		// $type = json_decode(stripslashes($type));
	}
	global $prix;
	$prix = null;
	if ( isset($_GET['prix']) && !empty($_GET['prix']) ){
		$prix = $_GET['prix'];
		// $prix = json_decode(stripslashes($prix));
	}
	global $arrnd;
	$arrnd = null;
	if ( isset($_GET['arrnd']) && !empty($_GET['arrnd']) ){
		$arrnd = $_GET['arrnd'];
		// $arrnd = json_decode(stripslashes($arrnd));
	}
	global $pays;
	$pays = null;
	if ( isset($_GET['pays']) && !empty($_GET['pays']) ){
		$pays = $_GET['pays'];
		// $pays = json_decode(stripslashes($pays));
	}

	global $other_args;
	$other_args = array('type' => $type, 'prix' => $prix, 'arrnd' => $arrnd, 'pays' => $pays);

	global $title;
	$title = null;
	if ( isset($_GET['title']) && !empty($_GET['title']) ){
		$title = $_GET['title'];
	}

?>
	
	<section id="map" big-map>

	<?php
		global $type;
		global $prix;
		global $arrnd;
		global $pays;
		global $title;
		global $index;
		$index = 0;

		$tax_query = array();

		if ( $type != null ){
			foreach ($type as $value) {

				array_push($tax_query,
					array(
	                    'taxonomy' => 'type_bon_plan',
	                    'field' => 'slug',
	                    'terms' => $value
	                    )
	                );
			}	
		}
		if ( $prix != null ){
			foreach ($prix as $value) {

				array_push($tax_query,
					array(
	                    'taxonomy' => 'prix',
	                    'field' => 'slug',
	                    'terms' => $value
	                    )
	                );
			}	
		}
		if ( $arrnd != null ){
			foreach ($arrnd as $value) {

				array_push($tax_query,
					array(
	                    'taxonomy' => 'arrondissement',
	                    'field' => 'slug',
	                    'terms' => $value
	                    )
	                );
			}	
		}
		if ( $pays != null ){
			foreach ($pays as $value) {

				array_push($tax_query,
					array(
	                    'taxonomy' => 'pays',
	                    'field' => 'slug',
	                    'terms' => $value
	                    )
	                );
			}	
		}

		global $args;
		global $kind;
        $args=array(
          'post_type' => $kind,
          'post_status' => 'publish',
          'orderby' => 'date',
          'order' => 'DESC',
          'posts_per_page' => $nb_posts,
          'ignore_sticky_posts'=> 1,
          'tax_query' => $tax_query,
          's' => $title

        );

        $query_header = new WP_Query($args);
        if( $query_header->have_posts() ) : ?>


	
			<div class="location_wrapper">
				<div class="filters_wrapper" id="filter_map_mobile">
					<form method="get" class="filters_container">
						
						<fieldset>
							<div class="dropdown-input" dropdown-input>
								<legend name="type">Type de bon plan</legend>
								<ul>
									<?php $terms = get_terms( array(
									    'taxonomy' => 'type_bon_plan',
									    'hide_empty' => true,
									) );


									foreach ($terms as $key => $value) : ?>
										
										<li><input id="<?= $value->term_id ?>" type="checkbox" name="type[]"  value="<?= $value->slug ?>" <?php if( !empty($type) && in_array($value->slug, $type )){ echo "checked";}	?>>
										<label for="<?= $value->term_id ?>"><?= $value->name ?></label></li>

									<?php endforeach; ?>
								</ul>
							</div>


						</fieldset>
						<fieldset>
							<div class="dropdown-input" dropdown-input>
								<legend name="arrondissement">Arrondissement</legend>
								<ul>
								<?php $terms = get_terms( array(
								    'taxonomy' => 'arrondissement',
								    'hide_empty' => true,
								) );


								foreach ($terms as $key => $value) : ?>
									
									<li><input id="<?= $value->term_id ?>" type="checkbox" name="arrnd[]" value="<?= $value->slug ?>" <?php if( !empty($arrnd) && in_array($value->slug, $arrnd )){ echo "checked";}	?> >
									<label for="<?= $value->term_id ?>"><?= $value->name ?></label></li>

								<?php endforeach; ?>
								</ul>
							</div>
						</fieldset>

						<fieldset>
							<div class="dropdown-input" dropdown-input>
								<legend name="pays">Pays</legend>
								<ul>
								<?php $terms = get_terms( array(
								    'taxonomy' => 'pays',
								    'hide_empty' => true,
								) );


								foreach ($terms as $key => $value) : ?>
									
									<li><input id="<?= $value->term_id ?>" type="checkbox" name="pays[]" value="<?= $value->slug ?>" <?php if( !empty($pays) && in_array($value->slug, $pays )){ echo "checked";}	?>>
									<label for="<?= $value->term_id ?>"><?= $value->name ?></label></li>

								<?php endforeach; ?>
								</ul>
							</div>
						</fieldset>
						<fieldset>
							<div class="dropdown-input" dropdown-input>
								<legend name="prix">Prix</legend>
								<ul>	
								<?php $terms = get_terms( array(
								    'taxonomy' => 'prix',
								    'hide_empty' => true,
								) );


								foreach ($terms as $key => $value) : ?>
									
									
									<li><input id="<?= $value->term_id ?>" type="checkbox" name="prix[]" value="<?= $value->slug ?>" <?php if( !empty($prix) && in_array($value->slug, $prix )){ echo "checked";}	?>>
									<label for="<?= $value->term_id ?>"><?= $value->name ?></label></li>

								<?php endforeach; ?>
								</ul>
							</div>
						</fieldset>

						<input type="submit" value="Filtrer" >
					</form>
				</div>
				<div class="location_container">
					<div class="filters_wrapper" id="filter_map">
					<form method="get" class="filters_container">
						
						<fieldset>
							<div class="dropdown-input" dropdown-input>
								<legend name="type">Type de bon plan</legend>
								<ul>
									<?php $terms = get_terms( array(
									    'taxonomy' => 'type_bon_plan',
									    'hide_empty' => true,
									) );


									foreach ($terms as $key => $value) : ?>
										
										<li><input id="<?= $value->term_id ?>" type="checkbox" name="type[]"  value="<?= $value->slug ?>" <?php if( !empty($type) && in_array($value->slug, $type )){ echo "checked";}	?>>
										<label for="<?= $value->term_id ?>"><?= $value->name ?></label></li>

									<?php endforeach; ?>
								</ul>
							</div>


						</fieldset>
						<fieldset>
							<div class="dropdown-input" dropdown-input>
								<legend name="arrondissement">Arrondissement</legend>
								<ul>
								<?php $terms = get_terms( array(
								    'taxonomy' => 'arrondissement',
								    'hide_empty' => true,
								) );


								foreach ($terms as $key => $value) : ?>
									
									<li><input id="<?= $value->term_id ?>" type="checkbox" name="arrnd[]" value="<?= $value->slug ?>" <?php if( !empty($arrnd) && in_array($value->slug, $arrnd )){ echo "checked";}	?> >
									<label for="<?= $value->term_id ?>"><?= $value->name ?></label></li>

								<?php endforeach; ?>
								</ul>
							</div>
						</fieldset>

						<fieldset>
							<div class="dropdown-input" dropdown-input>
								<legend name="pays">Pays</legend>
								<ul>
								<?php $terms = get_terms( array(
								    'taxonomy' => 'pays',
								    'hide_empty' => true,
								) );


								foreach ($terms as $key => $value) : ?>
									
									<li><input id="<?= $value->term_id ?>" type="checkbox" name="pays[]" value="<?= $value->slug ?>" <?php if( !empty($pays) && in_array($value->slug, $pays )){ echo "checked";}	?>>
									<label for="<?= $value->term_id ?>"><?= $value->name ?></label></li>

								<?php endforeach; ?>
								</ul>
							</div>
						</fieldset>
						<fieldset>
							<div class="dropdown-input" dropdown-input>
								<legend name="prix">Prix</legend>
								<ul>	
								<?php $terms = get_terms( array(
								    'taxonomy' => 'prix',
								    'hide_empty' => true,
								) );


								foreach ($terms as $key => $value) : ?>
									
									
									<li><input id="<?= $value->term_id ?>" type="checkbox" name="prix[]" value="<?= $value->slug ?>" <?php if( !empty($prix) && in_array($value->slug, $prix )){ echo "checked";}	?>>
									<label for="<?= $value->term_id ?>"><?= $value->name ?></label></li>

								<?php endforeach; ?>
								</ul>
							</div>
						</fieldset>

						<input type="submit" value="Filtrer" >
					</form>
				</div>
				<div class="list_elements">
					<div class="container_elements" data-all-adresses >
						<?php while ($query_header->have_posts()) : $query_header->the_post(); ?>

						<?php $location = get_field('map');
							if( !empty($location) ): ?>
								<div class="address" data-adresse data-id="<?= $post->ID ?>">
									<a href="#" data-id="<?= $post->ID ?>" >
										<?php the_post_thumbnail(); ?>
										<div class="content_text">
											<h3 class="name_adress"><?= the_title(); ?></h3>
											<div class="description"><?= get_field_object('resume')['value']; ?> </div>
										</div>
									</a>
								</div>
							<?php endif; ?>

						<?php endwhile; ?>
					</div>
				</div>
				</div>

				<div class="acf-map">
					<?php while ($query_header->have_posts()) : $query_header->the_post(); ?>

						<?php $location = get_field('map');
						if( !empty($location) ): ?>
							<div class="marker" data-marker data-lat="<?= $location['lat']; ?>" data-lng="<?= $location['lng']; ?>" data-id="<?= $post->ID ?>">
								<a href="<?php the_permalink()?>">
									<div class="bubble">
										<?php the_post_thumbnail( ); ?>
										<h3 class="name_adress"><?= the_title(); ?></h3>
										<div class="full_adress"><?= $location['address'] ?></div>
									</div>
								</a>
							</div>
						<?php endif; ?>

					<?php endwhile; ?>
				</div>

			</div>	

        <?php endif;
        wp_reset_query();  
        ?>
			
	</section>

<?php get_footer(); ?>