<?php
/**
 * Template Name: Full Width Page Template
 *
 * @package Kiddies
 * @since Kiddies 1.0.0
 */
get_header();
    while (have_posts()) : the_post();

        the_content();
        
    endwhile; // End of the loop.

get_footer();