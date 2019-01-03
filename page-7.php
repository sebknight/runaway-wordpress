<!-- This uses the post ID, which is immutable. Will be the same if you change permalink. Custom page templates need same structure as index to output the content and style correctly -->

<?php get_header(); ?>
    <?php 
    if (have_posts()) :
        while (have_posts()) : the_post(); ?>
                    <p><?php the_content(); ?></p>

                    <h2 class="title"><?php the_title(); ?></h2>
                    <h3 class="subtitle">This page is using page-7.php (this is hard-coded text)</h3>
            <?php endwhile;
            endif;

            ?>
<?php get_footer(); ?>