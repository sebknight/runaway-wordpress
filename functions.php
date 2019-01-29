<?php

# Include scripts and styles

function runaway_custom_frontend() {
    # CSS
    wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), '8.0.1', 'all');
    wp_enqueue_style('bulma', get_template_directory_uri() . '/assets/css/bulma.min.css', array(), '0.7.2', 'all');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', array(), '0.0.1', 'all');
    # JS
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery-3.3.1.min.js', array(), '3.3.1', true);
    wp_enqueue_script('ajax', get_template_directory_uri() . '/assets/js/ajax.js', array(), '0.0.1', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), '0.0.1', true);
    wp_enqueue_script('responsive-video', get_template_directory_uri() . '/assets/js/responsive-video.js', array(), '0.0.1', true);
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
// $customBackgroundrgs = array(
// 	'default-color'          => '',
// 	'default-image'          => get_template_directory_uri() . '/assets/images/default.jpg',,
// 	'default-repeat'         => 'repeat',
// 	'default-position-x'     => 'left',
//     'default-position-y'     => 'top',
//     'default-size'           => 'auto',
// 	'default-attachment'     => 'scroll',
// 	'wp-head-callback'       => '_custom_background_cb',
// 	'admin-head-callback'    => '',
// 	'admin-preview-callback' => ''
// );

add_theme_support('custom-background');

# Allow post thumbbails (featured images)
add_theme_support('post-thumbnails');

# Enable post types
add_theme_support('post-formats', array('aside', 'image', 'video'));

# Allow custom logo
add_theme_support('custom-logo', array(
    'height' => 100,
    'width' => 300,
    'flex-width' => true,
    'flex-height' => true
));

# Allow custom header image
register_default_headers(array(
    'defaultImage' => array(
        'url' => get_template_directory_uri() . '/assets/images/default.jpg',
        'thumbnail_url' => get_template_directory_uri() . '/assets/images/default.jpg',
        'description' => __('defaultImage', 'runawaytheme')
    )
    ) );

$defaultImage = array(
    'default-image' => get_template_directory_uri() . '/assets/images/default.jpg',
    'width' => 1920,
    'height' => 1080,
    'header-text' => false
);

add_theme_support('custom-header', $defaultImage);

# Setting up sidebar

function runaway_sidebar_setup() {
    # Class refers to the backend - WP prepends to the frontend class
    # Widget and title connected to ID and class, changes/wraps markup
    register_sidebar(
        array(
            'name' => 'Portfolio sidebar',
            'id' => 'portfolio-sidebar',
            'class' => '',
            'description' => 'Sidebar for information about your portfolio',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => "</div>\n",
            'before_title' => '<h2 class="widget-title widget-dropdown-title">',
            'after_title' => "</h2>\n",
        )
    );
}
add_action('widgets_init', 'runaway_sidebar_setup');

# Head function 

function runaway_remove_version() {
    return '';
}

add_filter('the_generator', 'runaway_remove_version');

# Including addon files

require_once get_template_directory() . '/inc/navwalker.php';

require get_parent_theme_file_path('/inc/custom-post-types.php');

require get_parent_theme_file_path('./inc/custom-customizer.php');


# Load more posts

add_action('rest_api_init', 'runaway_api_get_posts');

function runaway_api_get_posts(){
    register_rest_route( 'portfolio', '/all-posts', array(
        'methods' => 'GET',
        'callback' => 'runaway_api_get_posts_callback'
    ));    
}

function runaway_api_get_posts_callback($request){
    $posts_data = array();
    $paged = $request->get_param('page');
    $paged = (isset($paged) || !(empty($paged))) ? $paged : 1;
    $posts = get_posts( array(
        'post_type'       => 'portfolio',
        'status'          => 'published',
        'posts_per_page'  => 3,
        'orderby'         => 'post_date',
        'order'           => 'DESC',
        'paged'           => $paged
    ));

    foreach($posts as $post){
    $id = $post->ID;
    $post_thumbnail = (has_post_thumbnail($id)) ? get_the_post_thumbnail_url($id) : null;

    $posts_data[] = (object)array(
        'id' => $id,
        'slug' => $post->post_name,
        'type' => $post->post_type,
        'title' => $post->post_title,
        );
    }
    return $posts_data;
}

#  Remove rich editing in the contact form
add_filter( 'user_can_richedit' , '__return_false', 50 );