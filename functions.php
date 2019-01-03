<?php

function runaway_custom_frontend() {
    //Style
    wp_enqueue_style('bulma', get_template_directory_uri() . '/assets/css/bulma.min.css', array(), '0.7.2', 'all');
    wp_enqueue_style('main', get_template_directory_uri() . '/assets/css/main.css', array(), '0.0.1', 'all');

    //Scripts
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array(), '0.0.1', true);
}

add_action('wp_enqueue_scripts','runaway_custom_frontend');

function runaway_theme_setup() {
    add_theme_support('menus');
    register_nav_menu('primary', 'Primary header navigation');
    register_nav_menu('secondary', 'Footer navigation');
}
//args: when to call, what to call
add_action('init', 'runaway_theme_setup');

//This works anywhere in functions.php, does not need to be in an action (bc default feature?)
add_theme_support('custom-background');
add_theme_support('custom-header');
//Set featured image
add_theme_support('post-thumbnails');
//Enable post types
add_theme_support('post-formats', array('aside', 'image', 'video'));

function runaway_sidebar_setup() {
    //Class refers to the backend - WP prepends to the frontend class
    //Widget and title connected to ID and class, changes/wraps markup
    register_sidebar(
        array(
            'name' => 'Sidebar',
            'id' => 'sidebar-1',
            'class' => 'custom',
            'description' => 'Standard sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => "</aside>\n",
            'before_title' => '<h2 class="widget-title">',
            'after_title' => "</h2>\n",
        )
    );
    register_sidebar(
        array(
            'name' => 'Sidebar 2',
            'id' => 'sidebar-2',
            'class' => 'custom',
            'description' => 'Secondary sidebar',
            'before_widget' => '<li id="%1$s" class="widget %2$s">',
            'after_widget' => "</li>\n",
            'before_title' => '<h2 class="widget-title">',
            'after_title' => "</h2>\n",
        )
    );
}
add_action('widgets_init', 'runaway_sidebar_setup');