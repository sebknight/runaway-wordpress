<?php 
/*
    Template Name: Page No Title
*/
get_header(); ?>
    <div class="container">
    <?php 
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
                    <p><?php the_content(); ?></p>

            <?php endwhile;
            endif;

            ?>
    </div>
<?php get_footer(); ?>