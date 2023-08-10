<?php
$_block = 'event-banner';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$type = get_field('edit_type') ?? '';
	$upcoming = get_field('upcoming_event') ?? '';
	$single_multiple = get_field('single_or_multiple') ?? '';
?>

	<section class="grid-x fullScreen <?= $_block ?>">
		<div class="cell slideshow swiper bannerSwiper" id="frontSlider">
			<div class="swiper-wrapper">
			<?php if($type == 'automatic'): ?>
			
			
				<?php if($single_multiple == 'single'): ?>
				 	<?php $posts_per_page = '1' ?>
				<?php else: ?> 
					<?php $posts_per_page = '6' ?>
				<?php endif; ?>
			
				<?php
					$today = date("Y.m.d");
					
					
			        $args = array(
			          'post_type'   => 'events',
			          'meta_key' 	=> 'event_date',
			          'post_status' => 'publish',
			          'orderby' => 'meta_value',
			          'order'		=> 'ASC',
			          'meta_query' => array(
				          array( 
				          	'key'  => 'event_date',
				          	'value' => $today,
				          	'compare' => '>=',
				          	'type' => 'DATE'
				          )
						),
			          'posts_per_page' => $posts_per_page
			          
			         );
			         
			        $main_event = new WP_Query( $args );
			        if( $main_event->have_posts() ) : 
			    ?>
				
				<?php while( $main_event->have_posts() ) : $main_event->the_post(); 
					$event_date = get_field('event_date', get_the_ID());
					$event_start_date = get_field('event_start_date', get_the_ID());
					$event_time_from = get_field('time_form', get_the_ID());
					$event_time_to = get_field('time_to', get_the_ID());
					$event_language = get_field('language', get_the_ID());
					$event_location = get_field('location_venue', get_the_ID());
					$event_excerpt = get_field('event_excerpt', get_the_ID());
					$event_media = get_field('event_media', get_the_ID());
					$event_speakers = get_field('contacts_select', get_the_ID());
				?>
				<div class="slide swiper-slide">
					
					<div class="slideImage <?php if($event_media['image_filter'] == 'grayscale100'): ?>grayscale100 <?php elseif ($event_media['image_filter'] == 'grayscale60'): ?>grayscale60  <?php elseif ($event_media['image_filter'] == 'grayscale50'): ?>grayscale50 <?php elseif ($event_media['image_filter'] == 'grayscale40'): ?>grayscale40 <?php elseif ($event_media['image_filter'] == 'nofilter'): ?>noFilter <?php else: ?> <?php endif; ?>">
			
						<?php if ($event_media['main_image']): ?><img src="<?php echo esc_url( $event_media['main_image']['url'] ); ?>" alt="<?php echo esc_attr( $event_media['main_image']['alt'] ); ?>" /><?php endif; ?>
					
					</div>
					<div class="slideContent" id="slideContent">
						<div class="grid-container">
							<div class="grid-x grid-padding-x grid-margin-x align-left">
								<div class="cell large-8 medium-12 small-12 slideText text-left ">
									<div class="eventBox">
										<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
										<p><span class="eventDate"><i class="fa-regular fa-calendar"></i><strong><?php if($event_start_date !=''): ?><?php if($event_start_date == $event_date): ?><?php echo($event_start_date); ?><?php else: ?><?php echo($event_start_date); ?> - <?php echo($event_date); ?><?php endif; ?><?php else: ?><?php echo($event_date); ?><?php endif; ?></strong></span><span class="eventTime"><i class="fa-regular fa-clock"></i> <strong><?php if($event_time_to != ''): ?><?php echo($event_time_from); ?> - <?php echo($event_time_to); ?><?php else: ?><?php echo($event_time_from); ?><?php endif; ?></strong></span><span class="eventLang"><i class="fa-regular fa-flag"></i><strong><?php echo($event_language); ?></strong></span></p>
										<p><?php echo($event_excerpt); ?></p>
										
										
										<?php
											$speakers_list = $event_speakers;
											if( $speakers_list ): 
										?>
											<p>
											<?php foreach( $speakers_list as $speakers ): 
												$event_speaker_name = get_the_title( $speakers->ID );
												$event_speaker_title = get_field('contact_title', $speakers->ID );
												$event_speaker_institution = get_field('institution_company', $speakers->ID );
											?>
												<span class="eventPerson"><i class="fa-solid fa-user"></i> <strong><?php echo($event_speaker_name); ?></strong> (<?php echo($event_speaker_institution); ?>)</span>
											<?php endforeach; ?>
											</p>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
		    	</div>
		    	<?php endwhile; wp_reset_postdata(); ?>
		    	<?php endif; ?>
	    	
	    	<?php else: ?>
	    	 	
	    	 	<?php
					$upcoming_list = $upcoming;
					if( $upcoming_list ): 
				?>
					    
				    <?php foreach( $upcoming_list as $upcoming_event ): 
						$manual_event_name = get_the_title( $upcoming_event->ID );
						$manual_event_link = get_the_permalink( $upcoming_event->ID );
						$manual_event_date = get_field('event_date', $upcoming_event->ID );
						$manual_event_time_from = get_field('time_form', $upcoming_event->ID );
						$manual_event_time_to = get_field('time_to', $upcoming_event->ID );
						$manual_event_language = get_field('language', $upcoming_event->ID );
						$manual_event_location = get_field('location_venue', $upcoming_event->ID );
						$manual_event_excerpt = get_field('event_excerpt', $upcoming_event->ID );
						$manual_event_media = get_field('event_media', $upcoming_event->ID );
						$manual_event_speakers = get_field('contacts_select', $upcoming_event->ID );
						?>
							
				        <div class="slide swiper-slide">
							<div class="slideImage <?php if($manual_event_media['image_filter'] == 'grayscale100'): ?>grayscale100 <?php elseif ($manual_event_media['image_filter'] == 'grayscale60'): ?>grayscale60  <?php elseif ($manual_event_media['image_filter'] == 'grayscale50'): ?>grayscale50 <?php elseif ($manual_event_media['image_filter'] == 'grayscale40'): ?>grayscale40 <?php elseif ($manual_event_media['image_filter'] == 'nofilter'): ?>noFilter <?php else: ?> <?php endif; ?>">
					
								<?php if ($manual_event_media['main_image']): ?><img src="<?php echo esc_url( $manual_event_media['main_image']['url'] ); ?>" alt="<?php echo esc_attr( $manual_event_media['main_image']['alt'] ); ?>" /><?php endif; ?>
							
							</div>
							<div class="slideContent" id="slideContent">
								<div class="grid-container">
									<div class="grid-x grid-padding-x grid-margin-x align-left">
										<div class="cell large-8 medium-12 small-12 slideText text-left ">
											<div class="eventBox">
												<h2><a href="<?php echo($manual_event_link); ?>"><?php echo($manual_event_name); ?></a></h2>
												<p><span class="eventDate"><i class="fa-regular fa-calendar"></i><strong><?php echo($manual_event_date); ?></strong></span><span class="eventTime"><i class="fa-regular fa-clock"></i> <strong><?php echo($manual_event_time_from); ?> - <?php echo($manual_event_time_to); ?></strong></span><span class="eventLang"><i class="fa-regular fa-flag"></i><strong><?php echo($manual_event_language); ?></strong></span></p>
												<p><?php echo($manual_event_excerpt); ?></p>
												<?php
													$manual_speakers_list = $manual_event_speakers;
													if( $manual_speakers_list ): 
												?>
													<p>
													<?php foreach( $manual_speakers_list as $manual_speakers ): 
														$manual_event_speaker_name = get_the_title( $manual_speakers->ID );
														$manual_event_speaker_title = get_field('contact_title', $manual_speakers->ID );
														$manual_event_speaker_institution = get_field('institution_company', $manual_speakers->ID );
													?>
														<span class="eventPerson"><i class="fa-solid fa-user"></i> <strong><?php echo($manual_event_speaker_name); ?></strong> (<?php echo($manual_event_speaker_institution); ?>)</span>
													<?php endforeach; ?>
													</p>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							
				    	</div>
				    <?php endforeach; ?>
				    
				<?php endif; ?>
	    	 	
	    	<?php endif; ?>
			</div>
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
			<div class="swiper-pagination"></div>
	    	
		</div>
		
		
	</section>

	
<?php endif; ?>