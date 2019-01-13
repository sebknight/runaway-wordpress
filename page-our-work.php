<?php 
    /* Template Name: Portfolio
    Template Post Type : page */
    
    get_header();
    dynamic_sidebar('sidebar-1');
    
    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => 3);
    $loop = new WP_Query($args); ?>
    <div class="column">
        <div class="container">
            <?php 
            if ($loop->have_posts()) :
                while ($loop->have_posts()) : $loop->the_post();

            get_template_part('content', 'archive');

            the_content();

            endwhile;
            endif; ?>
        
        </div>
    </div>

<?php get_footer(); ?>