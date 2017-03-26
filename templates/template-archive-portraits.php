<!-- La boucle pour alterner droite gauche -->
<?php 
	
	global $index;
	global $mobile;
	if ($index%2 != 0 || $mobile ):
?>
	<!-- dans un sens -->
	<div class="card_wrapperleft">
		<div class="innerleft">
			<?php the_post_thumbnail( 'prez' ); ?>
		</div>
		<div class="innerright">
			<div class="title_wrapper">
				<!-- <div class="main_subtitle">
					<span class="leftStroke"></span>
					<h2 class="subtitle">Restaurant</h2>
					<span class="rightStroke"></span>
				</div> -->
				<h1 class="main_title"><?= the_title(); ?></h1>
			</div>
			<p class="card_description"><?= get_field('resume', false, false); ?></p>
			<a href="<?= the_permalink() ?>" class="btn_more">En savoir plus</a>
		</div>
	</div>
<?php else: ?>
	
	<!-- dans l'autre -->
	<div class="card_wrapperright">
		<div class="innerleft">
			<div class="title_wrapper">
				<!-- <div class="main_subtitle">
					<span class="leftStroke"></span>
					<h2 class="subtitle">Brunch & Tea time</h2>
					<span class="rightStroke"></span>
				</div> -->
				<h1 class="main_title"><?= the_title(); ?></h1>
			</div>
			<p class="card_description"><?= get_field('resume', false, false); ?></p>
			<a href="<?= the_permalink() ?>" class="btn_more">En savoir plus</a>
		</div>
		<div class="innerright">
			<?php the_post_thumbnail( 'prez' ); ?>
		</div>
	</div>
<?php endif; ?>