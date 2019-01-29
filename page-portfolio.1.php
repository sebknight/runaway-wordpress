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
                    'posts_per_page'=> 3,
                    'orderby'	=> 'post_date',
                    'order'         => 'DESC',
                    'paged'         => $paged
                ));
                    ?>

                <?php if( $get_portfolio->have_posts() ) :
                    while( $get_portfolio->have_posts() ) : $get_portfolio->the_post(); ?>
                    <div class="post">
                    <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
                </div>

                    <?php if( $get_portfolio->found_posts > 3) : ?>
                        <div class="level">
                            <div class="level-right">
                                <a id="post-loader" class="button">More</a>
                            </div>
                        </div>               
                    <?php endif; ?>
                <?php endif; ?>
            
            </div> 
        <?php endwhile; ?>
    <?php endif; ?>


<?php get_footer(); ?>