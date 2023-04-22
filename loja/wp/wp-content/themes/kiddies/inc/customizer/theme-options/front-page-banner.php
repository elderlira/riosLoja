<?php
/*Add Home Page Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Front Page Options', 'kiddies' ),
        'description' => __( 'Contains all front page settings', 'kiddies'),
        'priority' => 50
    )
);
/**/
$wp_customize->add_section(
    'home_page_banner_option',
    array(
        'title'      => __( 'Front Page Banner Options', 'kiddies' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'kiddies_options[enable_banner_section]',
    array(
        'default'           => $default_options['enable_banner_section'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_banner_section]',
    array(
        'label'   => __( 'Enable Banner Section', 'kiddies' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'kiddies_options[banner_section_slider_layout]',
    array(
        'default'           => $default_options['banner_section_slider_layout'],
        'sanitize_callback' => 'kiddies_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Kiddies_Radio_Image_Control(
        $wp_customize,
        'kiddies_options[banner_section_slider_layout]',
        array(
            'label' => __( 'Banner Slider Layout', 'kiddies' ),
            'section' => 'home_page_banner_option',
            'choices' => kiddies_get_slider_layouts()
        )
    )
);


$wp_customize->add_setting(
    'kiddies_options[number_of_slider_post]',
    array(
        'default'           => $default_options['number_of_slider_post'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[number_of_slider_post]',
    array(
        'label'       => __( 'Post In Slider', 'kiddies' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( '3', 'kiddies' ),
            '4' => __( '4', 'kiddies' ),
            '5' => __( '5', 'kiddies' ),
            '6' => __( '6', 'kiddies' ),
        ),
    )
);

$wp_customize->add_setting(
    'kiddies_options[select_slider_from]',
    array(
        'default'           => $default_options['select_slider_from'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[select_slider_from]',
    array(
        'label'       => __( 'Select Slider From', 'kiddies' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            'from-page' => __( 'Page', 'kiddies' ),
            'from-category' => __( 'Category', 'kiddies' )
        ),
    )
);

for ( $i=1; $i <=  kiddies_get_option( 'number_of_slider_post' ) ; $i++ ) {
        $wp_customize->add_setting( 'select_page_for_slider_'. $i, array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'kiddies_sanitize_dropdown_pages',
            
        ) );

        $wp_customize->add_control( 'select_page_for_slider_'. $i, array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Slider From Page', 'kiddies' ) . ' - ' . $i ,
            'section'           => 'home_page_banner_option',
            'type'              => 'dropdown-pages',
            'active_callback'   => 'kiddies_is_select_page_slider',
            )
        );
    }

$wp_customize->add_setting(
    'kiddies_options[banner_section_cat]',
    array(
        'default'           => $default_options['banner_section_cat'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[banner_section_cat]',
    array(
        'label'   => __( 'Choose Banner Category', 'kiddies' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => kiddies_post_category_list(),
        'active_callback'   => 'kiddies_is_select_cat_slider',
    )
);

$wp_customize->add_setting(
    'kiddies_options[slider_post_content_alignment]',
    array(
        'default'           => $default_options['slider_post_content_alignment'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[slider_post_content_alignment]',
    array(
        'label'       => __( 'Slider Content Alignment', 'kiddies' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            'text-right' => __( 'Align Right', 'kiddies' ),
            'text-center' => __( 'Align Center', 'kiddies' ),
            'text-left' => __( 'Align Left', 'kiddies' ),
        ),
    )
);


$wp_customize->add_setting(
    'kiddies_options[enable_banner_post_description]',
    array(
        'default'           => $default_options['enable_banner_post_description'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_banner_post_description]',
    array(
        'label'   => __( 'Enable Post Description', 'kiddies' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'kiddies_options[enable_banner_cat_meta]',
    array(
        'default'           => $default_options['enable_banner_cat_meta'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_banner_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'kiddies' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'kiddies_options[enable_banner_author_meta]',
    array(
        'default'           => $default_options['enable_banner_author_meta'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_banner_author_meta]',
    array(
        'label'   => __( 'Enable author Meta', 'kiddies' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'kiddies_options[enable_banner_date_meta]',
    array(
        'default'           => $default_options['enable_banner_date_meta'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[enable_banner_date_meta]',
    array(
        'label'   => __( 'Enable Date On Banner', 'kiddies' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'kiddies_options[slider_top_svg_option]',
    array(
        'default'           => $default_options['slider_top_svg_option'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[slider_top_svg_option]',
    array(
        'label'       => __( 'Slider Top SVG', 'kiddies' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            '' => __('None', 'kiddies'),
            'cloud' => __('Cloud', 'kiddies'),
            'drops' => __('Drops', 'kiddies'),
            'tilt' => __('Tilt', 'kiddies'),
            'tiltopacity' => __('Tiltopacity', 'kiddies'),
            'wave' => __('Wave', 'kiddies'),
            'wavebrush' => __('Wavebrush', 'kiddies'),
            'fan' => __('Fan', 'kiddies'),
        ),
    )
);

$wp_customize->add_setting(
    'kiddies_options[top_svg_flip_enable]',
    array(
        'default'           => $default_options['top_svg_flip_enable'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[top_svg_flip_enable]',
    array(
        'label'   => __( 'Enable Top SVG Flip', 'kiddies' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);
$wp_customize->add_setting(
    'kiddies_options[banner_separator_color_top]',
    array(
        'default' => $default_options['banner_separator_color_top'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'kiddies_options[banner_separator_color_top]',
        array(
            'label' => __('Top SVG Background Color', 'kiddies'),
            'section' => 'home_page_banner_option',
            'type' => 'color',
        )
    )
);

$wp_customize->add_setting(
    'kiddies_options[slider_bottom_svg_option]',
    array(
        'default'           => $default_options['slider_bottom_svg_option'],
        'sanitize_callback' => 'kiddies_sanitize_select',
    )
);
$wp_customize->add_control(
    'kiddies_options[slider_bottom_svg_option]',
    array(
        'label'       => __( 'Slider bottom SVG', 'kiddies' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            '' => __('None', 'kiddies'),
            'cloud' => __('Cloud', 'kiddies'),
            'drops' => __('Drops', 'kiddies'),
            'tilt' => __('Tilt', 'kiddies'),
            'tiltopacity' => __('Tiltopacity', 'kiddies'),
            'wave' => __('Wave', 'kiddies'),
            'wavebrush' => __('Wavebrush', 'kiddies'),
            'fan' => __('Fan', 'kiddies'),
        ),
    )
);


$wp_customize->add_setting(
    'kiddies_options[bottom_svg_flip_enable]',
    array(
        'default'           => $default_options['bottom_svg_flip_enable'],
        'sanitize_callback' => 'kiddies_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'kiddies_options[bottom_svg_flip_enable]',
    array(
        'label'   => __( 'Enable bottom SVG Flip', 'kiddies' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);
$wp_customize->add_setting(
    'kiddies_options[banner_separator_color_bottom]',
    array(
        'default' => $default_options['banner_separator_color_bottom'],
        'sanitize_callback' => 'sanitize_hex_color',
    )
);

$wp_customize->add_control(
    new WP_Customize_Color_Control(
        $wp_customize,
        'kiddies_options[banner_separator_color_bottom]',
        array(
            'label' => __('Button SVG Background Color', 'kiddies'),
            'section' => 'home_page_banner_option',
            'type' => 'color',
        )
    )
);