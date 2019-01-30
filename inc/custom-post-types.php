<?php 
# Settings for custom post types 
function runaway_portfolio_post_type(){
    $labels = array(
        'name' => _x('Portfolio', 'post type name', 'runaway'),
        'singular_name' => _x('Portfolio Item', 'post types singular name', 'runaway'),
        'add_new_item' => _x('Add New Portfolio Item', 'adding new portfolio item', 'runaway')
    );

    $args = array(
        'labels' => $labels,
        'has_archive' => true,
        'description' => 'post type for portfolio items',
        'public' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-format-video',
        'query_var' => true
    );    register_post_type('portfolio', $args);

}

add_action('init', 'runaway_portfolio_post_type');

function runaway_client_post_type(){
    $labels = array(
        'name' => _x('Clients', 'post type name', 'runaway'),
        'singular_name' => _x('Clients', 'post types singular name', 'runaway'),
        'add_new_item' => _x('Add New Client', 'adding new client', 'runaway')
    );

    $args = array(
        'labels' => $labels,
        'description' => 'post type for clients',
        'public' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-admin-users',
        'query_var' => true,
        'supports' =>  array( 'title', 'editor', 'thumbnail' )
    );    register_post_type('clients', $args);

}

add_action('init', 'runaway_client_post_type');


function runaway_services_post_type(){
    $labels = array(
        'name' => _x('Services', 'post type name', 'runaway'),
        'singular_name' => _x('Service', 'post types singular name', 'runaway'),
        'add_new_item' => _x('Add New Service', 'adding new portfolio item', 'runaway')
    );

    $args = array(
        'labels' => $labels,
        'description' => 'post type for services',
        'public' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-hammer',
        'query_var' => true,
        'supports' => array( 'title', 'editor'  )
    );
    register_post_type('services', $args);
}

add_action('init', 'runaway_services_post_type');

function runaway_enquiries_post_type(){
    $labels = array(
        'name' => _x('Enquiries', 'post type name', 'runaway'),
        'singular_name' => _x('Enquiry', 'post types singular name', 'runaway'),
        'add_new_item' => _x('Add New Enquiry', 'adding new enquiry', 'runaway')
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Enquiries that come through our website',
        'public' => false,
        'hierarchical' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-megaphone',
        'supports' => array(
            'title',
            'editor'
        ),
        'query_var' => true
    );
    register_post_type('enquiries', $args);
}
add_action('init', 'runaway_enquiries_post_type');
?>


