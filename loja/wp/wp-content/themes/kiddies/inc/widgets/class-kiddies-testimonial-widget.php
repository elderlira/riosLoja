<?php
if (!defined('ABSPATH')) {
    exit;
}

class Kiddies_Testimonial extends Kiddies_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_kiddies_testimonial_page';
        $this->widget_description = __("Displays fullwidth testimonial section", 'kiddies');
        $this->widget_id = 'kiddies_testimonial_page';
        $this->widget_name = __('Kiddies: Fullwidth Testimonial Widget', 'kiddies');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'kiddies'),
            ),
            'sub_title' => array(
                'type' => 'text',
                'label' => __('Sub Title', 'kiddies'),
            ),
            'page_id_1' => array(
                'label' => esc_html__('Select Testimonial Page - 1', 'kiddies'),
                'type'  => 'dropdown-pages',
                'std'   => '',
            ),
            'page_id_2' => array(
                'label' => esc_html__('Select Testimonial Page - 2', 'kiddies'),
                'type'  => 'dropdown-pages',
                'std'   => '',
            ),
            'page_id_3' => array(
                'label' => esc_html__('Select Testimonial Page - 3', 'kiddies'),
                'type'  => 'dropdown-pages',
                'std'   => '',
            ),
            'page_id_4' => array(
                'label' => esc_html__('Select Testimonial Page - 4', 'kiddies'),
                'type'  => 'dropdown-pages',
                'std'   => '',
            ),
            'page_id_5' => array(
                'label' => esc_html__('Select Testimonial Page - 5', 'kiddies'),
                'type'  => 'dropdown-pages',
                'std'   => '',
            ),
            'page_id_6' => array(
                'label' => esc_html__('Select Testimonial Page - 6', 'kiddies'),
                'type'  => 'dropdown-pages',
                'std'   => '',
            ),
            'widget_text_color_option' => array(
                'type' => 'color',
                'label' => __( 'Widget Text Color', 'kiddies' ),
                'std' => '#404040',
            ),
            'widget_bg_color_option' => array(
                'type' => 'color',
                'label' => __( 'Widget Background Color', 'kiddies' ),
                'std' => '#c9cff5',
            ),
                        'bg_image'  => array(
                'type'  => 'image',
                'label' => __( 'Widget Background Image', 'kiddies' ),
            ),
            'enable_fixed_bg'  => array(
                'type'  => 'checkbox',
                'label' => __( 'Enable Fixed Background Image', 'kiddies' ),
                'std' => false,
            ),
            'enable_bg_overlay'  => array(
                'type'  => 'checkbox',
                'label' => __( 'Enable Overlay Background Color', 'kiddies' ),
                'std' => false,
            ),
            'bg_overlay_color' => array(
                'type' => 'color',
                'label' => __( 'Overlay Background Color', 'kiddies' ),
                'std' => '#000000',
            ),
            'overlay_opacity'  => array(
                'type' => 'number',
                'step' => 10,
                'min' => 0,
                'max' => 100,
                'std' => 50,
                'label' => __('Overlay Opacity (Default 50%)', 'kiddies'),
            ),
            'top_border' => array(
                'type' => 'select',
                'label' => __('Shape Dividers - Top', 'kiddies'),
                'options' => array(
                    '' => __('None', 'kiddies'),
                    'cloud' => __('Cloud', 'kiddies'),
                    'drops' => __('Drops', 'kiddies'),
                    'tilt' => __('Tilt', 'kiddies'),
                    'tiltopacity' => __('Tiltopacity', 'kiddies'),
                    'wave' => __('Wave', 'kiddies'),
                    'wavebrush' => __('Wavebrush', 'kiddies'),
                    'fan' => __('Fan', 'kiddies'),
                ),
                'std' => 'left',
            ),
            'flip_1'  => array(
                'type'  => 'checkbox',
                'label' => __( 'Flip', 'kiddies' ),
                'std' => false,
            ),
            'top_border_color_option' => array(
                'type' => 'color',
                'label' => __( 'Top Dividers - Color', 'kiddies' ),
                'std' => '#ffffff',
            ),
            'bottom_border' => array(
                'type' => 'select',
                'label' => __('Shape Dividers - Bottom', 'kiddies'),
                'options' => array(
                    '' => __('None', 'kiddies'),
                    'cloud' => __('Cloud', 'kiddies'),
                    'drops' => __('Drops', 'kiddies'),
                    'tilt' => __('Tilt', 'kiddies'),
                    'tiltopacity' => __('Tiltopacity', 'kiddies'),
                    'wave' => __('Wave', 'kiddies'),
                    'wavebrush' => __('Wavebrush', 'kiddies'),
                    'fan' => __('Fan', 'kiddies'),
                ),
                'std' => 'left',
            ),
            'flip_2'  => array(
                'type'  => 'checkbox',
                'label' => __( 'Flip', 'kiddies' ),
                'std' => false,
            ),
            'bottom_border_color_option' => array(
                'type' => 'color',
                'label' => __( 'Bottom Dividers - Color', 'kiddies' ),
                'std' => '#ffffff',
            ),
        );
        parent::__construct();
    }

    /**
     * Query the posts and return them.
     * @param array $args
     * @param array $instance
     * @return WP_Query
     */
    public function get_posts($args, $instance)
    {
        $kiddies_testimonial_page = array();
        for ($i = 1; $i <= 7; $i++) {
            if (!empty($instance['page_id_' . $i])) {
                $kiddies_testimonial_page_list[] = absint($instance['page_id_' . $i]);
            }
        }
        $query_args = array(
            'posts_per_page' => 6,
            'orderby' => 'post__in',
            'post_type' => 'page',
            'post__in' => $kiddies_testimonial_page_list,
        );

        return new WP_Query(apply_filters('kiddies_testimonial_page_posts_query_args', $query_args));
    }

    /**
     * Output widget.
     *
     * @param array $args
     * @param array $instance
     * @see WP_Widget
     *
     */
    public function widget($args, $instance)
    {
        ob_start();
        echo $args['before_widget'];
        do_action('kiddies_before_testimonial_with_image');
        $style = 'background-color:'.$instance['bg_overlay_color'].';';
        $style .= 'opacity:'.($instance['overlay_opacity']/100).';';
        $style_text = 'background-color:' . $instance['widget_bg_color_option'] . ';';
        $style_text .= 'color:' . $instance['widget_text_color_option'] . ';';
        $style_top = 'color:' . $instance['top_border_color_option'] . ';';
        $style_bottom = 'color:' . $instance['bottom_border_color_option'] . ';';
        $testimonial_classes = '';
        if ($instance['enable_fixed_bg']) {
            $testimonial_classes .= ' data-bg-fixed';
        }
        if ($instance['bg_image']) {
            $testimonial_classes .= ' data-bg';
        }
        if (!empty($instance['top_border'])) {
            $testimonial_classes .= ' has-top-pattern-'.$instance['top_border'] ;
        }
        if (!empty($instance['bottom_border'])) {
            $testimonial_classes .= ' has-bottom-pattern-'.$instance['bottom_border'];
        }

        if (($posts = $this->get_posts($args, $instance)) && $posts->have_posts()) {
        ?>
        <div class="theme-block theme-testimonial-block <?php echo $testimonial_classes; ?>" data-background="<?php echo wp_get_attachment_image_url($instance['bg_image'],'full');?>" style="<?php echo esc_attr($style_text); ?>">
            <?php if ($instance['enable_bg_overlay'] ) { ?>
                <span aria-hidden="true" class="kiddies-block-overlay" style="<?php  echo esc_attr($style); ?>"></span>
            <?php } ?>
                <?php if (!empty($instance['top_border'])) { ?>
                    <div class="theme-separator-pattern separator-pattern-top <?php if ($instance['flip_1']) { echo 'separator-pattern-flip ';} ?> <?php echo($instance['top_border']); ?>-section-image" style="<?php echo esc_attr($style_top);?>">
                        <?php kiddies_theme_svg($instance['top_border']); ?>
                    </div>
                <?php } ?>

                <div class="theme-block-panel testimonial-block-panel">
                    <div class="wrapper">
                        <?php if (!empty($instance['title'])) { ?>
                            <header class="theme-block-header text-center mb-50">
                                <h2 class="theme-block-title theme-block-title-large">
                                    <?php echo esc_html($instance['title']); ?>
                                </h2>
                                <div class="theme-block-subtitle"><?php echo esc_html($instance['sub_title']); ?></div>
                            </header>
                        <?php } ?>
                    </div>
                    <div class="wrapper">
                        <div class="column-row">
                            <div class="column column-12">
                                <div class="swiper theme-client-swiper">
                                    <div class="swiper-wrapper">
                                        <?php while ($posts->have_posts()) : $posts->the_post();
                                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'medium');
                                        $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                                         ?>
                                            <div class="swiper-slide swiper-slide-content">
                                                <div class="testimonial-description">
                                                    <div class="testimonial-quote">
                                                        <?php kiddies_theme_svg('blockquote'); ?>
                                                    </div>
                                                    <p><?php the_excerpt(); ?></p>
                                                </div>
                                                <div class="testimonial-review">
                                                    <div class="data-bg data-bg-client" data-background="<?php echo esc_url($featured_image); ?>"></div>
                                                    <h3 class="entry-title-small mt-10">
                                                        <?php the_title(); ?>
                                                    </h3>
                                                </div>
                                            </div>
                                        <?php
                                        endwhile;
                                        wp_reset_postdata(); ?>

                                    </div>
                                    <div class="swiper-pagination theme-swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if (!empty($instance['bottom_border'])) { ?>
                    <div class="theme-separator-pattern separator-pattern-bottom <?php if ($instance['flip_2']) { echo 'separator-pattern-flip ';} ?> <?php echo($instance['bottom_border']); ?>-section-image"  style="<?php echo esc_attr($style_bottom);?>">
                        <?php kiddies_theme_svg($instance['bottom_border']); ?>
                    </div>
                <?php } ?>
            </div>

            <?php
            }
            do_action('kiddies_after_our_testimonial_with_image');
            echo $args['after_widget'];

        echo ob_get_clean();
    }
}