<?php
$_block = 'hero_image';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$image = get_field('hero_image') ?? '';
	$image_title = get_field('hero_image_title') ?? '';
	$image_text = get_field('hero_image_text') ?? '';
	$image_filter = get_field('image_filter') ?? '';
?>

	<section class="grid-x fullScreen <?= $_block ?>">
		<div class="cell slideshow" id="subPageSlider">
			<div class="slide">
				<div class="slideContent" id="slideContent">
					<div class="grid-container">
						<div class="grid-x grid-padding-x grid-margin-x align-left">
							<div class="cell large-8 slideText text-left scrollOut">
								<div class="eventBox">
									<?php if( !empty( $image_title ) ): ?>
									<h2><?php echo $image_title ?></h2>
									<?php endif; ?>
									<?php if( !empty( $image_text ) ): ?>
									<p><?php echo $image_text ?></p>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="slideImage <?php if($image_filter == 'grayscale60'): ?>grayscale60 <?php elseif ($image_filter == 'grayscale50'): ?>grayscale50 <?php elseif ($image_filter == 'grayscale40'): ?>grayscale40 <?php elseif ($image_filter == 'nofilter'): ?>noFilter <?php else: ?> <?php endif; ?>">
					<?php if( !empty( $image ) ): ?>
						<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>
				</div>
				
	    	</div>
		</div>
		
	</section>

  
<?php endif; ?>