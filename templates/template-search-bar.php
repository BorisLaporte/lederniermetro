<?php
	global $other_args;
	global $title;

?>

<div class="search_bar" id="search-bar"  class="content" >
		<form role="search" method="get" id="searchform">
			<input class="input-text" type="text" name="title" value="<?= $title ?>"/>
			<?php foreach ($other_args as $key => $value) : ?>
				<?php if ( !empty($value) ): ?>
					<?php foreach ($value as $_value) : ?>
						<?php if ( !empty($_value) ): ?>
							<input type="hidden" name="<?= $key ?>[]" value="<?= $_value ?>"/>
						<?php endif ?>
					<?php endforeach ?>
				<?php endif ?>
			<?php endforeach ?>
			<input class="input-submit" type="submit" alt="Search" value="Rechercher" />
		</form>
</div>