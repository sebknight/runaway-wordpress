<h2 class="title">Image post<?php the_title(); ?></h2>

<div class="thumbnail-img">
    <?php the_post_thumbnail('thumbnail', $attr) ?>
</div>



<p><?php the_content(); ?></p>