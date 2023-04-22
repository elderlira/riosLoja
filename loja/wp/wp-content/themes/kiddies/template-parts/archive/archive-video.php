<?php
/**
 * Show the appropriate content for the Video post format.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kiddies
 * @since Kiddies 1.0.0
 */

$content = get_the_content();

if ( has_block( 'core/video', $content ) ) {
	kiddies_print_first_instance_of_block( 'core/video', $content );
} elseif ( has_block( 'core/embed', $content ) ) {
	kiddies_print_first_instance_of_block( 'core/embed', $content );
} else {
	kiddies_print_first_instance_of_block( 'core-embed/*', $content );
}

// Add the excerpt.
if ( absint(kiddies_get_option( 'excerpt_length' )) != '0'){
    the_excerpt();
}