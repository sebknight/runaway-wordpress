<?php

# Include scripts and styles

function runaway_custom_frontend() {
    # CSS
    wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '8.0.1', 'all');
    wp_enqueue_style('bulma', get_template_directory_uri() . '/assets/css/bulma.min.css', array(), '0.7.2', 'all');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', array(), '0.0.1', 'all');
    # JS
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), '0.0.1', true);
}

add_action('wp_enqueue_scripts','runaway_custom_frontend');


# Enabling theme support for features
function runaway_theme_setup() {
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary header navigation');
    register_nav_menu('secondary', 'Footer navigation');
    register_nav_menu('portfolio', 'Sidebar to show information about your portfolio');
}

add_action('init', 'runaway_theme_setup');

# Allow custom background
add_theme_support('custom-background');

# Allow custom header
add_theme_support('custom-header');

# Allow post thumbbails (featured images)
add_theme_support('post-thumbnails');

# Enable post types
add_theme_support('post-formats', array('aside', 'image', 'video'));


# Setting up sidebar

function runaway_sidebar_setup() {
    # Class refers to the backend - WP prepends to the frontend class
    # Widget and title connected to ID and class, changes/wraps markup
    register_sidebar(
        array(
            'name' => 'Portfolio sidebar',
            'id' => 'sidebar-1',
            'class' => 'custom',
            'description' => 'Sidebar for information about your portfolio',
            'before_widget' => '<div id="%1$s" class="widget %2$s sidebar column is-one-quarter">',
            'after_widget' => "</div>\n",
            'before_title' => '<h2 class="widget-title">',
            'after_title' => "</h2>\n",
        )
    );
    // register_sidebar(
    //     array(
    //         'name' => 'Sidebar 2',
    //         'id' => 'sidebar-2',
    //         'class' => 'custom',
    //         'description' => 'Secondary sidebar',
    //         'before_widget' => '<li id="%1$s" class="widget %2$s">',
    //         'after_widget' => "</li>\n",
    //         'before_title' => '<h2 class="widget-title">',
    //         'after_title' => "</h2>\n",
    //     )
    // );
    // register_sidebar(
    //     array(
    //         'name' => 'Portfolio Sidebar',
    //         'id' => 'portfolio-sidebar',
    //         'class' => 'portfolio',
    //         'description' => 'Sidebar to display information about your portfolio',
    //         'before_widget' => '<li id="%1$s" class="widget %2$s">',
    //         'after_widget' => "</li>\n",
    //         'before_title' => '<h2 class="widget-title">',
    //         'after_title' => "</h2>\n",
    //     )
    // );
}
add_action('widgets_init', 'runaway_sidebar_setup');

# Head function 

function runaway_remove_version() {
    return '';
}

add_filter('the_generator', 'runaway_remove_version');


# Settings for custom post types 

function runaway_custom_post_type(){
    # Administration panel stuff
    $labels = array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio item',
        'add_new' => 'Add a portfolio item',
        'all_items' => 'All items',
        'add_new_item' => 'Add a portfolio item',
        'edit_item' => 'Edit item',
        'new_item' => 'New item',
        'view_item' => 'View item',
        'search_item' => 'Search portfolio',
        'not_found' => 'No items found',
        'not_found_in_trash' => 'No items found in trash',
        'parent_item_colon' => 'Parent item'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true, # media posts won't need an archive
        'publicly_queryable' => true,
        'query_var' => true,
        'rewrite' => true, # can customise slug
        'capability_type' => 'post', # grabs default settings of other post type
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions' # automatically save revisions in DB
            # there are many other options
        ), # support array ends
        'taxonomies' => array(
            'category',
            'post_tag'
        ),
        'menu-position' => 5,
        'exclude_from_search' => false
    );
    register_post_type('portfolio', $args);

        $labels = array(
            'name' => 'Video background',
            'singular_name' => 'Video background',
            'add_new' => 'Add a video background',
            'all_items' => 'All items',
            'add_new_item' => 'Add a video background',
            'edit_item' => 'Edit video background',
            'new_item' => 'New video background',
            'view_item' => 'View video background',
            // 'search_item' => 'Search portfolio',
            'not_found' => 'No items found',
            'not_found_in_trash' => 'No items found in trash',
            'parent_item_colon' => 'Parent item'
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'has_archive' => false, # media posts won't need an archive
            'publicly_queryable' => true,
            'query_var' => true,
            'rewrite' => true, # can customise slug
            'capability_type' => 'page', # grabs default settings of other post type
            'hierarchical' => false,
            'menu-position' => 6,
            'exclude_from_search' => true
        );
        register_post_type('video_background', $args);


}

add_action('init', 'runaway_custom_post_type');

# add_filter('pre_get_posts', 'my_get_posts');
# function my_get_posts($query)
# {
#     if (is_home() && $query->is_main_query()) $query->set('post_type', array('post', 'portfolio'));
#     return $query;
# }

# Settings for custom taxomonies
function runaway_custom_taxonomies() {

    # Hierarchical taxonomy
    // $labels = array(
    //     'name' => 'Fields', # generic name is always plural
    //     'singular_name' => 'Field',
    //     'search_items' => 'Search Fields',
    //     'all_items' => 'All Fields',
    //     'parent_item' => 'Parent Field',
    //     'parent_item_colon' => 'Parent Field: ',
    //     'edit_item' => 'Edit Field',
    //     'update_item' => 'Update Field',
    //     'add_new_item' => 'Add New Field',
    //     'new_item_name' => 'New Field Name',
    //     'menu_name' => 'Field'
    // );    

    // $args = array(
    //     'hierarchical' => true,
    //     'labels' => $labels,
    //     'show_ui' => true,
    //     'show_admin_column' => true,
    //     'query_var' => true,
    //     'rewrite' => array('slug' => 'field') # custom slug, lowercase singular name
    // );

    // register_taxonomy('field', array('portfolio'), $args);

    # non-hierarchical taxonomy
    register_taxonomy('client', 'portfolio', array(
            'label' => 'Clients',
            'rewrite' => array( 'slug' => 'clients' ),
            'hierarchical' => false
        )
    );

    register_taxonomy('work', 'portfolio', array(
        'label' => 'Work type',
        'rewrite' => array('slug' => 'our-work'),
        'hierarchical' => false
    ));

}

add_action('init', 'runaway_custom_taxonomies');

# Custom term function
function runaway_get_terms( $postID, $term ){
    $terms_list = wp_get_post_terms($postID, $term);
    $output = '';
    $i = 0;
    foreach ($terms_list as $term) {
        $i++;
        if ($i > 1) {
            $output .=', ';
        }
        $output .= '<a href="' . get_term_link( $term ) . '">'. $term->name .  '</a>';
    }
    return $output;
}

# Bulma navwalker
require_once get_template_directory() . '/inc/navwalker.php';
register_nav_menus(array(
    'primary' => __('Primary Menu', 'menuname'),
));

require_once get_template_directory() . '/inc/wordpress-theme-customizer-custom-controls/theme-customizer-demo.php';

// Register and load the widget
