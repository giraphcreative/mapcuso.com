<?php

// get the title and theme
$title = get_sub_field('title');
$style = get_sub_field('style');

// if it's not empty, lets output it
if ( !empty( $title ) ) {
	?>
<div class="title-container <?php print $style ?>">
	<?php if ( $style == 'basic' ) : ?>
	<div class="title">
		<h1><?php print $title ?></h1>
	</div>
	<?php else : ?>
	<img src="<?php the_sub_field( 'image' ); ?>" alt="<?php print $title ?>" title="<?php print $title ?>" />
	<?php endif; ?>
</div>
	<?php
}
