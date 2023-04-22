<?php
/**
 * Template Name: Home Page Template
 *
 * @package Kiddies
 * @since Kiddies 1.0.0
 */
get_header();

if (is_front_page() || is_home()) {
    
    if ( is_active_sidebar( 'fullwidth-homepage-widgetarea' )) : ?>

    <section class="site-section theme-widgetarea theme-widgetarea-full theme-widgetarea-homepage" role="complementary">
        <?php dynamic_sidebar( 'fullwidth-homepage-widgetarea' ); ?>
    </section>

    <?php endif; ?>

<?php } ?>
<?php
get_footer();