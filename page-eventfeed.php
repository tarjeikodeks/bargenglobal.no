<?php /* Template Name: Event Feed Template */ ?>

<?php get_header(); ?>
	
	<section class="feedHeader">
		<div class="grid-container fluid">
			<div class="grid-x grid-padding-x">
		        <div class="large-4 medium-3 small-4 cell branding">
			        <?php
			        	$custom_logo_id = get_theme_mod('custom_logo');
						$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
			        ?>
			        <a href="<?php echo home_url(); ?>" class="logo">
					    <div class="mainLogo">
						     
							<img src="<?php echo $logo[0]; ?>" alt="<?php bloginfo('name'); ?>" />
					    	<!--img src="images/profile/bergenglobal-logo-circle.svg" alt="Bergen Global" /-->
					    </div>
					    
					</a>
					<div class="slogan">
						<?php the_field('header_info_text', 'option'); ?>
						
					</div>
			    </div>
			</div>
		</div>
	</section>

    <?php while ( have_posts() ) : the_post(); ?>
 
    	<?php the_content(); ?>
    
    <?php endwhile; ?>
    
<?php get_footer(); ?>