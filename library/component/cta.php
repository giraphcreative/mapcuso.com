<?php

$title = get_sub_field( 'title' );
$padding = get_sub_field( 'padding' );
$color = get_sub_field( 'color' );
$content = get_sub_field( 'content' );

if ( $color == 'image' || $color == 'image-box' ) {
    $background = get_sub_field( 'photo' );
}

if ( $color == 'image' ) {
    $text_color = get_sub_field( 'text_color' );
}
?>
<div class="cta-container <?php print $padding . ' ' . $color; print ( $color == 'image' || $color == 'image-box' ? ' background-photo ' . $text_color : '' ) ?>"<?php print ( $color == 'image' || $color == 'image-box' ? ' style="background-image: url(' . $background . ');"' : '' ) ?>>
    <div class="cta">
        <?php 
        print ( !empty( $title ) ? '<h2 class="cta-title">' . $title . '</h2>' : '' );
        
        if ( !empty( $content ) ) print $content;

        get_template_part( 'library/component/cta_buttons');
        ?>
    </div>
</div>