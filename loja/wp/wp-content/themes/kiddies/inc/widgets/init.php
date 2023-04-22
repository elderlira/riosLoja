<?php

/* Theme Widget sidebars. */
require get_template_directory() . '/inc/widgets/widgets.php';
require get_template_directory() . '/inc/widgets/widget-base/widgetbase.php';

require get_template_directory() . '/inc/widgets/class-kiddies-recent-widget.php';
require get_template_directory() . '/inc/widgets/class-kiddies-social-widget.php';
require get_template_directory() . '/inc/widgets/class-kiddies-author-widget.php';
require get_template_directory() . '/inc/widgets/class-kiddies-tab-widget.php';

require get_template_directory() . '/inc/widgets/class-kiddies-cta-widget.php';
require get_template_directory() . '/inc/widgets/class-kiddies-newsletter-widget.php';

require get_template_directory() . '/inc/widgets/class-kiddies-about-widget.php';
require get_template_directory() . '/inc/widgets/class-kiddies-school-widget.php';
require get_template_directory() . '/inc/widgets/class-kiddies-team-widget.php';
require get_template_directory() . '/inc/widgets/class-kiddies-contact-widget.php';
require get_template_directory() . '/inc/widgets/class-kiddies-testimonial-widget.php';
require get_template_directory() . '/inc/widgets/class-kiddies-partner-widget.php';


/* Register site widgets */
if ( ! function_exists( 'kiddies_widgets' ) ) :
    /**
     * Load widgets.
     *
     * @since 1.0.0
     */
    function kiddies_widgets() {
        register_widget( 'Kiddies_Recent_Posts' );
        register_widget( 'Kiddies_Social_Menu' );
        register_widget( 'Kiddies_Author_Info' );
        register_widget( 'Kiddies_Mailchimp_Form' );
        register_widget( 'Kiddies_Call_To_Action' );
        register_widget( 'Kiddies_Tab_Posts' );
        register_widget( 'Kiddies_About' );
        register_widget( 'Kiddies_Classes' );
        register_widget( 'Kiddies_Team' );
        register_widget( 'Kiddies_Contact' );
        register_widget( 'Kiddies_Testimonial' );
        register_widget( 'Kiddies_Partner' );
    }
endif;
add_action( 'widgets_init', 'kiddies_widgets' );