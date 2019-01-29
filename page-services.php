<?php 
    /* Template Name: Services Page */
    
    get_header('front'); ?>

    <?php if( have_posts() ): 
        while( have_posts() ): the_post(); ?>

            <div class="level">
                <div class="level-item">
                    <h1><?php the_title(); ?></h1>              
                </div>
            </div>

            <div class="columns">
                <?php 
                    $args = array(
                        'post_type' => 'services',
                        'order' => 'ASC',
                        'orderby' => 'title',
                    );
                    $allServicesPosts = new WP_Query($args)
                ?>

                <?php if( $allServicesPosts->have_posts() ):
                    while( $allServicesPosts->have_posts() ): $allServicesPosts->the_post(); ?>
                        <div class="column">
                                                
                            <div class="card">
                                <?php if ( has_post_thumbnail() ): ?>
                                    <div class="card-image"><?php the_post_thumbnail('thumbnail'); ?></div>
                                <?php endif; ?>
                                <div class="card-header-title is-centered">
                                    <h2><?php the_title(); ?></h2>
                                </div>
                                <div class="card-content">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>

            </div> 
        <?php endwhile; ?>
    <?php endif; ?>
<?php get_footer(); ?>