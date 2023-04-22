<?php
$wp_customize->add_section(
    'pagination_options' ,
    array(
        'title' => __( 'Pagination Options', 'kiddies' ),
        'panel' => 'kiddies_option_panel',
    )
);

/* Pagination Type*/
$wp_customize->add_setting(
    'kiddies_options[pagination_type]',
    array(
        'default'           => $default_options['pagination_type'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[pagination_type]',
    array(
        'label'       => __( 'Pagination Type', 'kiddies' ),
        'section'     => 'pagination_options',
        'type'        => 'select',
        'choices'     => array(
            'default' => __( 'Default (Older / Newer Post)', 'kiddies' ),
            'numeric' => __( 'Numeric', 'kiddies' ),
            'ajax_load_on_click' => __( 'Load more post on click', 'kiddies' ),
            'ajax_load_on_scroll' => __( 'Load more posts on scroll', 'kiddies' ),
        ),
    )
);
