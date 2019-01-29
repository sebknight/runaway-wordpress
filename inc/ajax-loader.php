<?php 
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
?>