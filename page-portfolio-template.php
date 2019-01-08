<?php 
/*
    Template Name: Portfolio 
 */
get_header(); ?>
    <?php 

    $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => 3);
    $loop = new WP_Query( $args );

    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post(); ?>

        <?php get_template_part('content', 'archive'); ?>
        <small><?php the_category(' ') ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>

        <?php the_content(); ?>

<?php endwhile;
    endif;

            ?>
</div>
<!-- Column ENDS -->
<?php get_sidebar(); ?>   
<?php get_footer(); ?>