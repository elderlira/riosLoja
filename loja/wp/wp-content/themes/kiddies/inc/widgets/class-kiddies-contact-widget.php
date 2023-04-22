<?php
if (!defined('ABSPATH')) {
    exit;
}

class Kiddies_Contact extends Kiddies_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_kiddies_contact';
        $this->widget_description = __("Displays fullwidth contact section", 'kiddies');
        $this->widget_id = 'kiddies_contact';
        $this->widget_name = __('Kiddies: Fullwidth Contact Widget', 'kiddies');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'kiddies'),
            ),
            'description' => array(
                'type' => 'textarea',
                'label' => __('Description', 'kiddies'),
            ),
            'contact_shortcode' => array(
                'type' => 'textarea',
                'label' => __('Contact form Shortcode', 'kiddies'),
            ),
            'widget_text_color_option' => array(
                'type' => 'color',
                'label' => __('Widget Text Color', 'kiddies'),
                'std' => '#404040',
            ),
            'widget_bg_color_option' => array(
                'type' => 'color',
                'label' => __('Widget Background Color', 'kiddies'),
                'std' => '#ffefe4',
            ),
            'bg_image' => array(
                'type' => 'image',
                'label' => __('Widget Background Image', 'kiddies'),
            ),
            'enable_fixed_bg' => array(
                'type' => 'checkbox',
                'label' => __('Enable Fixed Background Image', 'kiddies'),
                'std' => false,
            ),
            'enable_bg_overlay' => array(
                'type' => 'checkbox',
                'label' => __('Enable Overlay Background Color', 'kiddies'),
                'std' => false,
            ),
            'bg_overlay_color' => array(
                'type' => 'color',
                'label' => __('Overlay Background Color', 'kiddies'),
                'std' => '#000000',
            ),
            'overlay_opacity' => array(
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
        do_action('kiddies_before_contact_with_image');
        $style = 'background-color:' . $instance['bg_overlay_color'] . ';';
        $style .= 'opacity:' . ($instance['overlay_opacity'] / 100) . ';';
        $style_text = 'background-color:' . $instance['widget_bg_color_option'] . ';';
        $style_text .= 'color:' . $instance['widget_text_color_option'] . ';';
        $style_top = 'color:' . $instance['top_border_color_option'] . ';';
        $style_bottom = 'color:' . $instance['bottom_border_color_option'] . ';';
        $contact_classes = '';
        if ($instance['enable_fixed_bg']) {
            $contact_classes .= ' data-bg-fixed';
        }
        if ($instance['bg_image']) {
            $contact_classes .= ' data-bg';
        }
        if (!empty($instance['top_border'])) {
            $contact_classes .= ' has-top-pattern-' . $instance['top_border'];
        }
        if (!empty($instance['bottom_border'])) {
            $contact_classes .= ' has-bottom-pattern-' . $instance['bottom_border'];
        }
        ?>
        <div class="theme-block theme-contact-block <?php echo $contact_classes; ?>" data-background="<?php echo wp_get_attachment_image_url($instance['bg_image'], 'full'); ?>" style="<?php echo esc_attr($style_text); ?>">
            <?php if ($instance['enable_bg_overlay']) { ?>
                <span aria-hidden="true" class="kiddies-block-overlay" style="<?php echo esc_attr($style); ?>"></span>
            <?php } ?>

            <?php if (!empty($instance['top_border'])) { ?>
                <div class="theme-separator-pattern separator-pattern-top <?php if ($instance['flip_1']) { echo 'separator-pattern-flip '; } ?> <?php echo($instance['top_border']); ?>-section-image" style="<?php echo esc_attr($style_top); ?>">
                    <?php kiddies_theme_svg($instance['top_border']); ?>
                </div>
            <?php } ?>

            <div class="theme-block-panel contact-block-panel">
                <div class="wrapper wrapper-extra-small">
                    <div class="column-row">
                        <div class="column column-12">
                            <?php if (!empty($instance['title'])) { ?>
                                <header class="theme-block-header text-center">
                                    <h2 class="theme-block-title theme-block-title-large">
                                        <?php echo esc_html($instance['title']); ?>
                                    </h2>
                                </header>
                            <?php } ?>
                            <?php if (!empty($instance['description'])) { ?>
                                <div class="entry-summary text-center"><?php echo esc_html($instance['description']); ?></div>
                            <?php } ?>
                            <?php if (!empty($instance['contact_shortcode'])) { ?>
                            <div class="contact-block-form">
                                <?php echo do_shortcode($instance['contact_shortcode']); ?>
                            </div>
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
        do_action('kiddies_after_contact_with_image');
        echo $args['after_widget'];
        echo ob_get_clean();
    }
}