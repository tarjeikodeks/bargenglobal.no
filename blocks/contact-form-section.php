<?php
$_block = 'contact-form-section';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$headline = get_field('section_header');
	$short_description = get_field('short_descripion');	
?>

	
	<section class="contentBox greyBorderTop grey minPadding lightInnerShadow ">
		<div class="grid-container">
			<div class="grid-x align-center">
				<div class="cell medium-8 large-7 text-center sectionHeader pageForm">
					<h3><?php echo($headline); ?></h3>
					<?php echo($short_description); ?>
					<?php echo FrmFormsController::get_form_shortcode( array( 'id' => 1 ) ); ?>
				</div>
			</div>
		</div>
	</section>

	
<?php endif; ?>