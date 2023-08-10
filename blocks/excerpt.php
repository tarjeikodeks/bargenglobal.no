<?php
$_block = 'excerpt';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$excerpt = get_field('excerpt') ?? '';
?>
	<section class="contentBox greyBorderTop lightInnerShadow <?= $_block ?>">
		<div class="grid-container">
			<div class="grid-x align-center">
				<div class="large-10 cell contentHead">
					<?php echo $excerpt ?>
				</div>
			</div>
		</div>
    </section>
<?php endif; ?>