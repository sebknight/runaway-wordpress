<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo('description') ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php bloginfo('name'); ?><?php wp_title('|'); ?> </title>
    <?php wp_head(); ?>
</head>

<!-- Determine which classes to add -->
<?php

    if( is_front_page() ):
            $runaway_classes = array( 'runaway-home' );
    else:
            $runaway_classes = array ( 'runaway' );
    endif;
?>

<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="">
      <img src="" width="112" height="28">
    </a>

    <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="navbar" class="navbar-menu">
    <div class="navbar-start"></div>
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary',
                'menu' => 'Menu 1',
                'walker' => new Bulmascores_Nav_Walker(),
                'container' => false,
                'items_wrap' => '<div class="navbar-end">%3$s</div>',
            )
        );        ?>
    </nav>


<body <?php body_class($runaway_classes); ?>>
    
    <img src="<?php header_image(); ?>" alt="">

    <section class="section">
        <div class="columns">
