<?php

if (!defined('ABSPATH')) {
    exit;
}

class Kiddies_Call_To_Action extends Kiddies_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_kiddies_call_to_action';
        $this->widget_description = __("Adds fullwidth Call to action section", 'kiddies');
        $this->widget_id = 'kiddies_call_to_action';
        $this->widget_name = __('Kiddies: Fullwidth CTA Widget', 'kiddies');

        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('CTA Title', 'kiddies'),
            ),
            'title_text' => array(
                'type' => 'text',
                'label' => __('CTA Subtitle', 'kiddies'),
            ),
            'desc'  => array(
                'type'  => 'textarea',
                'label' => __( 'CTA Description', 'kiddies' ),
                'rows' => 10,
            ),
            'bg_image'  => array(
                'type'  => 'image',
                'label' => __( 'Background Image', 'kiddies' ),
            ),
            'btn_text'  => array(
                'type'  => 'text',
                'label' => __( 'Button Text', 'kiddies' ),
            ),
            'btn_link'  => array(
                'type'  => 'url',
                'label' => __( 'Link to url', 'kiddies' ),
                'desc' => __( 'Enter a proper url with http: OR https:', 'kiddies' ),
            ),
            'link_target'  => array(
                'type'  => 'checkbox',
                'label' => __( 'Open Link in new Tab', 'kiddies' ),
                'std' => true,
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
                'std' => '#ffffff',
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
            'enable_fixed_bg'  => array(
                'type'  => 'checkbox',
                'label' => __( 'Enable Fixed Background Image', 'kiddies' ),
                'std' => true,
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
     * Output widget.
     *
     * @see WP_Widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        ob_start();
        echo $args['before_widget'];

        do_action( 'kiddies_before_cta');

        $style = 'background-color:'.$instance['bg_overlay_color'].';';
        $style .= 'opacity:'.($instance['overlay_opacity']/100).';';
        $style_text = 'background-color:' . $instance['widget_bg_color_option'] . ';';
        $style_text .= 'color:' . $instance['widget_text_color_option'] . ';';
        $style_top = 'color:' . $instance['top_border_color_option'] . ';';
        $style_bottom = 'color:' . $instance['bottom_border_color_option'] . ';';

        $cta_classes = '';
        if ($instance['enable_fixed_bg']) {
            $cta_classes .= ' data-bg-fixed';
        }
        if ($instance['bg_image']) {
            $cta_classes .= ' data-bg';
        }
        if (!empty($instance['top_border'])) {
            $cta_classes .= ' has-top-pattern-'.$instance['top_border'] ;
        }
        if (!empty($instance['bottom_border'])) {
            $cta_classes .= ' has-bottom-pattern-'.$instance['bottom_border'];
        }
            ?>

        <div class="theme-block theme-cta-block <?php echo $cta_classes; ?>" data-background="<?php echo wp_get_attachment_image_url($instance['bg_image'],'full');?>" style="<?php echo esc_attr($style_text); ?>">
            <?php if ($instance['enable_bg_overlay'] ) { ?>
                <span aria-hidden="true" class="kiddies-block-overlay" style="<?php  echo esc_attr($style); ?>"></span>
            <?php } ?>
            <?php if (!empty($instance['top_border'])) { ?>
                <div class="theme-separator-pattern separator-pattern-top <?php if ($instance['flip_1']) { echo 'separator-pattern-flip ';} ?><?php echo($instance['top_border']); ?>-section-image" style="<?php echo esc_attr($style_top);?>">
                    <?php kiddies_theme_svg($instance['top_border']); ?>
                </div>
            <?php } ?>
            <div class="kiddies-cta-inner-wrapper kiddies-block-inner-wrapper">
                <?php if ($instance['title']) : ?>
                    <h2 class="entry-title entry-title-large animate__animated animate__fadeInUp animate__delay-1s">
                        <?php echo esc_html($instance['title']); ?>
                    </h2>
                <?php endif;?>

                <?php if ($instance['title_text']) : ?>
                    <h3 class="entry-title entry-title-big animate__animated animate__fadeInUp animate__delay-2s">
                        <?php echo esc_html($instance['title_text']); ?>
                    </h3>
                <?php endif;?>

                <?php if ($instance['desc']) : ?>
                    <div class="entry-summary animate__animated animate__fadeInUp animate__delay-3s">
                        <?php echo wpautop(wp_kses_post($instance['desc'])); ?>
                    </div>
                <?php endif;?>

                <?php if ($instance['btn_text']) : ?>
                    <footer class="entry-footer animate__animated animate__fadeInUp animate__delay-4s">
                        <a href="<?php echo ($instance['btn_link']) ? esc_url($instance['btn_link']): '';?>" target="<?php echo ($instance['link_target']) ? "_blank": '_self';?>" class="theme-button">
                            <?php echo esc_html(($instance['btn_text']));?>
                        </a>
                    </footer>
                <?php endif; ?>

            </div>
            <?php if (!empty($instance['bottom_border'])) { ?>
                <div class="theme-separator-pattern separator-pattern-bottom <?php if ($instance['flip_2']) { echo 'separator-pattern-flip ';} ?> <?php echo($instance['bottom_border']); ?>-section-image"  style="<?php echo esc_attr($style_bottom);?>">
                    <?php kiddies_theme_svg($instance['bottom_border']); ?>
                </div>
            <?php } ?>
        </div>


        <?php

        do_action( 'kiddies_after_cta');

        echo $args['after_widget'];

        echo ob_get_clean();
    }

}