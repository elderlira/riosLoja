<?php
/*Preloader Options*/
$wp_customize->add_section(
    'preloader_options' ,
    array(
        'title' => __( 'Preloader Options', 'kiddies' ),
        'panel' => 'kiddies_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'kiddies_options[show_preloader]',
    array(
        'default'           => $default_options['show_preloader'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[show_preloader]',
    array(
        'label'    => __( 'Show Preloader', 'kiddies' ),
        'section'  => 'preloader_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'kiddies_options[preloader_style]',
    array(
        'default'           => $default_options['preloader_style'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[preloader_style]',
    array(
        'label'       => __( 'Preloader Style', 'kiddies' ),
        'section'     => 'preloader_options',
        'type'        => 'select',
        'choices'     => array(
            'theme-preloader-spinner-1' => __( 'Style 1', 'kiddies' ),
            'theme-preloader-spinner-2' => __( 'Style 2', 'kiddies' ),
        ),
        'active_callback' => 'kiddies_is_show_preloader',

    )
);
