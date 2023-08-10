<?php

/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Kodeks
 */

get_header(); ?>

<section class="contentBox greyBorderTop lightInnerShadow main-content">
	<div class="grid-container">
		<div class="grid-x align-center">
			<div class="large-10 cell contentHead">
				<h1><?= get_field('404_page_heading', 'options') ?: 'Denne siden finnes ikke' ?></h1>
				<p><?= get_field('404_page_text', 'options') ?: '' ?></p>
			</div>
		</div>
	</div>
</section>

<?php
get_footer();
