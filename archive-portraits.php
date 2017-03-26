<?php 

/**
 * Page qui affiche toutes les portraits
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
	$kind = "portraits";

	global $title;
	$title = null;
	if ( isset($_GET['title']) && !empty($_GET['title']) ){
		$title = $_GET['title'];
	}


	global $other_args;
	$other_args = array();
?>

<section id="archive_portraits">
	<?php get_template_part('templates/template-go-up'); ?>
	<div class="content_wrapper">
		<div class="filters_wrapper">
			<div class="filters_sub_wrapper">
				<?php get_template_part("templates/template-search-bar"); ?>
			</div>
		</div>
		<div class="portraits_container" data-results-container>
			
		
			<?php
			global $index;
			global $title;
			global $kind;
			global $args;

	        $args=array(
	          'post_type' => $kind,
	          'post_status' => 'publish',
	          'orderby' => 'date',
	          'order' => 'DESC',
	          'posts_per_page' => $nb_posts,
	          'ignore_sticky_posts'=> 1,
	          's' => $title
	        );

		        $query_header = new WP_Query($args);
		        if( $query_header->have_posts() ) : ?>
		         <?php while ($query_header->have_posts()) : $query_header->the_post(); ?>

		          		<?php get_template_part('templates/template-archive-portraits'); ?>


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