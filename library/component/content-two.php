<?php

// get the title and theme
$title = get_sub_field( 'title' );
$color = get_sub_field( 'color' );
$valign = get_sub_field( 'valign' );
$style = get_sub_field( 'style' );
$padding = get_sub_field( 'padding' );
$reverse = get_sub_field( 'reverse' );

// if it's not empty, lets output it
?>
<div class="content-two-container <?php print $color ?> <?php print $padding ?>">
    <?php if ( !empty( $title ) ) : ?><h2><?php print $title ?></h2><?php endif; ?>
    <div class="content-two <?php print $valign; ?> <?php print $style ?> <?php print ( $reverse ? 'reverse' : '') ?>">
        <?php if ( have_rows( 'left_components' ) ) { ?>
            <div class="column one">
                <?php while ( have_rows( 'left_components' ) ) : the_row();
                    // include the specific layout
                    get_template_part( 'library/component/' . get_row_layout() );
                endwhile; ?>
            </div>
        <?php } ?>
        <?php if ( have_rows( 'right_components' ) ) { ?>
            <div class="column two">
                <?php while ( have_rows( 'right_components' ) ) : the_row();
                    // include the specific layout
                    get_template_part( 'library/component/' . get_row_layout() );
                endwhile; ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php

