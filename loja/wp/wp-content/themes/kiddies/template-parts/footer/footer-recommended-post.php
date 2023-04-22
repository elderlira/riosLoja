<?php

/**
 * Displays recommended post on footer.
 *
 * @package Kiddies
 */
$enable_category_meta = kiddies_get_option('enable_category_meta');
$enable_date_meta = kiddies_get_option('enable_date_meta');
$enable_post_excerpt = kiddies_get_option('enable_post_excerpt');
$enable_author_meta = kiddies_get_option('enable_author_meta');
$footer_recommended_post_title = kiddies_get_option('footer_recommended_post_title');
$select_cat_for_footer_recommended_post = kiddies_get_option('select_cat_for_footer_recommended_post');
?>
<section class="site-section site-recommendation">
    <div class="wrapper">
        <div class="column-row">
            <div class="column column-12">
                <header class="section-header site-section-header">
                    <h2 class="site-section-title text-center site-section-title-large mb-40">
                        <?php echo esc_html($footer_recommended_post_title); ?>
                    </h2>
                </header>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <div class="column-row">
            <?php $footer_recommended_post_query = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 6, 'post__not_in' => get_option("sticky_posts"), 'category_name' => esc_html($select_cat_for_footer_recommended_post)));
            if ($footer_recommended_post_query->have_posts()) :
                while ($footer_recommended_post_query->have_posts()) : $footer_recommended_post_query->the_post();
                    if (has_post_thumbnail()) {
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                        $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                    }
            ?>
                    <div class="column column-4 column-sm-12">
                        <article id="post-<?php the_ID(); ?>" <?php post_class('theme-recommended-post'); ?>>

                            <?php if (has_post_thumbnail()) : ?>
                                <div class="entry-image entry-border-radius">
                                    <a href="<?php the_permalink() ?>">
                                        <?php
                                        the_post_thumbnail('medium_large', array(
                                            'alt' => the_title_attribute(array(
                                                'echo' => false,
                                            )),
                                        ));
                                        ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if ($enable_category_meta) { ?>
                                <div class="entry-categories mt-20">
                                    <?php kiddies_post_category(); ?>
                                </div>
                            <?php } ?>

                            <header class="entry-header">
                                <?php the_title('<h3 class="entry-title entry-title-medium"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h3>'); ?>
                            </header>

                            <?php if ($enable_post_excerpt) { ?>
                                <div class="entry-content">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php } ?>
                            <?php if ($enable_date_meta) {
                                kiddies_posted_on();
                            } ?>
                            <?php if ($enable_author_meta) {
                                kiddies_posted_by();
                            } ?>
                        </article>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>
        </div>
    </div>
</section>
<?php endif; ?>