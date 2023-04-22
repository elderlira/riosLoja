<?php
/*Header Options*/
$wp_customize->add_section(
    'header_options' ,
    array(
        'title' => __( 'Header Options', 'kiddies' ),
        'panel' => 'kiddies_option_panel',
    )
);

$wp_customize->add_setting(
    'kiddies_section_seperator_header_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control(
        $wp_customize,
        'kiddies_section_seperator_header_1',
        array(
            'settings' => 'kiddies_section_seperator_header_1',
            'section' => 'header_options',
        )
    )
);

/* Header Style */
$wp_customize->add_setting(
    'kiddies_options[header_style]',
    array(
        'default'           => $default_options['header_style'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[header_style]',
    array(
        'label'       => __( 'Header Style', 'kiddies' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'kiddies' ),

        'section'     => 'header_options',
        'type'        => 'select',
        'choices'     => array(
            'header_style_1' => __( 'Header Style 1', 'kiddies' ),
            'header_style_2' => __( 'Header Style 2', 'kiddies' ),
            'header_style_3' => __( 'Header Style 3', 'kiddies' ),
        ),
    )
);

$wp_customize->add_setting(
    'kiddies_section_seperator_header_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control(
        $wp_customize,
        'kiddies_section_seperator_header_2',
        array(
            'settings' => 'kiddies_section_seperator_header_2',
            'section' => 'header_options',
        )
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'kiddies_options[enable_sticky_menu]',
    array(
        'default'           => $default_options['enable_sticky_menu'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_sticky_menu]',
    array(
        'label'    => __( 'Enable Sticky Menu', 'kiddies' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'kiddies_section_seperator_header_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control(
        $wp_customize,
        'kiddies_section_seperator_header_3',
        array(
            'settings' => 'kiddies_section_seperator_header_3',
            'section' => 'header_options',
        )
    )
);

$wp_customize->add_setting(
    'kiddies_options[enable_random_post]',
    array(
        'default' => $default_options['enable_random_post'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_random_post]',
    array(
        'label' => esc_html__('Enable Random Post', 'kiddies'),
        'section' => 'header_options',
        'type' => 'checkbox',
    )
);

$wp_customize->add_setting(
    'kiddies_options[random_post_category]',
    array(
        'default'           => $default_options['random_post_category'],
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(new Kiddies_Dropdown_Taxonomies_Control(
    $wp_customize, 
    'kiddies_options[random_post_category]',
        array(
            'label'           => esc_html__('Random Post Category', 'kiddies'),
            'section'         => 'header_options',
        )
    )
);

$wp_customize->add_setting(
    'kiddies_section_seperator_header_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control(
        $wp_customize,
        'kiddies_section_seperator_header_4',
        array(
            'settings' => 'kiddies_section_seperator_header_4',
            'section' => 'header_options',
        )
    )
);

/*Enable Search*/
$wp_customize->add_setting(
    'kiddies_options[enable_search_on_header]',
    array(
        'default'           => $default_options['enable_search_on_header'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_search_on_header]',
    array(
        'label'    => __( 'Enable Search Icon', 'kiddies' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
    )
);

if(class_exists( 'WooCommerce' )){
    
    /*Enable Mini Cart Icon on header*/
    $wp_customize->add_setting(
        'kiddies_options[enable_mini_cart_header]',   
        array(
            'default'           => $default_options['enable_mini_cart_header'],
            'sanitize_callback' => 'kiddies_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'kiddies_options[enable_mini_cart_header]',
        array(
            'label'    => __( 'Enable Mini Cart Icon', 'kiddies' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );

    /*Enable Myaccount Link*/
    $wp_customize->add_setting(
        'kiddies_options[enable_woo_my_account]',   
        array(
            'default'           => $default_options['enable_woo_my_account'],
            'sanitize_callback' => 'kiddies_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'kiddies_options[enable_woo_my_account]',
        array(
            'label'    => __( 'Enable My Account Icon', 'kiddies' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );
}