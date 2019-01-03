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

add_action('init', 'runaway_theme_setup');

//This works anywhere in functions.php, does not need to be in an action (bc default feature?)
add_theme_support('custom-background');
add_theme_support('custom-header');
//Set featured image
add_theme_support('post-thumbnails');
//Enable post types
add_theme_support('post-formats', array('aside', 'image', 'video'));