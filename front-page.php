<?php 
    /*
    Template Name: Home Page
    */

get_header('front'); ?>

<section class="hero is-fullheight" style="background-image:url(<?php header_image();?>)">
  <div class="hero-head"></div>
  <div class="hero-body">
      <?php if( get_theme_mod( 'hero_card_image' )) : ?>
      <div class="card hero-card">
          <div class="card-image">
            <img class="hero-card-image" src="<?php echo get_theme_mod( 'hero_card_image' )?>">
          </div>
        <?php endif; ?>

        <?php if( get_theme_mod( 'hero_text_block' ) !="") : ?>
          <div class="hero-card-content">
            <h3><?php echo get_theme_mod( 'hero_text_block' ); ?></h3>
            <br>
            <?php wp_nav_menu( array('theme_location' => 'hero') ); ?>
          </div>
        <?php endif; ?>
    </div>
  </div>
  <div class="hero-foot"></div>
</section>

<section class="section about-section">
      <?php if( get_theme_mod( 'about_heading' )) : ?>
        <div class="level">
          <div class="level-item">
            <h2><?php echo get_theme_mod( 'about_heading' )?></h2>
          </div>
        </div>
      <?php endif; ?>
      
      <?php if( get_theme_mod( 'about_image' )) : ?>
        <div class="level">
          <div class="level-item">
            <img class="about-image" src="<?php echo get_theme_mod( 'about_image' )?>">
          </div>
        </div>
      <?php endif; ?>

        <?php if( get_theme_mod( 'about_text_block' ) !="") : ?>
          <div class="level">
            <div class="level-item about-content">
              <?php echo get_theme_mod( 'about_text_block' ); ?>
            </div>
          </div>
        <?php endif; ?>
</section>

<?php get_footer('front'); ?>


