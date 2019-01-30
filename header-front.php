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

<?php if( has_nav_menu('primary') ): ?>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/wordpress">
                <?php 
                $custom_logo_id = get_theme_mod( 'custom_logo' );
                $custom_logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
                echo '<img src="' . esc_url( $custom_logo_url ) . '" alt="">';
                ?>
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div id="navbar" class="navbar-menu">
            <div class="navbar-start"></div>
            <div class="navbar-end">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu' => 'Menu 1',
                        'walker' => new Bulmascores_Nav_Walker(),
                        'container' => false,
                        'items_wrap' => '<div class="navbar-item">%3$s</div>',
                    )
                ); ?>
            </div>
        </div>
    </nav>
<?php endif; ?>



<body id="page" <?php body_class($runaway_classes); ?>>