<?php
$_block = 'upcoming-events-list';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$upcoming_headline = get_field('upcoming_events_list_headline') ?? '';
	$upcoming_excerpt = get_field('upcoming_events_list_excerpt') ?? '';
	$upcoming_edit_type = get_field('automatic_or_manual') ?? '';
	$upcoming_offset = get_field('offset_list_by_1') ?? '';
	$upcoming_list_manual = get_field('upcoming_events_list_manual') ?? '';
?>
	
	<?php if($upcoming_edit_type == 'automatic'): ?>
				
				
				
		<?php
			
			if($upcoming_offset == 'yes') {
				$offset = 1;
			} else {
				$offset = 0;
			}
			
			$today = date("Y.m.d");
			
	        $args = array(
	          'post_type'   => 'events',
	          'meta_key' 	=> 'event_date',
	          'post_status' => 'publish',
	          'orderby' => 'meta_value',
	          'order'		=> 'ASC', 
	          'offset' => $offset,
	          'meta_query' => array(
		          array( 
		          	'key'  => 'event_date',
		          	'value' => $today,
		          	'compare' => '>=',
		          	'type' => 'DATE'
		          )
		      	)
	         );
	         
	        $upcoming_event = new WP_Query( $args );
	        if( $upcoming_event->have_posts() ) : 
	    ?>

		<section class="contentBox greyBorderTop lightInnerShadow ">
			<div class="grid-container full">
				<div class="grid-x grid-padding-x grid-margin-x align-center">
					<div class="cell medium-8 large-6 text-center sectionHeader">
						<h3><?php echo($upcoming_headline); ?></h3>
						
					</div>
				</div>
				<div class="grid-x grid-padding-x grid-padding-y small-up-1 medium-up-2 large-up-2 eventList">
					
					
					
					<?php while( $upcoming_event->have_posts() ) : $upcoming_event->the_post(); 
						$upcoming_event_start_date = get_field('event_start_date', get_the_ID());
						$upcoming_event_date = get_field('event_date', get_the_ID());
						$upcoming_event_time_from = get_field('time_form', get_the_ID());
						$upcoming_event_time_to = get_field('time_to', get_the_ID());
						$upcoming_event_language = get_field('language', get_the_ID());
						$upcoming_event_location = get_field('location_venue', get_the_ID());
						$upcoming_event_excerpt = get_field('event_excerpt', get_the_ID());
						$upcoming_event_media = get_field('event_media', get_the_ID());
						$upcoming_event_speakers = get_field('contacts_select', get_the_ID());
						 
					?>
					<div class="cell">
						<div class="eventBox">
							<div class="grid-x">
								<div class="cell large-4 large-order-2">
									<div class="imgBox <?php if($upcoming_event_media['image_filter'] == 'grayscale100'): ?>grayscale100 <?php elseif ($upcoming_event_media['image_filter'] == 'grayscale60'): ?>grayscale60  <?php elseif ($upcoming_event_media['image_filter'] == 'grayscale50'): ?>grayscale50 <?php elseif ($upcoming_event_media['image_filter'] == 'grayscale40'): ?>grayscale40 <?php elseif ($upcoming_event_media['image_filter'] == 'nofilter'): ?>noFilter <?php else: ?> <?php endif; ?>">
										<div class="eventLabel"><i class="fa-regular fa-flag"></i> <?php echo($upcoming_event_language); ?></div>
										<a href="<?php the_permalink();?>"><?php if ($upcoming_event_media['main_image']): ?><img src="<?php echo esc_url( $upcoming_event_media['main_image']['url'] ); ?>" alt="<?php echo esc_attr( $upcoming_event_media['main_image']['alt'] ); ?>" /><?php endif; ?></a>
									</div>
								</div>
								<div class="cell large-8 large-order-1">
									<div class="textBox">
										<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
										<p><span class="eventDate"><i class="fa-regular fa-calendar"></i><strong><?php if($upcoming_event_start_date !=''): ?><?php if($upcoming_event_start_date == $upcoming_event_date): ?><?php echo($upcoming_event_start_date); ?><?php else: ?><?php echo($upcoming_event_start_date); ?> - <?php echo($upcoming_event_date); ?><?php endif; ?><?php else: ?><?php echo($upcoming_event_date); ?><?php endif; ?></strong></span><span class="eventTime"><i class="fa-regular fa-clock"></i> <strong><?php echo($upcoming_event_time_from); ?> - <?php echo($upcoming_event_time_to); ?></strong></span></p>
										<?php echo($upcoming_event_excerpt); ?>
										
										
										<?php
											$upcoming_event_speakers_list = $upcoming_event_speakers;
											if( $upcoming_event_speakers_list ): 
										?>
											<p>
											<?php foreach( $upcoming_event_speakers_list as $upcoming_speakers ): 
												$upcoming_event_speaker_name = get_the_title( $upcoming_speakers->ID );
												$upcoming_event_speaker_title = get_field('contact_title', $upcoming_speakers->ID );
												$upcoming_event_speaker_institution = get_field('institution_company', $upcoming_speakers->ID );
											?>
												<span class="eventPerson"><i class="fa-solid fa-user"></i> <strong><?php echo($upcoming_event_speaker_name); ?></strong> <!--(<?php echo($upcoming_event_speaker_institution); ?>)--></span>
											<?php endforeach; ?>
											</p>
										<?php endif; ?>
										
									</div>
								</div>
								
							</div>
						</div>
					</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
		<?php endif; ?>
	<?php else: ?>
		    	
    	<?php
			$upcoming_event_list = $upcoming_list_manual;
			if( $upcoming_event_list ): 
		?>
		<section class="contentBox greyBorderTop lightInnerShadow ">
			<div class="grid-container full">
				<div class="grid-x grid-padding-x grid-margin-x align-center">
					<div class="cell medium-8 large-6 text-center sectionHeader">
						<h3><?php echo($upcoming_headline); ?></h3>
						
					</div>
				</div>
				<div class="grid-x grid-padding-x grid-padding-y small-up-1 medium-up-2 large-up-2 eventList">
					    
				    <?php foreach( $upcoming_event_list as $upcoming_event_manual ): 
						$manual_upcoming_name = get_the_title( $upcoming_event_manual->ID );
						$manual_upcoming_link = get_the_permalink( $upcoming_event_manual->ID );
						$manual_upcoming_date = get_field('event_date', $upcoming_event_manual->ID );
						$manual_upcoming_time_from = get_field('time_form', $upcoming_event_manual->ID );
						$manual_upcoming_time_to = get_field('time_to', $upcoming_event_manual->ID );
						$manual_upcoming_language = get_field('language', $upcoming_event_manual->ID );
						$manual_upcoming_location = get_field('location_venue', $upcoming_event_manual->ID );
						$manual_upcoming_excerpt = get_field('event_excerpt', $upcoming_event_manual->ID );
						$manual_upcoming_media = get_field('event_media', $upcoming_event_manual->ID );
						$manual_upcoming_speakers = get_field('contacts_select', $upcoming_event_manual->ID );
						?>
						
						<div class="cell">
							<div class="eventBox">
								<div class="grid-x">
									<div class="cell large-4 large-order-2">
										<div class="imgBox">
											<div class="eventLabel"><i class="fa-regular fa-flag"></i> <?php echo($manual_upcoming_language); ?></div>
											<a href="<?php echo($manual_upcoming_link); ?>"><?php if ($manual_upcoming_media['main_image']): ?><img src="<?php echo esc_url( $manual_upcoming_media['main_image']['url'] ); ?>" alt="<?php echo esc_attr( $manual_upcoming_media['main_image']['alt'] ); ?>" /><?php endif; ?></a>
										</div>
									</div>
									<div class="cell large-8 large-order-1">
										<div class="textBox">
											<h4><a href="<?php echo($manual_upcoming_link); ?>"><?php echo($manual_upcoming_name); ?></a></h4>
											<p><span class="eventDate"><i class="fa-regular fa-calendar"></i><strong><?php echo($manual_upcoming_date); ?></strong></span><span class="eventTime"><i class="fa-regular fa-clock"></i> <strong><?php echo($manual_upcoming_time_from); ?> - <?php echo($manual_upcoming_time_to); ?></strong></span></p>
											<p><?php echo($manual_upcoming_excerpt); ?></p>
											<?php
												$manual_upcoming_speakers_list = $manual_upcoming_speakers;
												if( $manual_upcoming_speakers_list ): 
											?>
												<p>
												<?php foreach( $upcoming_event_speakers_list as $manual_upcoming_speakers ): 
													$manual_upcoming_event_speaker_name = get_the_title( $manual_upcoming_speakers->ID );
													$manual_upcoming_event_speaker_title = get_field('contact_title', $manual_upcoming_speakers->ID );
													$manual_upcoming_event_speaker_institution = get_field('institution_company', $manual_upcoming_speakers->ID );
												?>
													<span class="eventPerson"><i class="fa-solid fa-user"></i> <strong><?php echo($manual_upcoming_event_speaker_name); ?></strong> (<?php echo($manual_upcoming_event_speaker_institution); ?>)</span>
												<?php endforeach; ?>
												</p>
											<?php endif; ?>
											
										</div>
									</div>
									
								</div>
							</div>
						</div>
							
				        
				    <?php endforeach; ?>
				</div>
			</div>
		</section>
		<?php endif; ?>
		    	
	<?php endif; ?>
				
			
<?php endif; ?>