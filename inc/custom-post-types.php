<?php 
# Settings for custom post types 
function runaway_portfolio_post_type(){
    # Administration panel stuff
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


//         $labels = array(
//             'name' => 'Video background',
//             'singular_name' => 'Video background',
//             'add_new' => 'Add a video background',
//             'all_items' => 'All items',
//             'add_new_item' => 'Add a video background',
//             'edit_item' => 'Edit video background',
//             'new_item' => 'New video background',
//             'view_item' => 'View video background',
//             // 'search_item' => 'Search portfolio',
//             'not_found' => 'No items found',
//             'not_found_in_trash' => 'No items found in trash',
//             'parent_item_colon' => 'Parent item'
//         );

//         $args = array(
//             'labels' => $labels,
//             'public' => true,
//             'has_archive' => false, # media posts won't need an archive
//             'publicly_queryable' => true,
//             'query_var' => true,
//             'rewrite' => true, # can customise slug
//             'capability_type' => 'page', # grabs default settings of other post type
//             'hierarchical' => false,
//             'menu-position' => 6,
//             'exclude_from_search' => true
//         );
//         register_post_type('video_background', $args);
// }

?>