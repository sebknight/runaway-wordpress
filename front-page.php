<?php 
    /*
    Template Name: Home Page
    */

get_header('front'); ?>

<section class="hero is-fullheight" style="background-image:url(<?php header_image();?>)">
  <div class="hero-head"></div>
  <div class="hero-body">

    <?php 
    if( get_theme_mod( 'hero_text_block' ) !="") : ?>
      <div class="card hero-card">
      <div class="card-content">
        <?php 
            echo get_theme_mod( 'hero_text_block' );
          ?>
      </div>
    </div>
  <?php endif; ?>

  </div>

  <div class="hero-foot"></div>
</section>

<!-- // Make this a featured post instead -->
<!-- <section class="section about">
  <div class="container">
    <figure class="about-image image is-4by3">
      <img src="https://bulma.io/images/placeholders/1280x960.png" alt="Placeholder image">
    </figure>

    <?php if( get_theme_mod( 'about_text_block' ) !="") : ?>
      <div class="content">
        <?php echo get_theme_mod( 'about_text_block' ); ?>
      </div>
    <?php endif; ?>
    
    <div class="level about-buttons">

    </div>
  </div>
</section> -->


<?php get_footer('front'); ?>