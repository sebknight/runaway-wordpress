<?php 
    /* Template Name: Portfolio Page */
    
    get_header(); ?>

    <?php if( have_posts() ): 
        while( have_posts() ): the_post(); ?>
            <div class="column">
                <div class="level">
                    <div class="level-item">
                        <h1><?php the_title(); ?></h1>              
                    </div>
                </div>
                <div class="level portfolio-container">
            <?php 
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $get_portfolio = new WP_Query(array(
                    'post_type'     => 'portfolio', 
                    'status'        => 'published', 
                    'orderby'	=> 'post_date',
                    'order'         => 'DESC',
                    'paged'         => $paged
                ));
                    ?>

                <?php if( $get_portfolio->have_posts() ) :
                    while( $get_portfolio->have_posts() ) : $get_portfolio->the_post(); ?>
                    <div class="portfolio-post">
                    <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
                </div>

                <?php endif; ?>
            
            </div> 
        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>
