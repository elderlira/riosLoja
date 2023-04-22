<?php
if (!defined('ABSPATH')) {
    exit;
}
class Kiddies_About extends Kiddies_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_kiddies_about';
        $this->widget_description = __("Displays fullwidth about section", 'kiddies');
        $this->widget_id = 'kiddies_about';
        $this->widget_name = __('Kiddies: Fullwidth About Widget', 'kiddies');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'kiddies'),
            ),
            'sub_title' => array(
                'type' => 'text',
                'label' => __('Subtitle', 'kiddies'),
            ),
            'description' => array(
                'type' => 'textarea',
                'label' => __('Description', 'kiddies'),
            ),
            'featured_image_1' => array(
                'type' => 'image',
                'label' => __('Featured Image - 1', 'kiddies'),
            ),
            'featured_image_2' => array(
                'type' => 'image',
                'label' => __('Featured Image - 2', 'kiddies'),
            ),
            'short_description' => array(
                'type' => 'textarea',
                'label' => __('Short Description', 'kiddies'),
            ),
            'button_text' => array(
                'type' => 'text',
                'label' => __('Button Text', 'kiddies'),
            ),
            'button_url' => array(
                'type' => 'url',
                'label' => __('Button URL', 'kiddies'),
            ),
            'widget_text_color_option' => array(
                'type' => 'color',
                'label' => __('Widget Text Color', 'kiddies'),
                'std' => '#404040',
            ),
            'widget_bg_color_option' => array(
                'type' => 'color',
                'label' => __('Widget Background Color', 'kiddies'),
                'std' => '#ffffff',
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
            'flip_1' => array(
                'type' => 'checkbox',
                'label' => __('Flip', 'kiddies'),
                'std' => false,
            ),
            'top_border_color_option' => array(
                'type' => 'color',
                'label' => __('Top Dividers - Color', 'kiddies'),
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
            'flip_2' => array(
                'type' => 'checkbox',
                'label' => __('Flip', 'kiddies'),
                'std' => false,
            ),
            'bottom_border_color_option' => array(
                'type' => 'color',
                'label' => __('Bottom Dividers - Color', 'kiddies'),
                'std' => '#ffffff',
            ),
        );
        parent::__construct();
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
        do_action('kiddies_before_about_with_image');
        $style = 'background-color:'.$instance['bg_overlay_color'].';';
        $style .= 'opacity:'.($instance['overlay_opacity']/100).';';
        $style_text = 'background-color:' . $instance['widget_bg_color_option'] . ';';
        $style_text .= 'color:' . $instance['widget_text_color_option'] . ';';
        $style_top = 'color:' . $instance['top_border_color_option'] . ';';
        $style_bottom = 'color:' . $instance['bottom_border_color_option'] . ';';
        $about_image = 'large';
        $about_classes = '';
        if ($instance['enable_fixed_bg']) {
            $about_classes .= ' data-bg-fixed';
        }
        if ($instance['bg_image']) {
            $about_classes .= ' data-bg';
        }
        if (!empty($instance['top_border'])) {
            $about_classes .= ' has-top-pattern-'.$instance['top_border'] ;
        }
        if (!empty($instance['bottom_border'])) {
            $about_classes .= ' has-bottom-pattern-'.$instance['bottom_border'];
        }
        ?>
        <div class="theme-block theme-about-block <?php echo $about_classes; ?>" data-background="<?php echo wp_get_attachment_image_url($instance['bg_image'],'full');?>" style="<?php echo esc_attr($style_text); ?>">
            <?php if ($instance['enable_bg_overlay'] ) { ?>
                <span aria-hidden="true" class="kiddies-block-overlay" style="<?php  echo esc_attr($style); ?>"></span>
            <?php } ?>
            <?php if (!empty($instance['top_border'])) { ?>
                <div class="theme-separator-pattern separator-pattern-top <?php if ($instance['flip_1']) { echo 'separator-pattern-flip '; } ?><?php echo($instance['top_border']); ?>-section-image" style="<?php echo esc_attr($style_top); ?>">
                    <?php kiddies_theme_svg($instance['top_border']); ?>
                </div>
            <?php } ?>
            <div class="theme-block-panel about-block-panel">
                <div class="wrapper">
                    <div class="column-row">
                        <div class="column column-6 column-xs-12 mb-xs-50">
                            <?php if (!empty($instance['title'])) { ?>
                                <header class="theme-block-header">
                                    <h2 class="theme-block-title theme-block-title-large">
                                        <?php echo esc_html($instance['title']); ?>
                                    </h2>
                                </header>
                            <?php } ?>
                            <?php if (!empty($instance['sub_title'])) { ?>
                                <h3 class="entry-title entry-title-big">
                                    <?php echo esc_html($instance['sub_title']); ?>
                                </h3>
                            <?php } ?>
                            <?php if (!empty($instance['description'])) { ?>
                                <p><?php echo esc_html($instance['description']); ?></p>
                            <?php } ?>
                            <?php if (!empty($instance['featured_image_1'])) { ?>
                                <div class="data-bg data-bg-medium has-border-radius" data-background="<?php echo wp_get_attachment_image_url($instance['featured_image_1'], $about_image, ''); ?>"></div>
                            <?php } ?>
                        </div>
                        <div class="column column-6 column-xs-12">
                            <?php if (!empty($instance['featured_image_2'])) { ?>
                                <div class="data-bg data-bg-big has-border-radius" data-background="<?php echo wp_get_attachment_image_url($instance['featured_image_2'], $about_image, ''); ?>"></div>
                            <?php } ?>
                            <?php if (!empty($instance['short_description'])) { ?>
                                <p><?php echo esc_html($instance['short_description']); ?></p>
                            <?php } ?>
                            <?php if (!empty($instance['button_text'])) { ?>
                                <a href="<?php echo esc_url($instance['button_url']); ?>" class="theme-button" target="_blank">
                                    <?php echo esc_html($instance['button_text']); ?>
                                </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($instance['bottom_border'])) { ?>
                <div class="theme-separator-pattern separator-pattern-bottom <?php if ($instance['flip_2']) { echo 'separator-pattern-flip '; } ?> <?php echo($instance['bottom_border']); ?>-section-image" style="<?php echo esc_attr($style_bottom); ?>">
                    <?php kiddies_theme_svg($instance['bottom_border']); ?>
                </div>
            <?php } ?>
        </div>
        <?php
        do_action('kiddies_after_about_with_image');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}