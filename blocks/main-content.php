<?php
$_block = 'main-content';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$headline = get_field('headline') ?? '';
	$excerpt = get_field('excerpt') ?? '';
	$content_area = get_field('content_area') ?? '';
?>

	<section class="contentBox greyBorderTop lightInnerShadow <?= $_block ?>">
   
	    <div class="grid-container">
		    
		    <div class="grid-x align-center">
			    
			    <div class="large-10 cell contentHead">
				    <?php if ($headline) : ?>
				    <h1><?php echo $headline ?></h1>
				    <?php endif; ?>
				    <?php if ($excerpt) : ?>
				    <p><?php echo $excerpt ?></p>
				    <?php endif; ?>
			    </div>
			  
			    
			    <div class="large-10 cell contentBody">
				    <div class="grid-x">
					    <?php if(get_field('with_sidebar') == 'yes'): ?> 
						    <div class="cell medium-7 textContent">
							    <?php echo $content_area ?>
						    </div>
						    <?php if( have_rows('sidebar_boxes') ): ?>
						    	<div class="cell auto"></div>
							    <div class="cell medium-4">
								    <?php while( have_rows('sidebar_boxes') ): the_row(); 
								        $box_title = get_sub_field('box_title');
								        $box_content = get_sub_field('box_content');
								        $box_button = get_sub_field('box_button');
								    ?>
								    <div class="contentInfoBox">
								    	<h4><?php echo $box_title ?></h4>
								    	<?php echo $box_content ?>
								    	<?php if( $box_button ): 
										    $link_url = $box_button['url'];
										    $link_title = $box_button['title'];
										    $link_target = $box_button['target'] ? $box_button['target'] : '_self';
										    ?>
										    <a class="button lightButton" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
										<?php endif; ?>
								    </div>
								    <?php endwhile; ?>
							    </div>
							<?php endif; ?>
					    <?php else: ?>
					    
						    <div class="cell textContent">
							    <?php echo $content_area ?>
						    </div>
					    <?php endif; ?>
				    </div>
			    </div>
			    
		    </div>
		    
	    </div>

    </section>
<?php endif; ?>