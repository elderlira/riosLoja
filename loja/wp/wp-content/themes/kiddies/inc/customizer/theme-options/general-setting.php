<?php
/*Header Options*/
$wp_customize->add_section(
    'general_settings' ,
    array(
        'title' => __( 'General Settings', 'kiddies' ),
        'panel' => 'kiddies_option_panel',
    )
);

/*Show Preloader*/
$wp_customize->add_setting(
    'kiddies_options[show_lightbox_image]',
    array(
        'default'           => $default_options['show_lightbox_image'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[show_lightbox_image]',
    array(
        'label'    => __( 'Show LightBox Image', 'kiddies' ),
        'section'  => 'general_settings',
        'type'     => 'checkbox',
    )
);
