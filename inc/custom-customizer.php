<?php 
// FRONT PAGE:
// Text on front page
// Buttons on front page (bottom nav)
// Front page image
// Front page card (logo, buttons, title)
// Front page colour controls

// REST OF SITE:
// Nav colors - might avoid w/ transparent nav
// Text color
// Background color

function runaway_customizer( $wp_customize ){

    ##########################
    # HEADER CUSTOMIZATIONS #
    #########################

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

    # Header link colours

    $wp_customize->add_setting('header_link_colour_setting', array(
        'default' => '#ffffff',
        'transport' => 'refresh'
    ));

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

    ##########################
    # FOOTER CUSTOMIZATIONS #
    #########################

    $wp_customize->add_section('runaway_footer_info', array(
        'title' => __('Footer Styles', 'runawaytheme'),
        'priority' => 400,
        'theme_supports' => '',
    ));

    # Footer background colour 

    $wp_customize->add_setting('footer_background_colour_setting', array(
        'default' => '#ffffff',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_background_colour_control',
            array(
                'label' => __('Footer Background Color', 'runawaytheme'),
                'section' => 'runaway_footer_info',
                'settings' => 'footer_background_colour_setting'
            )
        )
    );

    # Footer text colours

    $wp_customize->add_setting('footer_text_colour_setting', array(
        'default' => '#000000',
        'transport' => 'refresh'
    ));

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'footer_text_colour_control',
            array(
                'label' => __('Footer Text Color', 'runawaytheme'),
                'section' => 'runaway_footer_info',
                'settings' => 'footer_text_colour_setting'
            )
        )
    );

    # Footer text

    $wp_customize->add_section( 'custom_footer_text', array(
    'title' => __('Change footer text', 'runawaytheme'),
    'panel' => 'runaway_footer_info',
    'priority' => 10
    ) );

    $wp_customize->add_setting( 'footer_text_block', array(
        'default'=>__('Default footer text', 'runawaytheme'),
        'sanitize_callback'=>'sanitize_text'
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
            'custom_footer_text',
                array(
                    'label' => __('Footer text', 'runawaytheme'),
                    'section' => 'runaway_footer_info',
                    'settings'=> 'footer_text_block',
                    'type' => 'text'
                )
        )
    );    

    #############################
    # TEXT BLOCK CUSTOMIZATIONS #
    #############################

    $wp_customize->add_panel( 'text_blocks', array(
        'priority' => 500,
        'theme_supports' => '',
        'title' => __('Text Blocks', 'runawaytheme'),
        'description' => __('Set editable text content', 'runawaytheme'),
    ) );

    # About text

    $wp_customize->add_section( 'custom_about_text', array(
        'title' => __('Change home page about text', 'runawaytheme'),
        'panel' => 'text_blocks',
        'priority' => 10
    ) );

    $wp_customize->add_setting( 'about_text_block', array(
        'default'=>__('Default about text', 'runawaytheme'),
        'sanitize_callback'=>'sanitize_text'
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
            'custom_about_text',
                array(
                    'label' => __('About text', 'runawaytheme'),
                    'section' => 'custom_about_text',
                    'settings'=> 'about_text_block',
                    'type' => 'text'
                )
        )
    );

    # Hero text

    $wp_customize->add_section( 'custom_hero_text', array(
    'title' => __('Change home page hero text', 'runawaytheme'),
    'panel' => 'text_blocks',
    'priority' => 20
) );

    $wp_customize->add_setting( 'hero_text_block', array(
        'default'=>__('Default hero text', 'runawaytheme'),
        'sanitize_callback'=>'sanitize_text'
    ) );
    
    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
            'custom_hero_text',
                array(
                    'label' => __('Hero text', 'runawaytheme'),
                    'section' => 'custom_hero_text',
                    'settings'=> 'hero_text_block',
                    'type' => 'text'
                )
        )
    );


    function sanitize_text( $text ){
        return sanitize_text_field( $text );
    }
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

        footer {
            background-color: <?php echo get_theme_mod('footer_background_colour_setting', '#ffffff'); ?> !important;
            color: <?php echo get_theme_mod('footer_text_colour_setting', '#000000'); ?> !important;
        }
    </style>
<?php  
}
add_action('wp_head', 'runaway_customizer_styles');
?>

