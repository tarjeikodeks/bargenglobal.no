<?php
$_block = 'contact-info';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$edit_select = get_field('automatic_or_manual');
	$headline = get_field('contact_headline');
	$contact_information = get_field('contact_information');
	$map_headline = get_field('map_headline');
	$google_map = get_field('google_map');
	$visiting_address = get_field('visiting_address', 'option');
	$postal_address = get_field('postal_address', 'option');
	
?>

	
	<section class="contentBox greyBorderTop grey lightInnerShadow">
		<div class="grid-container">
			<div class="grid-x align-center">
				
				<div class="cell contentBody">
					<div class="grid-x">
						
						
				
												
						
						<?php if($edit_select == 'automatic'): ?>
						<div class="cell medium-4 textContent">
							<h3><?php the_field('contact_headline', 'option'); ?></h3>
							<p>
								<strong><?php echo $postal_address['postal_address_headline']; ?></strong><br>
								<?php echo $postal_address['postal_address_name']; ?><br>
								<?php echo $postal_address['postal_street_address']; ?><br>
								<?php echo $postal_address['postal_address_postnumber']; ?> <?php echo $postal_address['postal_address_place']; ?><br />
								<?php echo $postal_address['postal_address_country']; ?>
							</p>
							<p>
								<strong><?php echo $visiting_address['visisting_address_headline']; ?></strong><br>
								<?php echo $visiting_address['street_address']; ?><br>
								<?php echo $visiting_address['postnumber']; ?> <?php echo $visiting_address['visting_place']; ?>
							</p>
							<p>
								<?php if( have_rows('emails', 'option') ): ?>
							
								    <?php while( have_rows('emails', 'option') ): the_row(); ?>
								    	<?php the_sub_field('label'); ?>: <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a><br />
								    <?php endwhile; ?>
								   
								<?php endif; ?>
							</p>
							
							
							
							
						</div>
						<div class="cell auto">
							
						</div>
						<div class="cell medium-7">
							<div class="textContent">
								<h4>Where to find us</h4>
								<?php the_field('google_map', 'option'); ?>
								
									
							</div>
							
						</div>
						<?php else: ?>
						
						<div class="cell medium-4 textContent">
							<h3><?php echo($headline); ?></h3>
							<?php echo($contact_information); ?>
							
							
							
							
						</div>
						<div class="cell auto">
							
						</div>
						<div class="cell medium-7">
							<div class="textContent">
								<h4><?php echo($map_headline); ?></h4>
								<?php echo($google_map); ?>
								
									
							</div>
							
						</div>
							
						
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	
<?php endif; ?>