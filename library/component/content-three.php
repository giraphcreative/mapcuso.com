<?php

// get the title and theme
$style = get_sub_field( 'style' );
$color = get_sub_field( 'color' );
$padding = get_sub_field( 'padding' );

// if it's not empty, lets output it
?>
<div class="content-three-container <?php print $color ?> <?php print $padding ?>">
    <div class="content-three <?php print $style ?>">
        <?php if ( have_rows( 'one_components' ) ) { ?>
            <div class="column one">
                <?php while ( have_rows( 'one_components' ) ) : the_row();
                    // include the specific layout
                    get_template_part( 'library/component/' . get_row_layout() );
                endwhile; ?>
            </div>
        <?php } ?>
        <?php if ( have_rows( 'two_components' ) ) { ?>
            <div class="column two">
                <?php while ( have_rows( 'two_components' ) ) : the_row();
                    // include the specific layout
                    get_template_part( 'library/component/' . get_row_layout() );
                endwhile; ?>
            </div>
        <?php } ?>
        <?php if ( have_rows( 'three_components' ) ) { ?>
            <div class="column three">
                <?php while ( have_rows( 'three_components' ) ) : the_row();
                    // include the specific layout
                    get_template_part( 'library/component/' . get_row_layout() );
                endwhile; ?>
            </div>
        <?php } ?>
    </div>
</div>
<?php

