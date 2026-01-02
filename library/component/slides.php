<?php


if ( have_rows('slides') ) :
    
    print '<div class="slides">';

    // loop through the rows of data
    $num = 0;
    while ( have_rows('slides') ) : the_row();

        $background = get_sub_field('background');
        $link = get_sub_field('link');
        ?>
        <div class="slide<?php print ( $num == 0 ? ' visible' : '' ) . ( !empty( $link ) ? ' has-link' : '' ); print ' ' . $color ?>"
            <?php if ( !empty( $link ) ) { ?>data-href="<?php print $link ?>"<?php } ?>>
            <div class="slide-background" style="background-image: url(<?php print $background; ?>);"></div>
            <!--<div class="slide-content">
                <div class="slide-content-inner">
                    <?php // print $content ?>
                </div>
            </div>
            -->
        </div>
        <?php
        $num++;

    endwhile;

    if ( $num > 1 ) print '<div class="slides-nav"><a href="#" class="previous">Previous</a><a href="#" class="next">Next</a></div>';
    print '</div>';

endif;

