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
        <div>
            <?php the_title('<h2 class="title">','</h2>'); ?>
        </div>
        <?php endif; ?>

        <small>
        <?php  echo runaway_get_terms($post->ID, 'work');?>
        
         || <?php echo runaway_get_terms($post->ID, 'client'); ?> <?php 

        if (current_user_can('manage_options')) :
            echo '|| '; edit_post_link(); 
         
        endif;
         ?></small>

            <?php 
         endwhile;
            endif;

            ?>
<?php get_footer(); ?>