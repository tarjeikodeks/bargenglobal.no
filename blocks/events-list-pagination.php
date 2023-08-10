<?php
$_block = 'event-list';

if (isset($block['data']['preview_image_help'])) :
    block_render($block);
else :
	$past_events_headline = get_field('events_header') ?? '';
	$past_events_excerpt = get_field('events_excerpt') ?? '';
?>

	<section class="contentBox greyBorderTop lightInnerShadow <?= $_block ?>">
		<div class="grid-container full">
			<div class="grid-x align-center">
				<div class="cell medium-8 large-6 text-center sectionHeader">
					<h3><?php echo($past_events_headline); ?></h3>
					
					<div class="cell controls text-center">
						<button type="button" class="control" data-filter="all">All</button>
						<button type="button" class="control" data-filter=".english">English</button>
						<button type="button" class="control" data-filter=".norwegian">Norwegian</button>
						<button type="button" class="control" data-filter=".audio">Audio</button>
						<button type="button" class="control" data-filter=".video">Video</button>
						<button type="button" class="control" data-filter=".summary">Summary</button>
					</div>
					
				</div>
				
			</div>
			
			<?php
					
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				
				$today = date("Y.m.d");
				
		        $args = array(
		          'post_type'   => 'events',
		          'post_status' => 'publish',
		          'meta_key'    => 'event_date',
				  'orderby'     => 'meta_value',
		          'order'		=> 'DESC',
		          'paged' 		=> $paged,
		          'meta_query' 	=> array(
			          array( 
			          	'key'  		=> 'event_date',
			          	'value' 	=> $today,
			          	'compare' 	=> '<',
			          	'type' 		=> 'DATE'
			          )
			      	),
		          'posts_per_page' => 16
		          
		         );
		         
		        $past_events_list = new WP_Query( $args );
		        if( $past_events_list->have_posts() ) : 
		    ?>
			
			<div class="grid-x grid-padding-x grid-padding-y small-up-1 medium-up-2 large-up-4 container" id="eventMixlist">
			
				
				
				<?php while( $past_events_list->have_posts() ) : $past_events_list->the_post(); 
					$past_event_date = get_field('event_date', get_the_ID());
					$past_event_time_from = get_field('time_form', get_the_ID());
					$past_event_time_to = get_field('time_to', get_the_ID());
					$past_event_language = get_field('language', get_the_ID());
					$past_event_location = get_field('location_venue', get_the_ID());
					$past_event_excerpt = get_field('event_excerpt', get_the_ID());
					$past_event_media = get_field('event_media', get_the_ID());
					$past_event_image_filter = get_field('image_filter', get_the_ID());
				?>
				
				<div class="cell mix <?php if(!empty($past_event_language)): ?><?php if($past_event_language == 'Eng' || $past_event_language == 'ENG'): ?>english<?php elseif($past_event_language == 'Nor' || $past_event_language == 'NOR'): ?>norwegian<?php else: ?><?php endif; ?><?php endif; ?>  <?php if($past_event_media['image_or_video'] == 'video'): ?>video<?php elseif($past_event_media['image_or_video'] == 'audio'): ?>audio<?php else: ?>summary<?php endif; ?>">
						
						<div class="refBox">
							<div class="imgBox <?php if(!empty($past_event_media['image_filter'])): ?><?php if($past_event_media['image_filter'] == 'grayscale100'): ?>grayscale100 <?php elseif ($past_event_media['image_filter'] == 'grayscale60'): ?>grayscale60  <?php elseif ($past_event_media['image_filter'] == 'grayscale50'): ?>grayscale50 <?php elseif ($past_event_media['image_filter'] == 'grayscale40'): ?>grayscale40 <?php elseif ($past_event_media['image_filter'] == 'nofilter'): ?>noFilter <?php else: ?> <?php endif; ?><?php endif; ?>">
								<?php if(!empty($past_event_media['image_or_video'])): ?>
									<?php if($past_event_media['image_or_video'] == 'video'): ?>
									<div class="eventLabel"><i class="fa-solid fa-video"></i> Video</div>
									<?php elseif($past_event_media['image_or_video'] == 'audio'): ?>
									<div class="eventLabel"><i class="fa-solid fa-volume"></i> Audio</div>
									<?php else: ?>
									
									<?php endif; ?>
								<?php endif; ?>
								<a href="<?php the_permalink();?>" data-open="exampleModal11">
									<?php if(!empty($past_event_media['main_image'])): ?>
										<img src="<?php echo esc_url( $past_event_media['main_image']['url'] ); ?>" alt="<?php echo esc_attr( $past_event_media['main_image']['alt'] ); ?>" />
									<?php endif; ?>
								</a>
							</div>
							<div class="excerpt">
								<div class="textBox">
									<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
									<?php echo($past_event_excerpt); ?>
									
									
								</div>
							</div>
						</div>
						
					</div>
				
				<?php endwhile; ?>
				
				
			</div>
			
			<div style="margin-top: 2rem;" class="text-center">
				
				<div class="pagination">
					
			    <?php
				    
				    echo $pagination = paginate_links( array(
			            'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
			            'total'        => $past_events_list->max_num_pages,
			            'current'      => max( 1, get_query_var( 'paged' ) ),
			            'format'       => '?paged=%#%',
			            'show_all'     => false,
			            'type'         => 'plain',
			            'end_size'     => 2,
			            'mid_size'     => 1,
			            'prev_next'    => true,
			            'prev_text'    => sprintf( '<i class="fa-regular fa-angles-left"></i> %1$s', __( 'Previous', 'text-domain' ) ),
			            'next_text'    => sprintf( '%1$s <i class="fa-regular fa-angles-right"></i>', __( 'Next', 'text-domain' ) ),
			            'add_args'     => false,
			            'add_fragment' => '',
			        ) );
			        
			        ?>
			  
				</div>
				
			<div>
    	
			<?php wp_reset_postdata(); ?>
    	
		<?php endif; ?>
		</div>
		
	</section>


	
<?php endif; ?>