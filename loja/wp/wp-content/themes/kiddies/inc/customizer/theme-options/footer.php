<?php
$widgets_link = admin_url( 'widgets.php' );

/*Add footer theme option*/
$wp_customize->add_section(
    'footer_options' ,
    array(
        'title' => __( 'Footer Options', 'kiddies' ),
        'panel' => 'kiddies_option_panel',
    )
);

/* Footer Background Color*/
$wp_customize->add_setting(
    'kiddies_options[footer_bg_color]',
    array(
        'default' => $default_options['footer_bg_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'kiddies_options[footer_bg_color]',
        array(
            'label' => __('Footer Background Color', 'kiddies'),
            'section' => 'footer_options',
            'type' => 'color',
        )
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'kiddies_options[enable_footer_sticky]',
    array(
        'default'           => $default_options['enable_footer_sticky'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_footer_sticky]',
    array(
        'label'    => __( 'Enable Sticky Footer', 'kiddies' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'kiddies_section_seperator_footer_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control(
        $wp_customize,
        'kiddies_section_seperator_footer_1',
        array(
            'settings' => 'kiddies_section_seperator_footer_1',
            'section' => 'footer_options',
        )
    )
);

/*Option to choose footer column layout*/
$wp_customize->add_setting(
    'kiddies_options[footer_column_layout]',
    array(
        'default'           => $default_options['footer_column_layout'],
        'sanitize_callback' => 'kiddies_sanitize_radio',
    )
);

$wp_customize->add_control(
    new Kiddies_Radio_Image_Control(
        $wp_customize,
        'kiddies_options[footer_column_layout]',
        array(
            'label'       => __( 'Footer Column Layout', 'kiddies' ),
            'description' => sprintf( __( 'Footer widgetareas used will vary based on the footer column layout chosen. Head over to  <a href="%s" target="_blank">widgets</a> to see which footer widgetareas are used if you change the layout.', 'kiddies' ), $widgets_link ),
            'section'     => 'footer_options',
            'choices' => kiddies_get_footer_layouts()
        )
    )
);

$wp_customize->add_setting(
    'kiddies_section_seperator_footer_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control(
        $wp_customize,
        'kiddies_section_seperator_footer_2',
        array(
            'settings' => 'kiddies_section_seperator_footer_2',
            'section' => 'footer_options',
        )
    )
);
/**/


/*Enable copyright*/
$wp_customize->add_setting(
    'kiddies_options[enable_copyright]',
    array(
        'default'           => $default_options['enable_copyright'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_copyright]',
    array(
        'label'    => __( 'Enable Copyright', 'kiddies' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/*Copyright Text.*/
$wp_customize->add_setting(
    'kiddies_options[copyright_text]',
    array(
        'default'           => $default_options['copyright_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'kiddies_options[copyright_text]',
    array(
        'label'    => __( 'Copyright Text', 'kiddies' ),
        'section'  => 'footer_options',
        'type'     => 'text',
    )
);

/*Todays Date Format*/
$wp_customize->add_setting(
    'kiddies_options[copyright_date_format]',
    array(
        'default'           => $default_options['copyright_date_format'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'kiddies_options[copyright_date_format]',
    array(
        'label'    => __( 'Todays Date Format', 'kiddies' ),
        'description' => sprintf( wp_kses( __( '<a href="%s" target="_blank">Date and Time Formatting Documentation</a>.', 'kiddies' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://wordpress.org/support/article/formatting-date-and-time' ) ),
        'section'  => 'footer_options',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'kiddies_section_seperator_footer_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control(
        $wp_customize,
        'kiddies_section_seperator_footer_3',
        array(
            'settings' => 'kiddies_section_seperator_footer_3',
            'section' => 'footer_options',
        )
    )
);
/*Enable Footer Nav*/
$wp_customize->add_setting(
    'kiddies_options[enable_footer_nav]',
    array(
        'default'           => $default_options['enable_footer_nav'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_footer_nav]',
    array(
        'label'    => __( 'Show Footer Nav Menu', 'kiddies' ),
        'description' => sprintf( __( 'You can add/edit footer nav menu from <a href="%s">here</a>.', 'kiddies' ), "javascript:wp.customize.control( 'nav_menu_locations[footer-menu]' ).focus();" ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/*Enable Footer Social Nav*/
$wp_customize->add_setting(
    'kiddies_options[enable_footer_social_nav]',
    array(
        'default'           => $default_options['enable_footer_social_nav'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_footer_social_nav]',
    array(
        'label'    => __( 'Show Social Nav Menu in Footer', 'kiddies' ),
        'description' => sprintf( __( 'You can add/edit social nav menu from <a href="%s">here</a>.', 'kiddies' ), "javascript:wp.customize.control( 'nav_menu_locations[social-menu]' ).focus();" ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

/*Enable scroll to top*/
$wp_customize->add_setting(
    'kiddies_options[enable_scroll_to_top]',
    array(
        'default'           => $default_options['enable_scroll_to_top'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_scroll_to_top]',
    array(
        'label'    => __( 'Show Scroll to top', 'kiddies' ),
        'section'  => 'footer_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'kiddies_section_seperator_footer_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control(
        $wp_customize,
        'kiddies_section_seperator_footer_4',
        array(
            'settings' => 'kiddies_section_seperator_footer_4',
            'section' => 'footer_options',
        )
    )
);

$wp_customize->add_setting(
    'kiddies_premium_notice',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
$wp_customize->add_control(
    new Kiddies_Premium_Notice_Control( 
        $wp_customize,
        'kiddies_premium_notice',
        array(
            'label'      => esc_html__( 'Footer Option', 'kiddies' ),
            'settings' => 'kiddies_premium_notice',
            'section'       => 'footer_options',
        )
    )
);