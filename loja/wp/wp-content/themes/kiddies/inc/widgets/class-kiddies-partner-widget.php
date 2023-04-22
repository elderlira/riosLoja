<?php
if (!defined('ABSPATH')) {
    exit;
}

class Kiddies_Partner extends Kiddies_Widget_Base
{
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_kiddies_partner';
        $this->widget_description = __("Displays fullwidth partner section", 'kiddies');
        $this->widget_id = 'kiddies_partner';
        $this->widget_name = __('Kiddies: Fullwidth Partner Widget', 'kiddies');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'kiddies'),
            ),
            'description' => array(
                'type' => 'textarea',
                'label' => __('Description', 'kiddies'),
            ),
            'featured_image_1'  => array(
                'type'  => 'image',
                'label' => __('Partner Image 1', 'kiddies'),
            ),
            'featured_image_2'  => array(
                'type'  => 'image',
                'label' => __('Partner Image 2', 'kiddies'),
            ),
            'featured_image_3'  => array(
                'type'  => 'image',
                'label' => __('Partner Image 3', 'kiddies'),
            ),
            'featured_image_4'  => array(
                'type'  => 'image',
                'label' => __('Partner Image 4', 'kiddies'),
            ),
            'featured_image_5'  => array(
                'type'  => 'image',
                'label' => __('Partner Image 5', 'kiddies'),
            ),
            'featured_image_6'  => array(
                'type'  => 'image',
                'label' => __('Partner Image 6', 'kiddies'),
            ),
            'widget_text_color_option' => array(
                'type' => 'color',
                'label' => __( 'Widget Text Color', 'kiddies' ),
                'std' => '#404040',
            ),
            'widget_bg_color_option' => array(
                'type' => 'color',
                'label' => __( 'Widget Background Color', 'kiddies' ),
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
     * @param array $args
     * @param array $instance
     * @see WP_Widget
     *
     */
    public function widget($args, $instance)
    {
        ob_start();
        echo $args['before_widget'];
        do_action('kiddies_before_partner_with_image');
        $style = 'background-color:'.$instance['bg_overlay_color'].';';
        $style .= 'opacity:'.($instance['overlay_opacity']/100).';';
        $style_text = 'background-color:' . $instance['widget_bg_color_option'] . ';';
        $style_text .= 'color:' . $instance['widget_text_color_option'] . ';';
        $style_top = 'color:' . $instance['top_border_color_option'] . ';';
        $style_bottom = 'color:' . $instance['bottom_border_color_option'] . ';';
        $partner_image = 'medium';
        $partner_classes = '';
        if ($instance['enable_fixed_bg']) {
            $partner_classes .= ' data-bg-fixed';
        }
        if ($instance['bg_image']) {
            $partner_classes .= ' data-bg';
        }
        if (!empty($instance['top_border'])) {
            $partner_classes .= ' has-top-pattern-'.$instance['top_border'] ;
        }
        if (!empty($instance['bottom_border'])) {
            $partner_classes .= ' has-bottom-pattern-'.$instance['bottom_border'];
        }
?>
        <div class="theme-block theme-partner-block <?php echo $partner_classes; ?>" data-background="<?php echo wp_get_attachment_image_url($instance['bg_image'],'full');?>" style="<?php echo esc_attr($style_text); ?>">
            <?php if ($instance['enable_bg_overlay'] ) { ?>
                <span aria-hidden="true" class="kiddies-block-overlay" style="<?php  echo esc_attr($style); ?>"></span>
            <?php } ?>
            <?php if (!empty($instance['top_border'])) { ?>
                <div class="theme-separator-pattern separator-pattern-top <?php if ($instance['flip_1']) { echo 'separator-pattern-flip ';} ?> <?php echo($instance['top_border']); ?>-section-image" style="<?php echo esc_attr($style_top);?>">
                    <?php kiddies_theme_svg($instance['top_border']); ?>
                </div>
            <?php } ?>
        <div class="theme-block-panel partner-block-panel">
            <div class="wrapper wrapper-small">
                <?php if (!empty($instance['title'])) { ?>
                    <header class="theme-block-header text-center mb-50">
                        <h2 class="theme-block-title theme-block-title-large">
                            <?php echo esc_html($instance['title']); ?>
                        </h2>
                        <div class="entry-summary"><?php echo esc_html($instance['description']); ?></div>
                    </header>
                <?php } ?>
            </div>

            <div class="wrapper">
                <div class="column-row">
                    <div class="column column-12 column-sm-12">

                        <div class="theme-brand-panel">
                            <?php for ($i = 1; $i <= 6; $i++) {
                                if (!empty($instance['featured_image_' . $i])) { ?>
                                    <div class="theme-brand-logo">
                                        <div class="data-bg data-bg-thumbnail data-bg-unstyled" data-background="<?php echo wp_get_attachment_image_url($instance['featured_image_' . $i], $partner_image, ''); ?>"></div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
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
        do_action('kiddies_after_partner_with_image');
        echo $args['after_widget'];

        echo ob_get_clean();
    }
}
