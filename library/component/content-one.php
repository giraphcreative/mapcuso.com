<?php

// get the title and theme
$color = get_sub_field('color');
$style = get_sub_field('style');
$padding = get_sub_field('padding');


// if it's not empty, lets output it
if ( have_rows( 'single_components' ) ) :
	?>
<div class="content-one <?php print $color ?> <?php print $padding ?> <?php print $style ?>">
	<div class="content-one-inner">
		<?php
		while ( have_rows( 'single_components' ) ) : the_row();
			get_template_part( 'library/component/' . get_row_layout() );
		endwhile;
		?>
	</div>
</div>
	<?php
endif;
