<div id="hero-cta" class="cta">
    <nav class="navbar" role="navigation">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'sidebar',
            'depth' => 2,
            'container' => false,
            // 'items_wrap'     => '<div class="service">%3$s</div>',
            'menu_class' => 'navbar-menu',
            'menu_id' => 'sidebar-menu',
            'after' => "</div>",
            'walker' => new Bulmascores_Nav_Walker()
        ));
        ?>
    </nav>
</div>