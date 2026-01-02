<?php

// get the photo
$photo = get_sub_field('photo');
$link = get_sub_field('link');


// if it's not empty, lets output it
if ( !empty( $photo ) ) {
	?>
<div class="photo">
	<?php if ( !empty( $link ) ) { ?><a href="<?php print $link; ?>"><?php } ?>
	<img src="<?php print $photo ?>" class='rounded' />
	<?php if ( !empty( $link ) ) { ?></a"><?php } ?>
</div>
	<?php
}

