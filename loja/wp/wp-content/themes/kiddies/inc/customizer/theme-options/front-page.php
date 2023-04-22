<?php
$wp_customize->add_section(
    'home_page_layout_options',
    array(
        'title'      => __( 'Front Page Sidebar Options', 'kiddies' ),
        'panel'      => 'kiddies_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'kiddies_options[front_page_layout]',
    array(
        'default'           => $default_options['front_page_layout'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    new Kiddies_Radio_Image_Control(
        $wp_customize,
        'kiddies_options[front_page_layout]',
        array(
            'label'	=> __( 'Front Page Sidebar Layout', 'kiddies' ),
            'section' => 'home_page_layout_options',
            'choices' => kiddies_get_general_layouts(),
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'kiddies_options[hide_front_page_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_front_page_sidebar_mobile'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[hide_front_page_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Front Page Sidebar on Mobile', 'kiddies' ),
        'section'     => 'home_page_layout_options',
        'type'        => 'checkbox',
    )
);

// Different Sidebar for front page
$wp_customize->add_setting(
    'kiddies_options[front_page_enable_sidebar]',
    array(
        'default'           => $default_options['front_page_enable_sidebar'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[front_page_enable_sidebar]',
    array(
        'label'       => __( 'Different Sidebar for Front Page', 'kiddies' ),
        'section'     => 'home_page_layout_options',
        'description' => __( 'Widgets on this sidebar widget will reset if disabled.', 'kiddies'),
        'type'        => 'checkbox',
    )
);