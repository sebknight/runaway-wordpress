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
                <div class="client-container">
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
                        <div class="level client-level">
                            <div class="post client-post">
                                <h2><?php the_title(); ?></h2>
                                <br>
                                <p><?php the_content(); ?></p>
                            </div>
                            <?php if( has_post_thumbnail() ): ?>
                                <div class="level-item client-logo"><?php the_post_thumbnail('thumbnail'); ?></div>
                            <?php endif; ?>
                            
                        </div>
                        <hr>
                    <?php endwhile; ?>

                </div>


                <?php endif; ?>

            </div> 

        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>