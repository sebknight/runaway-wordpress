<?php get_header(); ?>

    <section id="primary" class="section">
        <main id="main" class="site-main" role="main">
            <div class="container error-404 not-found">
                <head class="page-header">
                    <h1 class="page-title">
                        Oh no! Page not found.
                    </h1>
                </head>
            <div class="page-content">
                <h3 class="subtitle">There's nothing here.
                    <a href="">Go home</a>
                </h3>
                <?php the_widget('WP_Widget_Recent_Posts'); ?>
                <div class="widget widget_categories">
                    <?php the_widget('WP_Widget_Archive', 'dropdown=1'. "after_title=</h2>$archive_content"); ?>
                </div>
            </div>  
            </div>
        </main>
    </div>

<?php get_footer(); ?>
