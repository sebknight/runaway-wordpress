<div id="portfolio-sidebar" class="sidebar">
    <nav class="navbar" role="navigation" aria-label="sidebar">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'sidebar',
            'depth' => 2,
            'container' => false,
            // 'items_wrap'     => 'div',
            'menu_class' => 'navbar-menu',
            'menu_id' => 'sidebar-menu',
            'after' => "</div>",
            'walker' => new Bulmascores_Nav_Walker()
        ));
        ?>
    </nav>

</div>
