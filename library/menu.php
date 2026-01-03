<?php


// a function to display the main menu in the header
function main_menu() {
    
    // get the menu
    $menu = get_field( 'menu', 'option' );

    // loop through the main menu items.
    if ( !empty( $menu ) ) {

        // open the main nav
        print '<ul>';

        // loop through the menu items
        foreach ( $menu as $menu_item ) {

            // show the main menu item
            print '<li' . ( empty( $menu_item['submenu-modules'] ) ? ' class="no-submenu"' : '' ) . '><a href="' . $menu_item['link'] . '">' . $menu_item['label'] . '</a>';

            // if we have components for this page
            if ( !empty( $menu_item['submenu-modules'] ) ):

                // start the submenu
                print '<div class="submenu' . ( count( $menu_item['submenu-modules'] ) > 4 ? ' mega' : '' ) . '">';

                // loop through the components
                foreach ( $menu_item['submenu-modules'] as $submenu_module ):
                    
                    // open the submenu column
                    print '<div class="submenu-col">';

                    // layout switch
                    if ( $submenu_module['acf_fc_layout'] == 'submenu' ):

                        // output the menu column
                        if ( !empty( $submenu_module['title'] ) ) print '<h5>' . $submenu_module['title'] . '</h5>';
                        wp_nav_menu( array( 'menu' => $submenu_module['nav-menu'] ) );
    
                    elseif ( $submenu_module['acf_fc_layout'] == 'content-area' ):

                        // output the content area content
                        if ( !empty( $submenu_module['title'] ) ) print '<h5>' . $submenu_module['title'] . '</h5>';
                        print $submenu_module['content'];

                    endif;
                    
                    // close the submenu column
                    print '</div>';

                endforeach;

                // close the submenu
                print '</div>';

            endif;

            print '</li>';

        }

        // close the main menu
        print '</ul>';

    }
}


// use a filter to add the icon to each menu item if it's set.
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
    
    // loop
    foreach( $items as &$item ) {
        
        // vars
        $icon = get_field('icon', $item);
        
        // append icon
        if( $icon ) {
            
            $item->title = $icon . ' ' . $item->title;
            
        }
        
    }
    
    
    // return
    return $items;
    
}
