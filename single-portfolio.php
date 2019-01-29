<?php get_header(); ?>
    <?php 
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
                    <p><?php the_content(); ?></p>
    <?php 
        if (has_post_thumbnail()) :
            
    ?>
        <div>
            <?php the_post_thumbnail('thumbnail'); ?>
        </div>
        <?php endif; ?>

        <div>
            <?php the_title('<h2 class="title">','</h2>'); ?>
        </div>
            <?php 
         endwhile;
            endif;

            ?>
<?php get_footer(); ?>