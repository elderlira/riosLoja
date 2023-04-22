<?php

$wp_customize->add_section(
    'single_options' ,
    array(
        'title' => __( 'Single Options', 'kiddies' ),
        'panel' => 'kiddies_option_panel',
    )
);

/* Global Layout*/
$wp_customize->add_setting(
    'kiddies_options[single_sidebar_layout]',
    array(
        'default'           => $default_options['single_sidebar_layout'],
        'sanitize_callback' => 'kiddies_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Kiddies_Radio_Image_Control(
        $wp_customize,
        'kiddies_options[single_sidebar_layout]',
        array(
            'label' => __( 'Single Sidebar Layout', 'kiddies' ),
            'section' => 'single_options',
            'choices' => kiddies_get_general_layouts()
        )
    )
);

// Hide Side Bar on Mobile
$wp_customize->add_setting(
    'kiddies_options[hide_single_sidebar_mobile]',
    array(
        'default'           => $default_options['hide_single_sidebar_mobile'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[hide_single_sidebar_mobile]',
    array(
        'label'       => __( 'Hide Single Sidebar on Mobile', 'kiddies' ),
        'section'     => 'single_options',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting(
    'kiddies_section_seperator_single_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control(
        $wp_customize,
        'kiddies_section_seperator_single_1',
        array(
            'settings' => 'kiddies_section_seperator_single_1',
            'section'       => 'single_options',
        )
    )
);

/* Post Meta */
$wp_customize->add_setting(
    'kiddies_options[single_post_meta]',
    array(
        'default'           => $default_options['single_post_meta'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Kiddies_Checkbox_Multiple(
        $wp_customize,
        'kiddies_options[single_post_meta]',
        array(
            'label' => __( 'Single Post Meta', 'kiddies' ),
            'description'   => __( 'Choose the post meta you want to be displayed on post detail page', 'kiddies' ),
            'section' => 'single_options',
            'choices' => array(
                'author' => __( 'Author', 'kiddies' ),
                'date' => __( 'Date', 'kiddies' ),
                'comment' => __( 'Comment', 'kiddies' ),
                'category' => __( 'Category', 'kiddies' ),
                'tags' => __( 'Tags', 'kiddies' ),
            )
        )
    )
);


$wp_customize->add_setting(
    'kiddies_section_seperator_single_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control( 
        $wp_customize,
        'kiddies_section_seperator_single_2',
        array(
            'settings' => 'kiddies_section_seperator_single_2',
            'section'       => 'single_options',
        )
    )
);

/*Show Author Info Box
*-------------------------------*/
$wp_customize->add_setting(
    'kiddies_options[show_author_info]',
    array(
        'default'           => $default_options['show_author_info'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[show_author_info]',
    array(
        'label'    => __( 'Show Author Info Box', 'kiddies' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'kiddies_section_seperator_single_3',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control(
        $wp_customize,
        'kiddies_section_seperator_single_3',
        array(
            'settings' => 'kiddies_section_seperator_single_3',
            'section'       => 'single_options',
        )
    )
);

/*Show Related Posts
*-------------------------------*/
$wp_customize->add_setting(
    'kiddies_options[show_related_posts]',
    array(
        'default'           => $default_options['show_related_posts'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[show_related_posts]',
    array(
        'label'    => __( 'Show Related Posts', 'kiddies' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Related Posts Text.*/
$wp_customize->add_setting(
    'kiddies_options[related_posts_text]',
    array(
        'default'           => $default_options['related_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'kiddies_options[related_posts_text]',
    array(
        'label'    => __( 'Related Posts Text', 'kiddies' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'kiddies_is_related_posts_enabled',
    )
);

/* Number of Related Posts */
$wp_customize->add_setting(
    'kiddies_options[no_of_related_posts]',
    array(
        'default'           => $default_options['no_of_related_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'kiddies_options[no_of_related_posts]',
    array(
        'label'       => __( 'Number of Related Posts', 'kiddies' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'kiddies_is_related_posts_enabled',
    )
);

/*Related Posts Orderby*/
$wp_customize->add_setting(
    'kiddies_options[related_posts_orderby]',
    array(
        'default'           => $default_options['related_posts_orderby'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[related_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'kiddies' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'kiddies'),
            'id' => __('ID', 'kiddies'),
            'title' => __('Title', 'kiddies'),
            'rand' => __('Random', 'kiddies'),
        ),
        'active_callback' => 'kiddies_is_related_posts_enabled',
    )
);

/*Related Posts Order*/
$wp_customize->add_setting(
    'kiddies_options[related_posts_order]',
    array(
        'default'           => $default_options['related_posts_order'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[related_posts_order]',
    array(
        'label'       => __( 'Order', 'kiddies' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'kiddies'),
            'desc' => __('DESC', 'kiddies'),
        ),
        'active_callback' => 'kiddies_is_related_posts_enabled',
    )
);

$wp_customize->add_setting(
    'kiddies_section_seperator_single_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Kiddies_Seperator_Control(
        $wp_customize,
        'kiddies_section_seperator_single_4',
        array(
            'settings' => 'kiddies_section_seperator_single_4',
            'section'       => 'single_options',
        )
    )
);
/*Show Author Posts
*-----------------------------------------*/
$wp_customize->add_setting(
    'kiddies_options[show_author_posts]',
    array(
        'default'           => $default_options['show_author_posts'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[show_author_posts]',
    array(
        'label'    => __( 'Show Author Posts', 'kiddies' ),
        'section'  => 'single_options',
        'type'     => 'checkbox',
    )
);

/*Author Posts Text.*/
$wp_customize->add_setting(
    'kiddies_options[author_posts_text]',
    array(
        'default'           => $default_options['author_posts_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'kiddies_options[author_posts_text]',
    array(
        'label'    => __( 'Author Posts Text', 'kiddies' ),
        'section'  => 'single_options',
        'type'     => 'text',
        'active_callback' => 'kiddies_is_author_posts_enabled',
    )
);

/* Number of Author Posts */
$wp_customize->add_setting(
    'kiddies_options[no_of_author_posts]',
    array(
        'default'           => $default_options['no_of_author_posts'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'kiddies_options[no_of_author_posts]',
    array(
        'label'       => __( 'Number of Author Posts', 'kiddies' ),
        'section'     => 'single_options',
        'type'        => 'number',
        'active_callback' => 'kiddies_is_author_posts_enabled',
    )
);

/*Author Posts Orderby*/
$wp_customize->add_setting(
    'kiddies_options[author_posts_orderby]',
    array(
        'default'           => $default_options['author_posts_orderby'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[author_posts_orderby]',
    array(
        'label'       => __( 'Orderby', 'kiddies' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'date' => __('Date', 'kiddies'),
            'id' => __('ID', 'kiddies'),
            'title' => __('Title', 'kiddies'),
            'rand' => __('Random', 'kiddies'),
        ),
        'active_callback' => 'kiddies_is_author_posts_enabled',
    )
);

/*Author Posts Order*/
$wp_customize->add_setting(
    'kiddies_options[author_posts_order]',
    array(
        'default'           => $default_options['author_posts_order'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[author_posts_order]',
    array(
        'label'       => __( 'Order', 'kiddies' ),
        'section'     => 'single_options',
        'type'        => 'select',
        'choices' => array(
            'asc' => __('ASC', 'kiddies'),
            'desc' => __('DESC', 'kiddies'),
        ),
        'active_callback' => 'kiddies_is_author_posts_enabled',
    )
);