<?php get_header(); 
/*
    Template Name: Demo Page
*/ ?>
        <?php 

        $args_cat = array(
            //category IDs
            'include' => '32, 33'
        );
        
        $categories = get_categories($args_cat);
        foreach($categories as $category):
            //accesses WP Query loop and creates new instance - we are not touching the original one, just editing our own - it can access everything
            //filtering posts
            $args = array(
                'type' => 'post',
                'posts_per_page' => 1,
                //calling one post for each category
                'category__in' => $category->term_id,
            );

            $lastPost = new WP_Query($args);

            if ($lastPost->have_posts()) :
                while ($lastPost->have_posts()) : $lastPost->the_post(); ?>

                        <!-- use to determine content based on post format, does not have to be 'content' but that is probably a WP preset -->
                        <?php get_template_part('content', 'portfolio'); ?>


                <?php endwhile;
            endif;

                    //Always use when creating new WP_Query - safeguards/resets, preventing from affecting other query posts
                wp_reset_postdata();

        endforeach;



        ?>

    <?php 
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>

                <!-- use to determine content based on post format, does not have to be 'content' but that is probably a WP preset -->
                <?php get_template_part('content', get_post_format()); ?>


            <?php endwhile;
            endif;
            //Print next 2 posts, not the latest one 
            //Offset variable here skips the latest post
            // $lastPost = new WP_Query('type=post&posts_per_page=2&offset=1');

            //Instead of using the above string, you can create an array of arguments to print in WP_Query, useful for long/complex queries, easy to read and understand
   /*         $args = array(
                'type' => 'post',
                'posts_per_page' => 2,
                'offset' => 1
            );

            $lastPost = new WP_Query($args);

            if ($lastPost->have_posts()) :
                while ($lastPost->have_posts()) : $lastPost->the_post(); ?>

                    <!-- use to determine content based on post format, does not have to be 'content' but that is probably a WP preset -->
                    <?php get_template_part('content', get_post_format()); ?>


                <?php endwhile;
                endif;

                //Always use when creating new WP_Query - safeguards/resets, preventing from affecting other query posts
                wp_reset_postdata(); */

            ?>

            <hr>

            <?php 
            //Print only info posts
            //If no WP_Query settings around post numbers shown, uses default in reading settings
            //-1 means there's no limit to posts shown
            //You can use cat=$ID or category_name=$slug (but only the latter if you're sure post category/slug won't ever change)
            $lastPost = new WP_Query('type=post&posts_per_page=-1&cat=10');

            if ($lastPost->have_posts()) :
                while ($lastPost->have_posts()) : $lastPost->the_post(); ?>

                    <!-- use to determine content based on post format, does not have to be 'content' but that is probably a WP preset -->
                    <?php get_template_part('content', get_post_format()); ?>


                <?php endwhile;
                endif;

                //Always use when creating new WP_Query - safeguards/resets, preventing from affecting other query posts
                wp_reset_postdata();
            ?>

</div>
<!-- Column ENDS -->
<?php get_sidebar(); ?>   
<?php get_footer(); ?>