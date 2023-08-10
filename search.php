<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Kodeks
 */

get_header(); ?>

<?php include('blocks/search-banner.php'); ?>

<section class="contentBox greyBorderTop lightInnerShadow ">
	<div class="grid-container full">
		<div class="grid-x align-center">
			
				
				
				
				<?php if ( have_posts() ) : ?>
					<div class="cell medium-8 large-6 text-center sectionHeader">
						<h3><?php printf( esc_html__( 'Søkeresultater for %s', 'kodeks' ), '<span>"' . get_search_query() . '"</span>' ); ?></h3>
					</div>
					
						<div class="grid-x grid-padding-x grid-padding-y small-up-1 medium-up-2 large-up-4 container" id="eventMixlist">
						<?php while ( have_posts() ) : the_post(); 
							$event_start_date = get_field('event_start_date', get_the_ID());
							$event_date = get_field('event_date', get_the_ID());
							$event_time_from = get_field('time_form', get_the_ID());
							$event_time_to = get_field('time_to', get_the_ID());
							$event_language = get_field('language', get_the_ID());
							$event_location = get_field('location_venue', get_the_ID());
							$event_excerpt = get_field('event_excerpt', get_the_ID());
							$event_media = get_field('event_media', get_the_ID());
							$event_speakers = get_field('contacts_select', get_the_ID());
						?>
							<div class="cell mix english video">
								<div class="refBox">
									<div class="imgBox <?php if($event_media['image_filter'] == 'grayscale100'): ?>grayscale100 <?php elseif ($event_media['image_filter'] == 'grayscale60'): ?>grayscale60  <?php elseif ($event_media['image_filter'] == 'grayscale50'): ?>grayscale50 <?php elseif ($event_media['image_filter'] == 'grayscale40'): ?>grayscale40 <?php elseif ($event_media['image_filter'] == 'nofilter'): ?>noFilter <?php else: ?> <?php endif; ?>">
										<?php if($event_media['image_or_video'] == 'video'): ?>
										<div class="eventLabel"><i class="fa-solid fa-video"></i> Video</div>
										<?php elseif($event_media['image_or_video'] == 'audio'): ?>
										<div class="eventLabel"><i class="fa-solid fa-volume"></i> Audio</div>
										<?php else: ?>
										
										<?php endif; ?>
										<a href="<?php the_permalink();?>" data-open="exampleModal11"><?php if ($event_media['main_image']): ?><img src="<?php echo esc_url( $event_media['main_image']['url'] ); ?>" alt="<?php echo esc_attr( $event_media['main_image']['alt'] ); ?>" /><?php endif; ?></a>
									</div>
									<div class="excerpt">
										<div class="textBox">
											<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
											<p><?php echo($event_excerpt); ?></p>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
						</div>
					</div>
				<?php else : ?>
					<div class="large-10 cell contentHead">
						<h1><?php printf( esc_html__( 'Ingen treff på ditt søk: %s', 'kodeks' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</div>
					<p><?php esc_html_e( 'Ingen treff. Prøv igjen.', 'kodeks' ) ?></p>
					<?php get_search_form(); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
<?php get_footer(); ?>