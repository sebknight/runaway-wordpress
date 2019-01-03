<?php get_header(); 
    // you can do this but it's convoluted
    // if ( is_front_page() ){
    //     //custom queries
    // } else {
?>
    <!-- Standard post loop -->
    <?php 
        if( have_posts() ):
            while( have_posts() ): the_post();?>

                <!-- use to determine content based on post format, does not have to be 'content' but that is probably a WP preset -->
                <?php get_template_part('content', get_post_format()); ?>


            <?php endwhile;
        endif;

    ?>
</div>
<!-- Column ENDS -->
<?php get_sidebar(); ?>   
<?php get_footer(); ?>