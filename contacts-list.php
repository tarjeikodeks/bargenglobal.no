<?php
$_block = 'contacts-list';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$headline = get_field('contacts_list_headline') ?? '';
	$excerpt = get_field('contact_list_excerpt') ?? '';
	$headline_size = get_field('contacts_list_headline_size') ?? '';
?>

	<section class="contentBox lightInnerShadow minPadding  <?= $_block ?>">
   
	    <div class="grid-container">
		    
		    <div class="grid-x">
			    
			    <div class="large-10 cell contentHead">
				    <?php if ($headline) : ?>
				    	<?php if ($headline_size == 'main_header'): ?>
							<h1><?php echo $headline ?></h1>
				    	<?php elseif($headline_size == 'secondary_header'): ?>
				    		<h2><?php echo $headline ?></h3>
				    	<?php else: ?>
				    		<h3><?php echo $headline ?></h3>
				    	<?php endif; ?>
				    <?php endif; ?>
				    <?php if ($excerpt) : ?>
				    <p><?php echo $excerpt ?></p>
				    <?php endif; ?>
			    </div>
			  
			    
			    
				    <?php
					$contacts_list = get_field('contacts_select');
					if( $contacts_list ): ?>
					    <div class="grid-x grid-padding-y grid-margin-x  small-up-1 medium-up-1 large-up-2">
					    <?php foreach( $contacts_list as $contact ): 
							$contact_name = get_the_title( $contact->ID );
							$contact_image = get_field( 'contact_image', $contact->ID );
							$contact_title = get_field( 'contact_title', $contact->ID );
							$contact_excerpt = get_field( 'contact_xcerpt', $contact->ID );
							$contact_institution_company = get_field( 'institution_company', $contact->ID );
							$phone = get_field( 'contact_phone', $contact->ID );
							$cell_phone = get_field( 'contact_cell_phone', $contact->ID );
							$contact_email = get_field( 'contact_email', $contact->ID );
							?>
					        <div class="cell">
						        <div class="contactPersonBox grid-x">
							        <?php if($contact_image): ?>
							        <div class="cell medium-5 imgBox">
								       <a href="#"  data-open="contactModal_<?php echo($contact->ID) ?>"><img src="<?php echo esc_url($contact_image['url']); ?>" alt="<?php echo esc_attr($contact_image['alt']); ?>" /></a> 
							        </div>
							        <?php endif; ?>
							        <div class="cell medium-7 textBox">
							            <h5><a href="#"  data-open="contactModal_<?php echo($contact->ID) ?>"><?php echo esc_html( $contact_name ); ?></a></h5>
							            <span class="contactInstitution"><?php echo ( $contact_title ); ?>, <?php echo ( $contact_institution_company ); ?></span>
							            <p>
											<?php if( !empty( $contact_email ) ): ?><span class="labelName"><i class="fa-regular fa-envelope"></i></span><span class="labelInfo"><a href="mailto:<?php echo esc_html( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a></span><br /><?php endif; ?>
											<?php if( !empty( $phone ) ): ?><span class="labelName"><i class="fa-regular fa-phone"></i></span><span class="labelInfo"><?php echo esc_html( $phone ); ?></span><?php endif; ?>
											<?php if( !empty( $cell_phone ) ): ?><span class="labelName"><i class="fa-regular fa-mobile"></i></span><span class="labelInfo"><?php echo esc_html( $cell_phone ); ?></span><?php endif; ?>
										</p>
										<p>
											<?php echo esc_html( $contact_excerpt ); ?>
										</p>
										
										<a href="#" class="readmore" data-open="contactModal_<?php echo($contact->ID) ?>">Read more</a>
							        </div>
						        </div>
					        </div>
					    <?php endforeach; ?>
					    </div>
					<?php endif; ?>
			    
			    
		    </div>
		    
		    <?php
				$contacts_list = get_field('contacts_select');
				if( $contacts_list ): 
			?>
				   
			    <?php foreach( $contacts_list as $contact ): 
					$contact_name = get_the_title( $contact->ID );
					$contact_image = get_field( 'contact_image', $contact->ID );
					$contact_title = get_field( 'contact_title', $contact->ID );
					$contact_institution_company = get_field( 'institution_company', $contact->ID );
					$contact_excerpt = get_field( 'contact_xcerpt', $contact->ID );
					$contact_description = get_field( 'contact_description', $contact->ID );
					$contact_excerpt = get_field( 'contact_xcerpt', $contact->ID );
					$contact_image_text = get_field( 'contact_image_text', $contact->ID );
					$phone = get_field( 'contact_phone', $contact->ID );
					$cell_phone = get_field( 'contact_cell_phone', $contact->ID );
					$contact_email = get_field( 'contact_email', $contact->ID );
					?>
					
					<div class="reveal large contactModal" id="contactModal_<?php echo($contact->ID) ?>" data-reveal>
						<button class="close-button" data-close aria-label="Close modal" type="button">
							<span aria-hidden="true">&times;</span>
						</button>
						<h2><?php echo( $contact_name ); ?></h2>
						<span class="contactInstitution" style="display: block; margin-bottom: 1rem; font-weight: bold"><?php echo ( $contact_title ); ?>, <?php echo ( $contact_institution_company ); ?></span>
						
						<div class="imgBox">
							<img src="<?php echo esc_url($contact_image['url']); ?>" alt="<?php echo esc_attr($contact_image['alt']); ?>" />
							<?php if($contact_image_text): ?><div class="imgText"><?php echo( $contact_image_text ); ?></div><?php endif; ?>
						</div>
						<p class="lead">
							<?php echo( $contact_excerpt ); ?>
						</p>
						<?php echo($contact_description); ?>
						<p>
							<?php if( !empty( $contact_email ) ): ?><span class="labelName"><i class="fa-regular fa-envelope"></i></span><span class="labelInfo"><a href="mailto:<?php echo esc_html( $contact_email ); ?>"><?php echo esc_html( $contact_email ); ?></a></span><br /><?php endif; ?>
							<?php if( !empty( $phone ) ): ?><span class="labelName"><i class="fa-regular fa-phone"></i></span><span class="labelInfo"><?php echo esc_html( $phone ); ?></span><?php endif; ?>
							<?php if( !empty( $cell_phone ) ): ?><span class="labelName"><i class="fa-regular fa-mobile"></i></span><span class="labelInfo"><?php echo esc_html( $cell_phone ); ?></span><?php endif; ?>
						</p>
					</div>
					
			        
			    <?php endforeach; ?>
			    
			<?php endif; ?>
		    
		    
		    
	    </div>

    </section>
<?php endif; ?>