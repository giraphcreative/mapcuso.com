<?php

$title = get_sub_field( 'title' );
$color = get_sub_field( 'color' );

if ( !empty( $title ) ) {
    ?>
    <div class="section-title <?php print $color ?>">
        <h2><?php print str_replace( '[[', '<span>', str_replace( ']]', '</span>', $title ) ); ?></h2>
    </div>
    <?php
}

