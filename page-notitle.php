<?php 
/*
    Template Name: Page No Title
*/
get_header(); ?>
    <?php 
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
                    <p><?php the_content(); ?></p>

            <?php endwhile;
            endif;

            ?>
</div>
<!-- Column ENDS -->
<?php get_sidebar(); ?>   
<?php get_footer(); ?>