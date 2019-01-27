<?php 
function runaway_customizer( $wp_customize ){
    # Header customization

    $wp_customize->add_section('runaway_header_info', array(
        'title' => __('Header Styles', 'runawaytheme'),
        'priority' => 20
    ));

    $wp_customize->add_setting('header_background_colour_setting', array(
        'default' => '#ffffff',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_background_colour_control',
            array(
                'label' => __('Header Background Color', 'runawaytheme'),
                'section' => 'runaway_header_info',
                'settings' => 'header_background_colour_setting'
            )
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'header_link_colour_control',
            array(
                'label' => __('Header Link Color', 'runawaytheme'),
                'section' => 'runaway_header_info',
                'settings' => 'header_link_colour_setting'
            )
        )
    );
}

add_action('customize_register', 'runaway_customizer');

function runaway_customizer_styles(){
?>
    <style type="text/css">
        /* .header-bg{
            background-color: <?php echo get_theme_mod('header_background_colour_setting') ?> */
        .navbar, .navbar-item {
            background-color: <?php echo get_theme_mod('header_background_colour_setting', '#ffffff'); ?> !important;
            color: <?php echo get_theme_mod('header_link_colour_setting', '#000000'); ?> !important;
        }
    </style>
<?php  
}
add_action('wp_head', 'runaway_customizer_styles');
?>

