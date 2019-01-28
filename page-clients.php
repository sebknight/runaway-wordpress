<?php 
    /* Template Name: Clients Page */
    
    get_header(); ?>

    <?php if( have_posts() ): 
        while( have_posts() ): the_post(); ?>
            <div class="column">
                <div class="level">
                    <div class="level-item">
                        <h1><?php the_title(); ?></h1>              
                    </div>
                </div>
                <div class="level Client-container">
                    <?php 
                        $args = array(
                            'post_type' => 'clients',
                            'order' => 'ASC',
                            'orderby' => 'title',
                            'posts_per_page' => 3
                        );
                        $allClientPosts = new WP_Query($args)
                    ?>
                    <?php if( $allClientPosts->have_posts() ):
                        while( $allClientPosts->have_posts() ): $allClientPosts->the_post(); ?>
                        <div class="post">
                        <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>

                </div>
                <div class="level">
                    <a href="#" class="button">SEE MORE</a>
                </div>

                <?php endif; ?>

            </div> 

        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>