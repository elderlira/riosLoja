<?php
$wp_customize->add_section(
   'topbar_options' ,
    array(
        'title' => __( 'Topbar Options', 'kiddies' ),
        'panel' => 'kiddies_option_panel',
    )
);

/*Enable Top Bar*/
$wp_customize->add_setting(
    'kiddies_options[enable_top_bar]',
    array(
        'default'           => $default_options['enable_top_bar'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_top_bar]',
    array(
        'label'    => __( 'Enable Top Bar', 'kiddies' ),
        'section'  => 'topbar_options',
        'type'     => 'checkbox',
    )
);

/*Hide Top Bar on Mobile*/
$wp_customize->add_setting(
    'kiddies_options[hide_topbar_on_mobile]',
    array(
        'default'           => $default_options['hide_topbar_on_mobile'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[hide_topbar_on_mobile]',
    array(
        'label'    => __( 'Hide Top Bar on Mobile', 'kiddies' ),
        'section'  => 'topbar_options',
        'type'     => 'checkbox',
        'active_callback'  => 'kiddies_is_top_bar_enabled'
    )
);

/*Enable Today's Date*/
$wp_customize->add_setting(
    'kiddies_options[enable_topbar_time]',
    array(
        'default'           => $default_options['enable_topbar_time'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_topbar_time]',
    array(
        'label'    => __( 'Enable Current Time', 'kiddies' ),
        'section'  => 'topbar_options',
        'type'     => 'checkbox',
        'active_callback'  => 'kiddies_is_top_bar_enabled'
    )
);

/*Enable Today's Date*/
$wp_customize->add_setting(
    'kiddies_options[enable_topbar_date]',
    array(
        'default'           => $default_options['enable_topbar_date'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_topbar_date]',
    array(
        'label'    => __( 'Enable Today\'s Date', 'kiddies' ),
        'section'  => 'topbar_options',
        'type'     => 'checkbox',
        'active_callback'  => 'kiddies_is_top_bar_enabled'
    )
);

/*Todays Date Format*/
$wp_customize->add_setting(
    'kiddies_options[todays_date_format]',
    array(
        'default'           => $default_options['todays_date_format'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'kiddies_options[todays_date_format]',
    array(
        'label'    => __( 'Today\'s Date Format', 'kiddies' ),
        'description' => sprintf( wp_kses( __( '<a href="%s" target="_blank">Date and Time Formatting Documentation</a>.', 'kiddies' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://wordpress.org/support/article/formatting-date-and-time' ) ),
        'section'  => 'topbar_options',
        'type'     => 'text',
        'active_callback'  =>  function( $control ) {
            return (
                kiddies_is_top_bar_enabled( $control )
                &&
                kiddies_is_todays_date_enabled( $control )
            );
        }
    )
);

/*Enable Top Social Nav*/
$wp_customize->add_setting(
    'kiddies_options[enable_topbar_social_icons]',
    array(
        'default'           => $default_options['enable_topbar_social_icons'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_topbar_social_icons]',
    array(
        'label'    => __( 'Enable Top Bar Social Nav Menu', 'kiddies' ),
        'description' => sprintf( __( 'You can add/edit social nav menu from <a href="%s">here</a>.', 'kiddies' ), "javascript:wp.customize.control( 'nav_menu_locations[social-menu]' ).focus();" ),
        'section'  => 'topbar_options',
        'type'     => 'checkbox',
        'active_callback'  => 'kiddies_is_top_bar_enabled'
    )
);

/*Enable Top Nav*/
$wp_customize->add_setting(
    'kiddies_options[enable_topbar_nav]',
    array(
        'default'           => $default_options['enable_topbar_nav'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_topbar_nav]',
    array(
        'label'    => __( 'Enable Top Bar Nav Menu', 'kiddies' ),
        'description' => sprintf( __( 'You can add/edit top nav menu from <a href="%s">here</a>.', 'kiddies' ), "javascript:wp.customize.control( 'nav_menu_locations[top-menu]' ).focus();" ),
        'section'  => 'topbar_options',
        'type'     => 'checkbox',
        'active_callback'  => 'kiddies_is_top_bar_enabled'
    )
);

/*Top Bar background Color*/
$wp_customize->add_setting(
    'kiddies_options[top_bar_bg_color]',
    array(
        'default' => $default_options['top_bar_bg_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'kiddies_options[top_bar_bg_color]',
        array(
            'label' => __('Top Bar Background Color', 'kiddies'),
            'section' => 'topbar_options',
            'type' => 'color',
            'active_callback'  => 'kiddies_is_top_bar_enabled'
        )
    )
);



/* ========== Progressbar Section. ==========*/
$wp_customize->add_section(
    'progressbar_options',
    array(
        'title' => __( 'Progressbar Options', 'kiddies' ),
        'panel' => 'kiddies_option_panel',
    )
);
/*Show progressbar*/
$wp_customize->add_setting(
    'kiddies_options[show_progressbar]',
    array(
        'default'           => $default_options['show_progressbar'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[show_progressbar]',
    array(
        'label'   => __( 'Show Progressbar', 'kiddies' ),
        'section' => 'progressbar_options',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'kiddies_options[progressbar_position]',
    array(
        'default'           => $default_options['progressbar_position'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[progressbar_position]',
    array(
        'label'           => __( 'Progressbar Position', 'kiddies' ),
        'section'         => 'progressbar_options',
        'type'            => 'select',
        'choices'         => array(
            'top'    => __( 'Top', 'kiddies' ),
            'bottom' => __( 'Bottom of the browser window', 'kiddies' ),
        ),
        'active_callback' => 'kiddies_is_progressbar_enabled',
    )
);

$wp_customize->add_setting(
    'kiddies_options[progressbar_color]',
    array(
        'default'           => $default_options['progressbar_color'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);
$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'kiddies_options[progressbar_color]',
        array(
            'label'           => __( 'Progressbar Color', 'kiddies' ),
            'section'         => 'progressbar_options',
            'type'            => 'color',
            'active_callback' => 'kiddies_is_progressbar_enabled',
        )
    )
);