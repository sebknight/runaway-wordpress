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
                <div class="portfolio-container">
                <?php 
                    $args = array(
                        'post_type' => 'portfolio',
                        'order' => 'ASC',
                        'orderby' => 'title',
                        'posts_per_page' => -1
                    );
                    $allPortfolioPosts = new WP_Query($args)
                ?>

                <?php if( $allPortfolioPosts->have_posts() ) :
                    while( $allPortfolioPosts->have_posts() ) : $allPortfolioPosts->the_post(); ?>
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
