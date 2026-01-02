<?php

if ( have_rows( 'box' ) ) :
    ?>
    <div class="image-boxes-container"><div class="image-boxes"><?php
    while ( have_rows( 'box' ) ) : the_row();
        $image = get_sub_field( 'image' );
        $link = get_sub_field( 'link' );
        if ( !empty( $image ) ) :
        ?>
        <div class="image-box">
            <?php print ( !empty( $link ) ? '<a href="' . $link . '">' : '' ); ?>
            <img src="<?php print $image ?>" />
            <?php print ( !empty( $link ) ? '</a>' : '' ); ?>
        </div>
        <?php
        endif;
    endwhile;
    ?>
    </div></div>
    <?php
endif;
