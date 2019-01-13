<?php 
    /*
    Template Name: Card
    Template Type: post
    */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( has_post_thumbnail() ): ?>
    <div class="thumbnail-img">
        <?php the_post_thumbnail('thumbnail', $attr) ?>
    </div>
    <?php endif; ?>
    <?php the_title( sprintf('<h2 class="title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h2>' ); ?>

    
    <div class="card card-featured">
    <?php if (has_post_thumbnail()) : ?>
        <div class="card-image">
            <figure class="image is-4by3">
                <?php the_post_thumbnail('thumbnail', $attr) ?>
            </figure>
        </div>
    <?php endif; ?>
    <div class="card-content">
        <div class="content">
            <?php the_title(sprintf('<h2 class="title"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
            <?php the_content(); ?>
        </div>
    </div>
    </div>


</article>
