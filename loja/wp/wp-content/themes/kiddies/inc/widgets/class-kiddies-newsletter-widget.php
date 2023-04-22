<?php

if (!defined('ABSPATH')) {
    exit;
}

class Kiddies_Mailchimp_Form extends Kiddies_Widget_Base
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_kiddies_mailchimp_form';
        $this->widget_description = __("Displays MailChimp form if you have any", 'kiddies');
        $this->widget_id = 'kiddies_mailchimp_form';
        $this->widget_name = __('Kiddies: MailChimp Form', 'kiddies');
        $this->settings = array(
            'title' => array(
                'label' => esc_html__('Widget Title', 'kiddies'),
                'type' => 'text',
                'class' => 'widefat',
            ),
            'desc' => array(
                'type' => 'textarea',
                'label' => __('Description', 'kiddies'),
                'rows' => 10,
            ),
            'form_shortcode' => array(
                'type' => 'text',
                'label' => __('MailChimp Form Shortcode', 'kiddies'),
            ),
            'style' => array(
                'type' => 'select',
                'label' => __('Style', 'kiddies'),
                'options' => array(
                    'style_1' => __('Style 1', 'kiddies'),
                    'style_2' => __('Style 2', 'kiddies'),
                    'style_3' => __('Style 3', 'kiddies'),
                ),
                'std' => 'style_1',
            ),
            'msg' => array(
                'type' => 'message',
                'label' => __('Additonal Settings', 'kiddies'),
            ),
            'height'  => array(
                'type' => 'number',
                'step' => 20,
                'min' => 300,
                'max' => 700,
                'std' => 400,
                'label' => __('Height: Between 300px and 700px (Default 400px)', 'kiddies'),
            ),
            'widget_text_color_option' => array(
                'type' => 'color',
                'label' => __( 'Text Color', 'kiddies' ),
                'std' => '#404040',
            ),
            'widget_bg_color_option' => array(
                'type' => 'color',
                'label' => __('Widget Background Color', 'kiddies'),
                'std' => '#ffffff',
            ),
            'text_align' => array(
                'type' => 'select',
                'label' => __('Text Alignment', 'kiddies'),
                'options' => array(
                    'left' => __('Left Align', 'kiddies'),
                    'center' => __('Center Align', 'kiddies'),
                    'right' => __('Right Align', 'kiddies'),
                ),
                'std' => 'left',
            ),
            'bg_image'  => array(
                'type'  => 'image',
                'label' => __( 'Background Image', 'kiddies' ),
                'desc' => __( 'Don\'t upload any image if you do not want to show the background image.', 'kiddies' ),
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
     * @see WP_Widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        if (!empty($instance['form_shortcode'])) {

        ob_start();
        echo $args['before_widget'];
        do_action('kiddies_before_mailchimp_with_image');
        $mailchimp_classes = '';
        $mailchimp_classes .= $instance['style'];
        $style = 'background-color:'.$instance['bg_overlay_color'].';';
        $style .= 'opacity:'.($instance['overlay_opacity']/100).';';
        $style_text = 'background-color:' . $instance['widget_bg_color_option'] . ';';
        $style_text .= 'color:' . $instance['widget_text_color_option'] . ';';
        $style_top = 'color:' . $instance['top_border_color_option'] . ';';
        $style_bottom = 'color:' . $instance['bottom_border_color_option'] . ';';
        if ($instance['enable_fixed_bg']) {
            $mailchimp_classes .= ' data-bg-fixed';
        }
        if ($instance['bg_image']) {
            $mailchimp_classes .= ' data-bg';
        }
        if (!empty($instance['top_border'])) {
            $mailchimp_classes .= ' has-top-pattern-'.$instance['top_border'] ;
        }
        if (!empty($instance['bottom_border'])) {
            $mailchimp_classes .= ' has-bottom-pattern-'.$instance['bottom_border'];
        }
            ?>
            <div class="theme-block theme-newsletter-block <?php echo $mailchimp_classes; ?>" data-background="<?php echo wp_get_attachment_image_url($instance['bg_image'],'full');?>" style="<?php echo esc_attr($style_text); ?>">
                    <?php if ($instance['enable_bg_overlay'] ) { ?>
                        <span aria-hidden="true" class="kiddies-block-overlay" style="<?php  echo esc_attr($style); ?>"></span>
                    <?php } ?>
                    <?php if (!empty($instance['top_border'])) { ?>
                        <div class="theme-separator-pattern separator-pattern-top <?php if ($instance['flip_1']) { echo 'separator-pattern-flip '; } ?><?php echo($instance['top_border']); ?>-section-image" style="<?php echo esc_attr($style_top); ?>">
                            <?php kiddies_theme_svg($instance['top_border']); ?>
                        </div>
                    <?php } ?>

                <div class="kiddies-mailchimp-inner-wrapper kiddies-block-inner-wrapper">
                   <div class="mailchimp-content-group_1">
                        <?php if ($instance['title']) : ?>
                            <h2 class="entry-title entry-title-large animate__animated animate__fadeInUp animate__delay-1s">
                                <?php echo esc_html($instance['title']); ?>
                            </h2>
                        <?php endif; ?>

                        <div class="entry-summary animate__animated animate__fadeInUp animate__delay-1s">
                            <?php
                            if ($instance['desc']) {
                                echo wpautop(wp_kses_post($instance['desc']));
                            }
                            ?>
                        </div>
                   </div>
                    <div class="mailchimp-content-group_2">
                        <footer class="entry-footer animate__animated animate__fadeInUp animate__delay-2s">
                        <?php echo do_shortcode($instance['form_shortcode']); ?>
                        </footer>
                    </div>
                </div>
                <?php if (!empty($instance['bottom_border'])) { ?>
                    <div class="theme-separator-pattern separator-pattern-bottom <?php if ($instance['flip_2']) { echo 'separator-pattern-flip '; } ?> <?php echo($instance['bottom_border']); ?>-section-image" style="<?php echo esc_attr($style_bottom); ?>">
                        <?php kiddies_theme_svg($instance['bottom_border']); ?>
                    </div>
                <?php } ?>

            </div>

            <?php

            do_action( 'kiddies_after_mailchimp');

            echo $args['after_widget'];

            echo ob_get_clean();
        }
    }
}