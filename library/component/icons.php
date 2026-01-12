<?php

$background = get_sub_field( 'background' );

// check if the nested repeater field has rows of data
if( have_rows('icons') ):

    print '<div class="icons-container ' . $background . '"><div class="icons">';

    // loop through the rows of data
    while ( have_rows('icons') ) : the_row();

        $icon = get_sub_field('icon');
        $title = get_sub_field('title');
        $content = get_sub_field('content');
        $link = get_sub_field('link');
        echo '<div class="icon">' . ( !empty( $link ) ? '<a href="' . $link . '">' : '' ) .
            '<div class="icon-container"><img src="' . $icon . '" /></div><h4>' . $title . '</h4><p>' . $content . '</p>' .  
            ( !empty( $link ) ? '</a>' : '' ) . '</div>';

    endwhile;

    print '</div></div>';

endif;

