<?php

if ( have_rows( 'product' ) ) : ?>
<div class="products-container">
    <div class="products">
        <?php while ( have_rows( 'product' ) ) : the_row(); 
            $link = get_sub_field( 'link' ); ?>
        <div class="product<?php print ( !empty( $link ) ? ' has-link' : '' ) ?>"<?php print ( !empty( $link ) ? ' data-href="' . $link . '"' : '' ) ?>>
            <div class="product-logo"><img src="<?php the_sub_field( 'logo' ); ?>" /></div>
            <div class="product-description"><?php the_sub_field( 'content' ); ?></div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php
endif;

