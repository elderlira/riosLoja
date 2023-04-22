<?php
/**
 * Displays progressbar
 *
 * @package Kiddies
 */

$show_progressbar = kiddies_get_option( 'show_progressbar' );

if ( $show_progressbar ) :
	$progressbar_position = kiddies_get_option( 'progressbar_position' );
	echo '<div id="kiddies-progress-bar" class="theme-progress-bar ' . esc_attr( $progressbar_position ) . '"></div>';
endif;
