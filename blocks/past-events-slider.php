<?php
$_block = 'past-events-slider';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$past_events_slider_headline = get_field('past_events_slider_headline') ?? '';
	$past_events_slider_excerpt = get_field('past_events_slider_short_text') ?? '';
	$past_events_slider_link = get_field('past_events_slider_link') ?? '';
	$past_events_slider_edit_type = get_field('upcoming_automatic_or_manual') ?? '';
	$past_events_slider_list_manual = get_field('upcoming_events_list_manual') ?? '';
?>

	<section class="fullScreen contentBox grey minPadding <?= $_block ?>" id="referanser">
		<div class="grid-container full">
			
			<div class="grid-x grid-padding-x align-center">
				<div class="cell large-3 medium-8">
					<div class="sectionTextBox">
						<h2><?php echo($past_events_slider_headline); ?></h2>
						<p>
							<?php echo($past_events_slider_excerpt); ?>
						</p>
						<p>
							<?php 
							$link = $past_events_slider_link;
							if( $link ): 
							    $link_url = $link['url'];
							    $link_title = $link['title'];
							    $link_target = $link['target'] ? $link['target'] : '_self';
							    ?>
							    <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>
						</p>
					</div>
				</div>
				<div class="cell large-9 medium-12" style="position: relative;">
					
					<div class="swiper boxSwiper">
						<div class="swiper-wrapper">
							
							<?php
								
								$today = date("Y.m.d");
								
						        $args = array(
						          'post_type'   => 'events',
						          'post_status' => 'publish',
						          'meta_key'    => 'event_date',
								  'orderby'     => 'meta_value',
						          'order'		=> 'DESC',
						          'meta_query' => array(
							          array( 
							          	'key'  => 'event_date',
							          	'value' => $today,
							          	'compare' => '<',
							          	'type' => 'DATE'
							          )
							      	),
						          'posts_per_page' => 12
						          
						         );
						         
						        $past_events_slider = new WP_Query( $args );
						        if( $past_events_slider->have_posts() ) : 
						    ?>
							
								<?php while( $past_events_slider->have_posts() ) : $past_events_slider->the_post(); 
									$past_event_date = get_field('event_date', get_the_ID());
									$past_event_time_from = get_field('time_form', get_the_ID());
									$past_event_time_to = get_field('time_to', get_the_ID());
									$past_event_language = get_field('language', get_the_ID());
									$past_event_location = get_field('location_venue', get_the_ID());
									$past_event_excerpt = get_field('event_excerpt', get_the_ID());
									$past_event_media = get_field('event_media', get_the_ID());
								?>
								<div class="swiper-slide">
									<div class="cell refBox">
										<div class="imgBox <?php if($past_event_media['image_filter'] == 'grayscale100'): ?>grayscale100 <?php elseif ($past_event_media['image_filter'] == 'grayscale60'): ?>grayscale60  <?php elseif ($past_event_media['image_filter'] == 'grayscale50'): ?>grayscale50 <?php elseif ($past_event_media['image_filter'] == 'grayscale40'): ?>grayscale40 <?php elseif ($past_event_media['image_filter'] == 'nofilter'): ?>noFilter <?php else: ?> <?php endif; ?>">
											<?php if($past_event_media['image_or_video'] == 'video'): ?>
											<div class="eventLabel"><i class="fa-solid fa-video"></i> Video</div>
											<?php elseif($past_event_media['image_or_video'] == 'audio'): ?>
											<div class="eventLabel"><i class="fa-solid fa-volume"></i> Audio</div>
											<?php else: ?>
											
											<?php endif; ?>
											
											
											<a href="<?php the_permalink();?>">
												<?php if(!empty($past_event_media['main_image'])): ?>
													<img src="<?php echo esc_url( $past_event_media['main_image']['url'] ); ?>" alt="<?php echo esc_attr( $past_event_media['main_image']['alt'] ); ?>" />
												<?php else: ?>
													<img src="http://localhost:8888/bergenglobal-test/wp-content/themes/bergenglobal-theme/images/temp/about/Ressurssenteret-2677_DxO.jpg" alt="Bergen Global" />
												<?php endif; ?>
											</a>
											
										</div>
										<div class="excerpt">
											<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
											<?php echo($past_event_excerpt); ?>
										</div>
										
									</div>
								</div>
								<?php endwhile; wp_reset_postdata(); ?>
							
				        	</div>
						<?php endif; ?>
				        
				      </div>
				      <div class="swiper-button-next"></div>
				      <div class="swiper-button-prev"></div>
				      <div class="swiper-pagination"></div>
				   
					
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>