<div class="thumbnail-img">
    <?php the_post_thumbnail('thumbnail', $attr) ?>
</div>

    <?php the_title(sprintf('<h2 class="title"><a href="%s">', esc_url(get_permalink())), '</a></h2>'); ?>
<p><?php the_content(); ?></p>