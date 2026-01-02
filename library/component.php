<?php


// get the components
function get_components() {

    // if we have components for this page
    if( have_rows('components') ):
        
        // loop through the components
        while ( have_rows('components') ) : the_row();

            // include the specific layout
            get_template_part( 'library/component/' . get_row_layout() );

        endwhile;

    endif;

}


// load the section title for outside row loops.
function load_section_title() {
    global $supertitle, $title, $intro;
    $supertitle = get_sub_field( 'supertitle' );
    $title = get_sub_field( 'title' );
    $intro = get_sub_field( 'intro' );
}


// load the section title for outside row loops.
function has_section_title() {
    global $supertitle, $title, $intro;
    if ( !empty( $title ) && !empty( $intro ) ) {
        return true;
    } else {
        return false;
    }
}


// dynamically populate 'nav-menu' select fields with a list of menus
add_filter( 'acf/load_field/name=nav-menu', 'nav_menus_load' );
function nav_menus_load( $field ) {
    $menus = wp_get_nav_menus();
    $field['choices'][0] = '- no menu -';
    if ( ! empty( $menus ) ) {
        foreach ( $menus as $menu ) {
            $field['choices'][ $menu->slug ] = $menu->name;
        }
    }
    return $field;
}


// dynamically populate 'state' select fields with a list of states
add_filter( 'acf/load_field/name=states', 'states_load' );
add_filter( 'acf/load_field/name=_p_alum_state', 'states_load' );
function states_load( $field ) {

    // add the array of states
    $field['choices'] = array(
        'AL'=>'Alabama',
        'AK'=>'Alaska',
        'AZ'=>'Arizona',
        'AR'=>'Arkansas',
        'CA'=>'California',
        'CO'=>'Colorado',
        'CT'=>'Connecticut',
        'DE'=>'Delaware',
        'DC'=>'District of Columbia',
        'FL'=>'Florida',
        'FM'=>'Federated States of Micronesia',
        'GA'=>'Georgia',
        'HI'=>'Hawaii',
        'ID'=>'Idaho',
        'IL'=>'Illinois',
        'IN'=>'Indiana',
        'IA'=>'Iowa',
        'KS'=>'Kansas',
        'KY'=>'Kentucky',
        'LA'=>'Louisiana',
        'ME'=>'Maine',
        'MD'=>'Maryland',
        'MA'=>'Massachusetts',
        'MI'=>'Michigan',
        'MN'=>'Minnesota',
        'MS'=>'Mississippi',
        'MO'=>'Missouri',
        'MT'=>'Montana',
        'NE'=>'Nebraska',
        'NV'=>'Nevada',
        'NH'=>'New Hampshire',
        'NJ'=>'New Jersey',
        'NM'=>'New Mexico',
        'NY'=>'New York',
        'NC'=>'North Carolina',
        'ND'=>'North Dakota',
        'OH'=>'Ohio',
        'OK'=>'Oklahoma',
        'OR'=>'Oregon',
        'PA'=>'Pennsylvania',
        'RI'=>'Rhode Island',
        'SC'=>'South Carolina',
        'SD'=>'South Dakota',
        'TN'=>'Tennessee',
        'TX'=>'Texas',
        'UT'=>'Utah',
        'VT'=>'Vermont',
        'VA'=>'Virginia',
        'WA'=>'Washington',
        'WV'=>'West Virginia',
        'WI'=>'Wisconsin',
        'WY'=>'Wyoming',
        'AE'=>'Armed Forces Africa \ Canada \ Europe \ Middle East',
        'AA'=>'Armed Forces America (Except Canada)',
        'AP'=>'Armed Forces Pacific',
        'UK'=>'United Kingdom'
    );
    return $field;
}


add_filter( 'acf/load_field/name=_p_alum_year', 'years_load' );
function years_load( $field ) {

    // set up an array of years from 1950 to current
    $field['choices'] = array();
    $field['choices'][0] = '- none -';
    $n = 1940;
    while ( $n < ( date( 'Y' ) + 1 ) ) {
        $field['choices'][$n] = $n;
        $n++;
    }
    return $field;
}

