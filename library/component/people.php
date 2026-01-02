<?php

$people_category = get_sub_field( 'group' );
$padding = get_sub_field( 'padding' );
$sort = get_sub_field( 'sort' );
$style = get_sub_field( 'style' );

// if the people category
if ( !empty( $people_category ) ) :


    // set some query vars
    $vars = array( 
        "posts_per_page" => 200,
        "post_type" => 'people',
        "orderby" => 'meta_value',
        "meta_key" => '_p_person_lname',
        "order" => 'ASC',
        "tax_query" => array(
            array (
                'taxonomy' => 'people_cat',
                'field' => 'id',
                'terms' => $people_category,
            )
        )
    );

    if ( $sort == 'sort' ) {
        $vars['meta_query'] = array(
            'relation' => 'AND', // Or 'OR' depending on your logic
            'meta_sort' => array(
                'key' => 'sort',
                'type' => 'NUMERIC',
            ),
            'meta_lname' => array(
                'key' => '_p_person_lname',
            ),
        );
        $vars['orderby'] = array(
            'meta_sort' => 'ASC', // 'ASC' for ascending, 'DESC' for descending
            'meta_lname' => 'ASC', // 'ASC' for ascending, 'DESC' for descending
        );
    }

    // run the query
    $p = new WP_Query( $vars );
    ?>

<section class="people-container <?php print $padding ?> <?php print $style ?>">
    <?php if ( $search ) : ?>
    <div class="people-search">
        <input type="text" name="people-search-term" id="s" placeholder="Search Name, Academic Department, or Title">
    </div>
    <?php endif; ?>

    <?php if ( $p->have_posts() ) : ?>
    <div class="people-listing">

    <?php while ( $p->have_posts() ) : $p->the_post(); 
        if ( $name_format == 'last-first' ) :
            $person_name = get_field( "_p_person_lname" ) . ', ' . get_field( "_p_person_fname" );
        else:
            $person_name = get_field( "_p_person_fname" ) . ' ' .  get_field( "_p_person_lname" );
        endif;
        $logo = get_field( 'logo' );
        ?>
        <div class="person-entry visible">
            <div class="person-photo">
                <?php 
                print '<img src="' . get_the_post_thumbnail_url( null, 'person' ) . '">'; 
                ?>
            </div>
            <div class="person-info">
                <div class="person-basics">
                    <h4><?php print ( $link ? '<a href="' . get_the_permalink() . '">' : '' ) . $person_name . ( $link ? '</a>' : '' ) ?></h4>
                    <p class="person-title"><?php print get_field( "_p_person_title" ); ?></p>
                    <?php if ( $style == 'boxes' ) : ?><p class="person-company"><?php print get_field( 'company' ); ?></p><?php endif; ?>
                </div>
                <div class="person-bio"><?php print get_field( 'bio' ); ?></div>
                <?php if ( $style == 'boxes' && !empty( $logo ) ) : ?><div class="person-logo"><img src="<?php print $logo ?>" /></div><?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>

    </div>
    
    <?php else: ?>
    <p>No people found in database.</p>
    <?php endif; ?>

</section>

<?php 

// reset the post data
wp_reset_postdata();

endif;
