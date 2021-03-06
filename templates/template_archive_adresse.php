<?php 

/**
 * Le template pour le scroll infinit adresse
 *
 * @package WordPress
 * @subpackage LeDernierMetro
 * @since LeDernierMetro 1.0
 *
 *	
 */	
?>

<?php 

	global $index;
	global $mobile;
	if ($index%2 != 0 || $mobile ):
?>

	<div class="card_wrapperleft" data-index="<?= $post->ID ?>">
		<div class="innerleft">
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
			
			<p class="card_description"><?= get_field('resume', false, false); ?></p>
			<a href="<?= the_permalink() ?>" class="btn_more">En savoir plus</a>
			
		</div>
	</div>


<?php else: ?>


	<div class="card_wrapperright" data-index="<?= $post->ID ?>">
		<div class="innerleft">
			<div class="title_wrapper">
				<div class="main_subtitle">
					<span class="leftStroke"></span>
					<h2 class="subtitle"><?= get_the_terms($post->id, 'type_bon_plan')[0]->name; ?></h2>
					<span class="rightStroke"></span>
				</div>
				<h1 class="main_title"><?= the_title(); ?></h1>
			</div>
			
			<p class="card_description"><?= get_field('resume', false, false); ?></p>
			<a href="<?= the_permalink() ?>" class="btn_more">En savoir plus</a>
		</div>
		<div class="innerright">
			<?php the_post_thumbnail( 'prez' ); ?>	
		</div>
	</div>

<?php endif ?>