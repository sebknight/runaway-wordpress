<?php 
    /* Template Name: Portfolio Page */
    
    get_header(); ?>
    
    <?php if ( is_active_sidebar( 'portfolio-sidebar' ) ) : ?>
        <div class="column is-one-quarter sidebar">
            <?php dynamic_sidebar('portfolio-sidebar'); ?> 
        </div>
    <?php endif; ?>

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
                $get_portfolios = new WP_Query(array(
                    'post_type'     => 'portfolio', 
                    'status'        => 'published', 
                    'posts_per_page'=> 3,
                    'orderby'	=> 'post_date',
                    'order'         => 'DESC',
                    'paged'         => $paged
                ));
                    ?>

                    <?php if( $get_portfolios->have_posts() ) :
                        while( $get_portfolios->have_posts() ) : $get_portfolios->the_post(); ?>
                        <div class="post">
                        <?php the_content(); ?>
                        </div>
                    <?php endwhile; ?>
                    </div>

                    <?php if( $get_portfolios->found_posts > 3) : ?>
                        <div class="level">
                            <a class="button" id="post-loader">SEE MORE</a>
                        </div>
                        
                <?php endif; ?>
                <?php endif; ?>
                <?php endwhile; ?>
                <?php endif; ?>

            </div> 

<?php get_footer(); ?>