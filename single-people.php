<?php
/**
 * The Template for displaying all single posts
 */

get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post();

        $fname = get_field( '_p_person_fname' );
        $lname = get_field( '_p_person_lname' );
        $title = get_field( '_p_person_title' );
        $office = get_field( '_p_person_office' );
        $phone = get_field( '_p_person_phone' );
        $email = get_field( '_p_person_email' );

        ?>
<div class="section-title purple">
    <h2><?php the_title(); ?></h2>
</div>
<div class="content-two-container pad-tall">
    <div class="content-two right">
        <div class="column one">
            <?php the_post_thumbnail( 'full', array( 'class' => 'rounded' ) ); ?>
        </div>
        <div class="column two">
            <?php if ( !empty( $office ) || !empty( $phone ) || !empty( $email ) ) : ?>
            <div class="contact-items">
                <?php if ( !empty( $office ) ) { ?><p class="contact-item"><strong>Office:</strong><br> <?php print $office ?></p><?php } ?>
                <?php if ( !empty( $phone ) ) { ?><p class="contact-item"><strong>Phone:</strong><br> <a href="tel:<?php print preg_replace("/[^0-9]/", "", $phone ) ?>"><?php print $phone ?></a></p><?php } ?>
                <?php if ( !empty( $email ) ) { ?><p class="contact-item"><strong>Email:</strong><br> <a href="mailto:<?php print $email ?>"><?php print $email ?></a></p><?php } ?>
            </div>
            <?php endif; ?>
            <div class="biography">
                <?php the_field( 'bio' ); ?>
            </div>
        </div>
    </div>
</div>
        <?php
        get_components();
    endwhile;
endif;
get_components();

get_footer();

