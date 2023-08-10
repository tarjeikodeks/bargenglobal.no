<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kodeks
 */

get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>
	
	<?php the_title(); ?>
	
    <?php the_content(); ?>
	
    <?php endwhile; ?>
    
<?php get_footer(); ?>