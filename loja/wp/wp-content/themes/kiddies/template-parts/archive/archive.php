<?php
/**
 * Show the excerpt.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kiddies
 * @since Kiddies 1.0.0
 */
if ( absint(kiddies_get_option( 'excerpt_length' )) != '0'){
    the_excerpt();
}