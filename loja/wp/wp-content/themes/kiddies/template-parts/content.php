<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kiddies
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if (is_single()) {
		global $post;
		$kiddies_post_layout = esc_html(get_post_meta($post->ID, 'kiddies_post_layout', true));
		if (empty($kiddies_post_layout)) {
			$kiddies_post_layout = 'layout-1';
		}
		if ($kiddies_post_layout == "layout-1") { ?>
			<header class="entry-header">
				<?php
				if (is_singular()) :
					the_title('<h1 class="entry-title entry-title-large">', '</h1>');
				else :
					the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
				endif;

				if ('post' === get_post_type()) :
				?>
					<div class="entry-meta">
						<?php
						kiddies_posted_on();
						kiddies_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-image">
				<figure class="featured-media">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('full'); ?>
					</a>

					<?php
					$caption = get_the_post_thumbnail_caption();
					if ($caption) {
					?>
						<figcaption class="wp-caption-text"><?php echo wp_kses_post($caption); ?></figcaption>
					<?php
					}
					?>
					<?php if (kiddies_get_option('show_lightbox_image')) { ?>
						<a href="<?php echo get_the_post_thumbnail_url(); ?>" class="featured-media-fullscreen" data-glightbox="" data-gallery="portfolio">
							<?php kiddies_theme_svg('fullscreen'); ?>
						</a>
					<?php } ?>
				</figure><!-- .featured-media -->
				<?php $display_read_time_in = kiddies_get_option('display_read_time_in');
				if (in_array('single-page', $display_read_time_in)) {
					kiddies_read_time();
				} ?>
			</div><!-- .entry-image -->
		<?php } ?>
	<?php } else { ?>
		<header class="entry-header">
			<?php
			if (is_singular()) :
				the_title('<h1 class="entry-title entry-title-large">', '</h1>');
			else :
				the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
			endif;

			if ('post' === get_post_type()) :
			?>
				<div class="entry-meta">
					<?php
					kiddies_posted_on();
					kiddies_posted_by();
					?>
				</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<?php kiddies_post_thumbnail(); ?>
	<?php } ?>
	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'kiddies'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'kiddies'),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php kiddies_entry_footer_all(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->