<?php


// articles shortcode
function articles_shortcode( $atts ) {
	$a = shortcode_atts( array(
		'style' => "card",
		'tags' => '',
		'cats' => '',
		'category__not_in' => '',
		'post_type' => 'post',
		'posts_per_page' => 4
	), $atts );

	$args = array(
		'posts_per_page' => $a['posts_per_page']
	);

	if ( !empty( $a['tags'] ) ) {
		$args['tag'] = $a['tags'];
	}

	if ( !empty( $a['cats'] ) ) {
		$args['cat'] = $a['cats'];
	}

	if ( !empty( $a['category__not_in'] ) ) {
		$args['category__not_in'] = explode( ',', $a['category__not_in'] );
	}

    $query = new WP_Query( $args );

    // Check that we have query results.
    if ( $query->have_posts() ) {

        $return = '<div class="articles ' . $a['style'] . '">';

        // Start looping over the query results.
        while ( $query->have_posts() ) {
            $query->the_post();
            $color = get_field( 'theme' );
            $categories = get_the_category();
            $cat = $categories[0];
            $return .= '<div class="entry ' . $color . '">';
            $return .= '<div class="entry-thumbnail">';
            $return .= '<a href="' . get_the_permalink() . '">';
            $return .= get_the_post_thumbnail();
            $return .= '</a>';
            $return .= '</div>';
            $return .= '<div class="entry-inner">';
            $return .= '<a href="' . get_the_permalink() . '"><h4>' . get_the_title() . '</h4></a>';
            // $return .= '<p class="post-date">' . get_the_date() . '</p>';
            $return .= wpautop( get_the_excerpt() );
            // $return .= '<p><a href="' . get_the_permalink() . '" class="btn ' . $color . '">Read More</a></p>';
            $return .= '</div>';
            $return .= '</div>';
        }

        $return .= '</div>';

    } else {
        return '';
    }
    
	  
	// Restore original post data.
	wp_reset_postdata();
	  

	return $return;
}
add_shortcode( 'articles', 'articles_shortcode' );

