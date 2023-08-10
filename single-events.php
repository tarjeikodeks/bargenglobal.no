<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kodeks
 */

get_header(); ?>
	
	<?php while ( have_posts() ) : the_post();
		$event_date = get_field('event_date', get_the_ID());
		$event_start_date = get_field('event_start_date', get_the_ID());
		$event_time_form = get_field('time_form', get_the_ID());
		$event_time_to = get_field('time_to', get_the_ID());
		$event_language = get_field('language', get_the_ID());
		$event_event_excerpt = get_field('event_excerpt', get_the_ID());
		$event_event_media = get_field('event_media', get_the_ID());
		$event_main_content = get_field('main_content', get_the_ID());
		$event_button = get_field('event_button', get_the_ID());
		$event_digital_participation = get_field('digital_participation', get_the_ID());
		$event_speakers_headline = get_field('contacts_list_headline', get_the_ID());
		$event_speakers_excerpt = get_field('contact_list_excerpt', get_the_ID());
		$event_speakers = get_field('contacts_select', get_the_ID());
		$event_venue_address = get_field('event_address', get_the_ID());
		$event_url = get_permalink();
	?>
		
		<section class="contentBox greyBorderTop lightInnerShadow ">
			<div class="grid-container">
				<div class="grid-x align-center">
					<div class="large-10 cell eventHead">
						<h1><?php the_title(); ?></h1>
						<div class="eventInfo">
							<span class="eventDate">
								<i class="fa-regular fa-calendar"></i>
								<strong>
									<?php if($event_start_date !=''): ?>
										<?php if($event_start_date == $event_date): ?>
											<?php echo($event_start_date); ?>
										<?php else: ?>
											<?php echo($event_start_date); ?> - <?php echo($event_date); ?>
										<?php endif; ?>
									<?php else: ?>
										<?php echo($event_date); ?>
									<?php endif; ?>
								</strong>
							</span>
							<span class="eventTime"><i class="fa-regular fa-clock"></i> <strong><?php echo($event_time_form); ?> - <?php echo($event_time_to); ?></strong></span><span class="eventLang"><i class="fa-regular fa-flag"></i><strong><?php echo($event_language); ?></strong></span>
							<?php include('template-parts/template-sharing-box.php'); ?>
							
						</div>
						<p>
							<?php echo($event_event_excerpt); ?>
						</p>
				
						
						<?php if ($event_event_media['image_or_video'] == 'image' || $event_event_media['image_or_video'] == ''): ?>
							<?php if ( $event_event_media['main_image']['url'] != '' ): ?>
							<div class="imgBox <?php echo $event_event_media['image_filter']; ?> ">
								<img src="<?php echo esc_url( $event_event_media['main_image']['url'] ); ?>" alt="<?php echo esc_attr( $event_event_media['main_image']['alt'] ); ?>" />
								
								<?php if ($event_event_media['photo_credit']): ?><span class="photoCredit"><?php echo esc_html( $event_event_media['photo_credit'] ); ?></span><?php endif; ?>
							</div>
							<?php endif; ?>
						<?php elseif ($event_event_media['image_or_video'] == 'video'): ?>
							<?php if ($event_event_media['video_embed']): ?>
								<div class="embed-container">
								    <?php echo ($event_event_media['video_embed']); ?>
								</div>
								<style>
								    .embed-container { 
								        position: relative; 
								        padding-bottom: 56.25%;
								        overflow: hidden;
								        max-width: 100%;
								        height: auto;
								        margin-bottom: 3rem;
								    } 
								
								    .embed-container iframe,
								    .embed-container object,
								    .embed-container embed { 
								        position: absolute;
								        top: 0;
								        left: 0;
								        width: 100%;
								        height: 100%;
								    }
								</style>
								
								
							<?php endif; ?>
						<?php elseif ($event_event_media['image_or_video'] == 'audio'): ?>
							<?php if ($event_event_media['audio_embed']): ?>
								<div class="embed-container">
								    <?php echo ($event_event_media['audio_embed']); ?>
								</div>
								<style>
								    .embed-container { 
								        position: relative; 
								        padding-bottom: 56.25%;
								        overflow: hidden;
								        max-width: 100%;
								        height: auto;
								        margin-bottom: 3rem;
								    } 
								
								    .embed-container iframe,
								    .embed-container object,
								    .embed-container embed { 
								        position: absolute;
								        top: 0;
								        left: 0;
								        width: 100%;
								        height: 100%;
								    }
								</style>
								
								
							<?php endif; ?>
						<?php else: ?>
							
						<?php endif; ?>
				
					</div>
					<div class="large-10 cell eventBody">
						<div class="grid-x">
							<div class="cell medium-7 eventContent">
								<?php echo($event_main_content); ?>
								
								
								
								<?php 
								$button = $event_button;
								if( $button ): 
								    $button_url = $button['url'];
								    $button_title = $button['title'];
								    $button_target = $button['target'] ? $button['target'] : '_self';
								    ?>
								    <a class="button" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><?php echo esc_html( $button_title ); ?></a>
								<?php endif; ?>
							</div>
							<div class="cell auto">
								
							</div>
							<div class="cell medium-4">
								<div class="eventInfoBox">
									<h4>Event Info:</h4>
									
										
									<?php if ($event_venue_address['default-or-manual'] == 'default' || $event_venue_address['default-or-manual'] == ''): ?>
										<span class="labelName"><i class="fa-solid fa-location-dot"></i></span><span class="labelInfo">
										<?php if (get_field('map_link', 'option')): ?>
											<strong><?php the_field('contact_headline', 'option'); ?></strong><br />
											<a href="<?php the_field('map_link', 'option'); ?>" target="_blank"><?php the_field('address', 'option'); ?></a>
										<?php else: ?>
											<?php the_field('contact_headline', 'option'); ?><br />
											<?php the_field('address', 'option'); ?>
										<?php endif; ?>
									<?php else: ?>
										<span class="labelName"><i class="fa-solid fa-location-dot"></i></span><span class="labelInfo">
										<?php if ($event_venue_address['street_address']): ?>
											<?php if ($event_venue_address['map_link']): ?>
												<a href="<?php echo esc_html($event_venue_address['map_link']); ?>" target="_blank"><?php echo esc_html($event_venue_address['street_address']); ?></a>
											<?php else: ?>
												<?php echo esc_html($event_venue_address['street_address']); ?>
											<?php endif; ?>
										<?php endif; ?>
									<?php endif; ?>
									<?php if ($event_venue_address['location']): ?>
										<br /><?php echo esc_html($event_venue_address['location']); ?>
									<?php endif; ?>
									
									</span><br/>
									<span class="labelName"><i class="fa-solid fa-calendar-days"></i></span><span class="labelInfo">
										<?php if($event_start_date !=''): ?>
											<?php if($event_start_date == $event_date): ?>
												<?php echo($event_start_date); ?>
											<?php else: ?>
												<?php echo($event_start_date); ?> - <?php echo($event_date); ?>
											<?php endif; ?>
										<?php else: ?>
											<?php echo($event_date); ?>
										<?php endif; ?>
									</span><br/>
									<?php if ($event_time_form != ''): ?><span class="labelName"><i class="fa-solid fa-clock"></i></span><span class="labelInfo"><?php if($event_time_to != ''): ?><?php echo($event_time_form); ?> - <?php echo($event_time_to); ?><?php else: ?><?php echo($event_time_form); ?><?php endif; ?></span><br/><?php endif; ?>
									<span class="labelName"><i class="fa-solid fa-flag"></i></span><span class="labelInfo"><?php echo($event_language); ?></span><br/>
									
									
									<?php if( have_rows('organizers') ): ?>
									<span class="labelName"><i class="fa-solid fa-people-group"></i></span>
										<span class="event_organizers">
										
										
									    <?php while( have_rows('organizers') ) : the_row(); 
										    $organizer_name = get_sub_field('organizer_name');
										    $organizer_link = get_sub_field('organizer_link');
									    ?>
									    	<span><a href="<?php echo($organizer_link); ?>" target="_blank"><?php echo($organizer_name); ?></a></span>
									        
									    <?php endwhile; ?>
										</span>
									<?php endif; ?>
									
									
									
									
									<?php 
										
										if($event_start_date != '') {
											$startDate = $event_start_date;
										} else {
											$startDate = $event_date;
										}
										
										$endDate = $event_date;
									
										$evenStartDate = date("Ymd", strtotime($startDate)); 
										$eventEndDate = date("Ymd", strtotime($endDate)); 
									
										$evenStartTime = date("Hi", strtotime($event_time_form)); 
										$eventEndTime = date("Hi", strtotime($event_time_to));
									
										$newExcerpt = strip_tags($event_event_excerpt,'<code>');
										$newEventDescription = strip_tags($event_main_content,'<code>');
										
									?>

									<a class="button lightButton" style="margin-top: 1rem;" href="<?=get_template_directory_uri();?>/calendar-ics/ical.php?startdate=<?php echo($evenStartDate); ?>&amp;startTime=<?php echo($evenStartTime); ?>&amp;enddate=<?php echo($eventEndDate); ?>&amp;endTime=<?php echo($eventEndTime); ?>&amp;subject=<?php the_title(); ?>&amp;desc=<?php echo($newExcerpt); ?>."><i class="fa-solid fa-calendar-days"></i> Add to calendar</a>
									
									
									<span style="visibility: hidden"><?php echo($startDate); ?>, <?php echo($endDate); ?></span>

									
								</div>
								<?php if ($event_digital_participation['box_link']): ?>
								<div class="eventInfoBox">
									<h4><?php echo esc_html( $event_digital_participation['box_headline'] ); ?></h4>
									<p>
										<?php echo esc_html( $event_digital_participation['short_text'] ); ?>
									</p>
									<?php 
									$link = $event_digital_participation['box_link'];
									if( $link ): 
									    $link_url = $link['url'];
									    $link_title = $link['title'];
									    $link_target = $link['target'] ? $link['target'] : '_self';
									    ?>
									    <a class="button lightButton" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><i class="fa-solid fa-camera-web"></i> <?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>
									
										
								</div>
								<?php endif; ?>
							</div>
						</div>
						<?php if($event_speakers_headline): ?>
						<div class="grid-x">
							<div class="cell sectionHeader">
								<h3><?php echo($event_speakers_headline); ?></h3>
								<?php if($event_speakers_excerpt): ?>
								<p><?php echo($event_speakers_excerpt); ?></p>
								<?php endif; ?>
							</div>
						</div>
						<?php endif; ?>
						<div class="grid-x grid-padding-y grid-margin-x  small-up-1 medium-up-1 large-up-2">
							
							<?php
								$event_speakers_list = $event_speakers;
								if( $event_speakers_list ): 
							?>
								
								<?php foreach( $event_speakers_list as $speakers ): 
									$event_speaker_name = get_the_title( $speakers->ID );
									$event_speaker_image = get_field('contact_image', $speakers->ID );
									$event_speaker_title = get_field('contact_title', $speakers->ID );
									$event_speaker_excerpt = get_field('contact_xcerpt', $speakers->ID );
									$event_speaker_institution = get_field('institution_company', $speakers->ID );
								?>
									<div class="cell">
										<div class="contactPersonBox grid-x">
											<div class="cell medium-5 imgBox">
												<a href="#"  data-open="contactModal_<?php echo($speakers->ID) ?>"><?php if( !empty( $event_speaker_image ) ): ?><img src="<?php echo esc_url($event_speaker_image['url']); ?>" alt="<?php echo esc_attr($event_speaker_image['alt']); ?>" /><?php else: ?><img src="<?=get_template_directory_uri();?>/images/system/missing-image-person.png" alt="Image missing <?php echo($event_speaker_name); ?>" /><?php endif; ?></a>
											</div>
											<div class="cell medium-7 textBox">
												<h5><a href="#"  data-open="contactModal_<?php echo($speakers->ID) ?>"><?php echo($event_speaker_name); ?></a></h5>
												<span class="contactInstitution"><?php echo($event_speaker_title); ?>, <?php echo($event_speaker_institution); ?></span>
												<p>
													<?php echo($event_speaker_excerpt); ?>
												</p>
												
												<a href="#" class="readmore" data-open="contactModal_<?php echo($speakers->ID) ?>">Read more</a>
												
											</div>
										</div>
									</div>
								<?php endforeach; ?>
								
							<?php endif; ?>
							
							
						</div>
					</div>
					<?php
						$event_speakers_list = $event_speakers;
						if( $event_speakers_list ): 
					?>
						
						<?php foreach( $event_speakers_list as $speakers ): 
							$event_speaker_name = get_the_title( $speakers->ID );
							$event_speaker_image = get_field('contact_image', $speakers->ID );
							$event_speaker_image_text = get_field('contact_image_text', $speakers->ID );
							$event_speaker_title = get_field('contact_title', $speakers->ID );
							$event_speaker_excerpt = get_field('contact_xcerpt', $speakers->ID );
							$event_speaker_institution = get_field('institution_company', $speakers->ID );
							$event_speaker_description = get_field('contact_description', $speakers->ID );
							$event_speaker_image_text = get_field( 'contact_image_text', $speakers->ID );
							$event_speaker_phone = get_field( 'contact_phone', $speakers->ID );
							$event_speaker_cell_phone = get_field( 'contact_cell_phone', $speakers->ID );
							$event_speaker_contact_email = get_field( 'contact_email', $speakers->ID );
						?>
							<div class="reveal large contactModal" id="contactModal_<?php echo($speakers->ID) ?>" data-reveal>
								<button class="close-button" data-close aria-label="Close modal" type="button">
									<span aria-hidden="true">&times;</span>
								</button>
								<h2><?php echo( $event_speaker_name ); ?></h2>
								<span class="contactInstitution" style="display: block; margin-bottom: 1rem; font-weight: bold"><?php echo( $event_speaker_title ); ?>, <?php echo( $event_speaker_institution ); ?></span>
								<?php if( !empty( $event_speaker_image ) ): ?>
								<div class="imgBox">
									<img src="<?php echo esc_url($event_speaker_image['url']); ?>" alt="<?php echo esc_attr($event_speaker_image['alt']); ?>" />
									<?php if($event_speaker_image_text): ?><div class="imgText"><?php echo( $event_speaker_image_text ); ?></div><?php endif; ?>
								</div>
								<?php endif; ?>
								<p class="lead">
									<?php echo( $event_speaker_excerpt ); ?>
								</p>
								<?php echo($event_speaker_description); ?>
								<p>
									<?php if( !empty( $event_speaker_contact_email ) ): ?><span class="labelName"><i class="fa-regular fa-envelope"></i></span><span class="labelInfo"><a href="mailto:<?php echo esc_html( $event_speaker_contact_email ); ?>"><?php echo esc_html( $event_speaker_contact_email ); ?></a></span><br /><?php endif; ?>
									<?php if( !empty( $event_speaker_phone ) ): ?><span class="labelName"><i class="fa-regular fa-phone"></i></span><span class="labelInfo"><?php echo esc_html( $event_speaker_phone ); ?></span><?php endif; ?>
									<?php if( !empty( $event_speaker_cell_phone ) ): ?><span class="labelName"><i class="fa-regular fa-mobile"></i></span><span class="labelInfo"><?php echo esc_html( $event_speaker_cell_phone ); ?></span><?php endif; ?>
								</p>
							</div>
						<?php endforeach; ?>
						
					<?php endif; ?>
				</div>
			</div>
		</section>
		
		
		
	<?php endwhile; ?>
	
	
    
<?php get_footer(); ?>