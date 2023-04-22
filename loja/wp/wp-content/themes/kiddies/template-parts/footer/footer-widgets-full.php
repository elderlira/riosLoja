<?php 
/**
 * Displays before footer widget area.
 *
 * @package Kiddies
 */

if ( is_active_sidebar( 'fullwidth-footer-widgetarea' ) ) : ?>

<div class="theme-widgetarea theme-widgetarea-full theme-widgetarea-footer" role="complementary">
    <?php dynamic_sidebar( 'fullwidth-footer-widgetarea' ); ?>
</div>

<?php endif; ?>