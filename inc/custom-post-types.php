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
        'query_var' => true
    );
    register_post_type('services', $args);
}

add_action('init', 'runaway_services_post_type');

?>