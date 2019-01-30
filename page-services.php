<?php 
    /* Template Name: Services Page */
    
    get_header(); ?>

    <?php if( have_posts() ): 
        while( have_posts() ): the_post(); ?>
        <div class="column">
            <div class="level">
                <div class="level-item">
                    <h1><?php the_title(); ?></h1>              
                </div>
            </div>
            <div class="container services-container">                                          
                <?php 
                    $args = array(
                        'post_type' => 'services',
                        'order' => 'ASC',
                        'orderby' => 'title',
                        'posts_per_page' => -1
                    );
                    $allServicesPosts = new WP_Query($args)
                ?>

                <?php 
                if( $allServicesPosts->have_posts() ):
                while( $allServicesPosts->have_posts() ): $allServicesPosts->the_post(); ?>
                    <div class="card card-services">
                        <div class="card-header-title is-centered">
                            <h2><?php the_title(); ?></h2>
                        </div>
                        <div class="card-content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        </div> 
        <?php endwhile; ?>
    <?php endif; ?>
    
<?php get_footer(); ?>