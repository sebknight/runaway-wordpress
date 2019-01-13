<?php 
    /* Template Name: Portfolio
    Template Post Type : page */
    
    get_header(); ?>

    <div class="column is-one-quarter sidebar">
        <?php dynamic_sidebar('portfolio-sidebar'); ?> 
    </div>


    <?php
    $args = array(
        'post_type' => 'portfolio',
        'taxonomy' => 'work',
        'terms' => 'film_and_video',
        'posts_per_page' => 3);
    $loop = new WP_Query($args);
 ?>
    
    <div class="column">
        <div class="container">
                <h2><?php the_title(); ?></h2>
                <h3><?php $post_tags = get_the_terms($args);
                    if ($post_tags) {
                        echo $post_tags[0]->name;
                    } ?></h3>
            <div class="level">

            <?php 
                if ($loop->have_posts()) :
                    while ($loop->have_posts()) : $loop->the_post();

                // get_template_part('content', 'archive');

                the_content();

                endwhile;
                endif; ?>

                <?php wp_reset_postdata(); ?>
            </div>
                <?php $args = array(
                    'post_type' => 'portfolio',
                    'terms' => 'animation_and_vfx',
                    'posts_per_page' => 3
                );
                $loop = new WP_Query($args); ?>

            <div class="level">
            <?php 
            if ($loop->have_posts()) :
                while ($loop->have_posts()) : $loop->the_post();

                // get_template_part('content', 'archive');

            the_content();

            endwhile;
            endif; ?>

                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>