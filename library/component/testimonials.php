<?php

if ( have_rows( 'quote' ) ) :
    ?>
<div class="testimonials">
    <div class="testimonials-inner">
        <?php  
        while ( have_rows( 'quote' ) ) : the_row();
            $content = get_sub_field( 'content' );
            $attribution_name = get_sub_field( 'attribution-name' );
            $attribution_title = get_sub_field( 'attribution-title' );
            $photo = get_sub_field( 'photo' );
            ?>
        <div class="quote<?php print ( get_row_index() == 1 ? ' visible' : '' ); ?>">
            <?php if ( !empty( $photo ) ) : ?><div class="quote-image"><img src="<?php print $photo ?>"></div><?php endif; ?>
            <div class="quote-content">
                <p><?php print $content ?></p>
                <div class="attribution">
                    <p><?php print $attribution_name; ?></p>
                    <?php print ( !empty( $attribution_title ) ? "<p>" . $attribution_title . "</p>" : '' ) ?>
                </div>
            </div> 
            <div class="quote-mark"></div>
        </div>
            <?php
        endwhile;
        ?>
    </div>
</div>
    <?php
endif;

