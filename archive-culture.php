<?php 

/**
 * Page qui affiche toutes les articles de culture
 *
 * @package WordPress
 * @subpackage LeDernierMetro
 * @since LeDernierMetro 1.0
 *
 *
 */

?>

<?php get_header();

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
	
	global $nb_posts;
	$nb_posts = 5;

	global $kind;
	$kind = "culture"; 

	global $title;
	$title = null;
	if ( isset($_GET['title']) && !empty($_GET['title']) ){
		$title = $_GET['title'];
	}
	global $type;
	$type = null;
	if ( isset($_GET['type']) && !empty($_GET['type']) ){
		$type = $_GET['type'];
	}
	global $arrnd;
	$arrnd = null;
	if ( isset($_GET['arrnd']) && !empty($_GET['arrnd']) ){
		$arrnd = $_GET['arrnd'];
	}

	global $other_args;
	$other_args = array('type' => $type, 'arrnd' => $arrnd);



?>

<section id="archive_culture">
    <?php get_template_part('templates/template-go-up'); ?>
	<div class="content_wrapper">
		<div class="filters_wrapper">
			<form method="get" class="filters_container">
					
				<fieldset>
					<div class="dropdown-input" dropdown-input>
						<legend name="type">Rubrique</legend>
						<ul>
							<?php $terms = get_terms( array(
							    'taxonomy' => 'rubrique',
							    'hide_empty' => true,
							) );


							foreach ($terms as $key => $value) : ?>
								
								<li><input id="<?= $value->term_id ?>" type="checkbox" name="type[]"  value="<?= $value->slug ?>" <?php if( !empty($type) && in_array($value->slug, $type )){ echo "checked"; }	?>>
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
								
								<li><input id="<?= $value->term_id ?>" type="checkbox" name="arrnd[]" value="<?= $value->slug ?>" <?php if( !empty($arrnd) && in_array($value->slug, $arrnd )){ echo "checked";}	?>>
								<label for="<?= $value->term_id ?>"><?= $value->name ?></label></li>

							<?php endforeach; ?>
						</ul>
					</div>
				</fieldset>

				<input type="submit" value="Filtrer" >
			</form>
			<?php get_template_part("templates/template-search-bar"); ?>

		</div>
		<div class="culture_container" data-results-container>
			

			<?php
				global $type;
				global $arrnd;
				global $title;
				global $index;
				global $kind;
				global $nb_posts;
				global $args;

				$tax_query = array();
				
				if ( $type != null ){
					array_push($tax_query,
						array(
		                    'taxonomy' => 'rubrique',
		                    'field' => 'slug',
		                    'terms' => $type
		                    )
		                );
				}
				if ( $arrnd != null ){
					array_push($tax_query,
						array(
		                    'taxonomy' => 'arrondissement',
		                    'field' => 'slug',
		                    'terms' => $arrnd
		                    )
		                );
				}

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
		         <?php while ($query_header->have_posts()) : $query_header->the_post(); ?>

		          		<?php get_template_part('templates/template-archive-culture'); ?>

					<?php 
							global $index;
							$index ++; ?>
					<?php 
		          	endwhile;
			        	else : ?>
								<?php get_template_part('templates/template-not-found'); ?>
			        <?php endif; 
			        wp_reset_query();  // Restore global post data stomped by the_post().
		        ?>
		</div>
		<?php get_template_part('templates/template-infinite-scroll'); ?>
	</div>

</section>

<?php get_footer(); ?>