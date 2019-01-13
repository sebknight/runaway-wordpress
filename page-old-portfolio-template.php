<?php 
/*
    Template Name: Not the portfolio 
    Template Post Type: page
 */
get_header(); ?>
<?php wp_nav_menu(array('theme_location' => 'portfolio')) ?>

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
<?php get_footer(); ?>