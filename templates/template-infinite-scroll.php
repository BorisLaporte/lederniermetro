<?php 
	global $index;
	global $mobile;
	global $nb_posts;
	if ( $index >= $nb_posts ) : ?>
<div class="infinite_scroll" data-loader>
<?php else : ?>
<div class="infinite_scroll deactivate">
<?php endif; ?>
	<?php 
		global $index;
		global $nb_posts;
		global $args;
		global $kind;
		$query = wp_json_encode($args);
	?>
	<a href="#" class="button_load_more" data-btn-load-more data-nb-posts="<?= $nb_posts ?>" data-mobile="<?= $mobile ?>" data-args='<?= $query ?>' data-type="<?= $kind ?>">Plus d'articles</a>
	<div class="loader_gif" data-gif-loader data-mobile="<?= $mobile ?>" data-nb-posts="<?= $nb_posts ?>"
	data-args='<?= $query ?>' data-type="<?= $kind ?>"></div>
</div>