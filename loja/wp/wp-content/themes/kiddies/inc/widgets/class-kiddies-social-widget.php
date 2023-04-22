<?php

if (!defined('ABSPATH')) {
    exit;
}

class Kiddies_Social_Menu extends Kiddies_Widget_Base
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_kiddies_social_menu';
        $this->widget_description = __("Displays social menu if you have set it.", 'kiddies');
        $this->widget_id = 'kiddies_social_menu';
        $this->widget_name = __('Kiddies: Sidebar Social Menu', 'kiddies');
        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('Title', 'kiddies'),
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

        $this->widget_start($args, $instance);

        do_action( 'kiddies_before_social_menu');

        $style = $instance['style'];

        ?>
        <div class="kiddies-social-menu-widget <?php echo esc_attr($style);?>">
            <?php

            if ( has_nav_menu( 'social-menu' ) ) {
                wp_nav_menu(array(
                    'theme_location' => 'social-menu',
                    'container_class' => 'footer-navigation',
                    'fallback_cb' => false,
                    'depth' => 1,
                    'menu_class' => 'kiddies-social-icons reset-list-style',
                    'link_before' => '<span class="screen-reader-text">',
                    'link_after' => '</span>',
                ) );
            }else{
                esc_html_e( 'Social menu is not set. You need to create menu and assign it to Social Menu on Menu Settings.', 'kiddies' );
            }
            ?>
        </div>
        <?php

        do_action( 'kiddies_after_social_menu');

        $this->widget_end($args);

        echo ob_get_clean();
    }
}