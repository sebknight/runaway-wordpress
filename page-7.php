<!-- This uses the post ID, which is immutable. Will be the same if you change permalink -->

<?php get_header(); ?>
    <div class="container">
    <?php 
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
                    <p><?php the_content(); ?></p>

                    <h2 class="title"><?php the_title(); ?></h2>

            <?php endwhile;
            endif;

            ?>
    </div>
<?php get_footer(); ?>