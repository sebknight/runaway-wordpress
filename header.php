<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Runaway Theme</title>
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

<body <?php body_class($runaway_classes); ?>>

    <?php wp_nav_menu(array('theme_location' => 'primary')) ?>
    <img src="<?php header_image(); ?>" alt="">
