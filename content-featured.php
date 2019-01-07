<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( has_post_thumbnail() ): ?>
    <div class="thumbnail-img">
        <?php the_post_thumbnail('thumbnail', $attr) ?>
    </div>
    <?php endif; ?>
    <?php the_title( sprintf('<h2 class="title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h2>' ); ?>

</article>

