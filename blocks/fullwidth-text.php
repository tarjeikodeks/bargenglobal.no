<?php
$_block = 'fullwidth-text';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$content = get_field('fullwidth_text') ?? '';
?>

    <section class=" <?= $_block ?>">
	    <div class="grid-container">
		    <div class="large-10 cell contentBody">
			    <div class="grid-x align-center">
				    <div class="cell large-10 textContent">
					    <?php echo $content ?>
				    </div>
			    </div>
		    </div>
	    </div>

    </section>
<?php endif; ?>