<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kiddies
 */
?>
<?php if (!is_page_template( 'template-parts/full-width-page-template.php' )) { ?>
<?php 
$enable_footer_recommended_post_section = kiddies_get_option('enable_footer_recommended_post_section');
if ($enable_footer_recommended_post_section) {
    get_template_part('template-parts/footer/footer-recommended-post');
}
    get_template_part('template-parts/footer/footer-widgets-full'); ?>
<?php } ?>
<?php do_action('kiddies_before_footer'); ?>

<?php
$is_sticky_footer = kiddies_get_option('enable_footer_sticky');
?>
<footer id="colophon" class="site-footer <?php echo ($is_sticky_footer) ? 'site-footer-sticky' : ''; ?> ">
    <div class="theme-separator-pattern separator-pattern-top spacer-section-image">
        <?php kiddies_theme_svg('spacer'); ?>
    </div>

    <div class="wrapper">
        <?php get_template_part('template-parts/footer/footer-widgets'); ?>
        <?php get_template_part('template-parts/footer/footer-info'); ?>
    </div>

    <?php
    $enable_scroll_to_top = kiddies_get_option('enable_scroll_to_top');
    if ($enable_scroll_to_top) {
    ?>
        <a id="theme-scroll-to-start" href="javascript:void(0)">
            <span class="screen-reader-text"><?php _e('Scroll to top', 'kiddies'); ?></span>
            <?php kiddies_theme_svg('arrow-up'); ?>
        </a>
    <?php
    }
    ?>

    <!-- Custom cursor -->
    <div class="cursor-dot-outline"></div>
    <div class="cursor-dot"></div>
    <!-- .Custom cursor -->

</footer><!-- #colophon -->



<?php do_action('kiddies_after_footer'); ?>

</div><!-- #page -->

<?php do_action('kiddies_after_site'); ?>

<?php wp_footer(); ?>


</body>

</html>