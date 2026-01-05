<?php

if ( have_rows( 'product' ) ) : ?>
<div class="products-container">
    <div class="products">
        <?php while ( have_rows( 'product' ) ) : the_row(); ?>
        <div class="product">
            <div class="product-logo"><img src="<?php the_sub_field( 'logo' ); ?>" /></div>
            <div class="product-description"><?php the_sub_field( 'content' ); ?></div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php
endif;

