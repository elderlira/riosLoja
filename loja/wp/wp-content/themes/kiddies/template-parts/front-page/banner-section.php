<?php

/**
 * Displays Banner Section
 *
 * @package Kiddies
 */
$is_banner_section = kiddies_get_option('enable_banner_section');
$banner_section_cat = kiddies_get_option('banner_section_cat');
$banner_section_slider_layout = kiddies_get_option('banner_section_slider_layout');
$number_of_slider_post = kiddies_get_option('number_of_slider_post');
$enable_banner_cat_meta = kiddies_get_option('enable_banner_cat_meta');
$enable_banner_author_meta = kiddies_get_option('enable_banner_author_meta');
$enable_banner_date_meta = kiddies_get_option('enable_banner_date_meta');
$enable_banner_post_description = kiddies_get_option('enable_banner_post_description');
$slider_post_content_alignment = kiddies_get_option('slider_post_content_alignment');

$slider_top_svg_option = kiddies_get_option('slider_top_svg_option');
$top_svg_flip_enable = kiddies_get_option('top_svg_flip_enable');
$slider_bottom_svg_option = kiddies_get_option('slider_bottom_svg_option');
$bottom_svg_flip_enable = kiddies_get_option('bottom_svg_flip_enable');

$featured_image = "";
if ($banner_section_slider_layout == 'site-banner-layout-1') {
    $banner_alignment_class = 'align-self-center';
} else {
    $banner_alignment_class = 'align-self-center';
}


$kiddies_slider_from = esc_attr(kiddies_get_option('select_slider_from'));
switch ($kiddies_slider_from) {
    case 'from-page':
        $kiddies_slider_page_list_array = array();
        for ($i = 1; $i <= $number_of_slider_post; $i++) {
            $kiddies_slider_page_list = kiddies_get_option('select_page_for_slider_' . $i);
            if (!empty($kiddies_slider_page_list)) {
                $kiddies_slider_page_list_array[] =  absint($kiddies_slider_page_list);
            }
        }
        /*page query*/
        $qargs = array(
            'posts_per_page' => esc_attr($number_of_slider_post),
            'orderby' => 'post__in',
            'post_type' => 'page',
            'post__in' => $kiddies_slider_page_list_array,
        );
        break;

    case 'from-category':
        $qargs = array(
            'posts_per_page' => esc_attr($number_of_slider_post),
            'post_type' => 'post',
            'category_name' => $banner_section_cat,
        );
        break;

    default:
        break;
}
?>

<section class="site-section site-banner <?php echo esc_attr($banner_section_slider_layout); ?>">
    <?php if (!empty($slider_top_svg_option)) { ?>
        <div class="theme-separator-pattern separator-pattern-top <?php if ($top_svg_flip_enable) { echo 'separator-pattern-flip ';} ?><?php echo($slider_top_svg_option); ?>-section-image">
            <?php kiddies_theme_svg($slider_top_svg_option); ?>
        </div>
    <?php } ?>
    <div class="theme-banner-slider swiper-container">
        <div class="swiper-wrapper">
            <?php $banner_post_query = new WP_Query($qargs);
            if ($banner_post_query->have_posts()) :
                while ($banner_post_query->have_posts()) : $banner_post_query->the_post();
                    if (has_post_thumbnail()) {
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
                        $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                    }
            ?>
                    <div class="swiper-slide">
                        <div class="slide-inner" <?php if ($banner_section_slider_layout == 'site-banner-layout-1') { echo 'data-swiper-parallax="45%"';}?>>
                            <div class="data-bg-overlay"></div>
                            <div class="data-bg slide-featured-background" data-background="<?php echo esc_url($featured_image); ?>"></div>
                            <div class="slider-content justify-content-center <?php echo $banner_alignment_class; ?> <?php echo $slider_post_content_alignment; ?>">
                                <div class="wrapper wrapper-small">
                                    <?php if ($enable_banner_cat_meta) { ?>
                                        <div class="animate__animated animate__fadeInUp animate__delay-1s">
                                            <?php kiddies_post_category(); ?>
                                        </div>
                                    <?php } ?>

                                    <?php the_title('<h2 class="entry-title entry-title-large animate__animated animate__fadeInUp animate__delay-2s"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>

                                    <?php if ($enable_banner_post_description) { ?>
                                        <div class="entry-summary animate__animated animate__fadeInUp animate__delay-3s">
                                            <?php the_excerpt(); ?>
                                        </div>
                                    <?php } ?>

                                    <div class="animate__animated animate__fadeInUp mt-4 animate__delay-4s">
                                        <?php if ($enable_banner_date_meta) {
                                            kiddies_posted_on();
                                        } ?>
                                        <?php if ($enable_banner_author_meta) {
                                            kiddies_posted_by();
                                        } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            <?php
                endwhile;
                wp_reset_postdata();
            endif; ?>
        </div>

        <?php if ($banner_section_slider_layout == 'site-banner-layout-1') { ?> 
            <div class="swiper-nav-btn">
                <div class="slider-button-prev banner-slider-button"><?php esc_html_e('Prev', 'kiddies'); ?></div>
                <div class="slider-button-next banner-slider-button"><?php esc_html_e('Next', 'kiddies'); ?></div>
            </div>

            <div class="swiper-advance-pagination">
                <div class="swiper-fraction-pagination">
                    <span></span>
                    <span></span>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php } else {?>

        <div class="theme-swiper-control swiper-control">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination theme-swiper-pagination"></div>
        </div>
        <?php } ?>

    </div>

    <?php if (!empty($slider_bottom_svg_option)) { ?>
        <div class="theme-separator-pattern separator-pattern-bottom <?php if ($bottom_svg_flip_enable) { echo 'separator-pattern-flip ';} ?><?php echo($slider_bottom_svg_option); ?>-section-image">
            <?php kiddies_theme_svg($slider_bottom_svg_option); ?>
        </div>
    <?php } ?>

</section>

