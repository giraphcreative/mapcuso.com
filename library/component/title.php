<?php

// get the title and theme
$title = get_sub_field('title');
$color = get_sub_field('color');

// if it's not empty, lets output it
if ( !empty( $title ) ) {
	?>
<div class="title-container <?php print $color ?>">
	<?php if ( $color == 'iris' ) : ?>
	<video autoplay muted loop class="title-video">
		<source src="<?php bloginfo( 'template_url' ); ?>/img/iris-purple.mp4" type="video/mp4">
	</video>
	<?php endif; ?>
	<div class="title">
		<h1><?php print $title ?></h1>
	</div>
</div>
	<?php
}
