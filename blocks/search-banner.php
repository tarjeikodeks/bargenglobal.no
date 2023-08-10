<?php
$_block = 'excerpt';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$excerpt = get_field('excerpt') ?? '';
?>
	<section class="contentBox grey minPadding lightInnerShadow ">
		<div class="grid-container fluid">
			<div class="grid-x grid-padding-x grid-margin-x align-center">
				<div class="cell medium-8 large-5 text-center sectionHeader">
					<h3>Events</h3>
					<?php get_search_form(); ?>

					
				</div>
			</div>
			
		
		</div>
	</section>
<?php endif; ?>