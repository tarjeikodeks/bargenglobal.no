<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kodeks
 */

?>
		
		
		<?php 
			$visibility = get_field('infobox_visibility', 'option');
			if($visibility == 'show'):
		?>
		<section class="contentBox minPadding greyBorderTop footerTop lightInnerShadow">
			<div class="grid-container">
				<div class="grid-x grid-padding-x grid-margin-x align-center">
					<div class="cell medium-8 large-6 text-center sectionHeader">
						<p>
							<?php the_field('info_text', 'option'); ?>
						</p>
					</div>
				</div>
				<?php if( have_rows('footer_logos', 'option') ): ?>
				<div class="grid-x grid-padding-x grid-padding-y small-up-2 medium-up-3 large-up-4 align-center text-center">
					
					<?php while( have_rows('footer_logos', 'option') ): the_row(); 
						$logo = get_sub_field('logo_file');
						$link = get_sub_field('link');
					?>
					<div class="cell">
						<div class="logoBox">
							<a href="<?php echo($link); ?>" target="_blank">
								<img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
							</a>
						</div>
					</div>
					<?php endwhile; ?>
					
				</div>
				<?php endif; ?>
			</div>
		</section>
		<?php endif; ?>
		

		<footer class="contentBox dark" id="kontakt-oss">
			<div class="grid-container ">
				<div class="grid-x grid-padding-x grid-margin-x align-justify">
					
					<div class="cell large-4 medium-6 footerCell">
						 
						
						<?php 
					    	$footer_logo = get_theme_mod('footer_logo'); 
					    	$custom_logo_id = get_theme_mod( 'custom_logo' );
							$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
					    	if( $footer_logo !== '' ) {   	
					    	?>
					    	<img src="<?php echo get_theme_mod('footer_logo'); ?>" alt="<?php bloginfo('name'); ?>" style="max-width: 200px; margin-bottom: 2rem;" />
					    	<?php 
						    	} 
						    else  {
							    ?>
							    <img src="<?php echo $image[0]; ?>" alt="<?php bloginfo('name'); ?>"  style="max-width: 200px; margin-bottom: 2rem;">
							    <?php
						    }
						?>
						<!--h4>Bergen Global</h4-->
						<p>
							<?php the_field('address', 'option'); ?>
						</p>
						<p>
							
						<?php if( have_rows('emails', 'option') ): ?>
							
						    <?php while( have_rows('emails', 'option') ): the_row(); ?>
						    	<?php the_sub_field('label'); ?>: <a href="mailto:<?php the_sub_field('email'); ?>"><?php the_sub_field('email'); ?></a><br />
						    <?php endwhile; ?>
						   
						<?php endif; ?>
						</p>
						<nav class="footerNav">
							<?php wp_nav_menu(array('theme_location' => 'secondary', '', 'container' => false)); ?>
							
						</nav>
						
					</div>
					
					
					<div class="cell large-4 medium-6 socialIcons footerCell">
						
						<?php if( have_rows('social_media_links', 'option') ): ?>
						    <ul>
						    <?php while( have_rows('social_media_links', 'option') ): the_row(); ?>
						        <li>
						            <a href="<?php the_sub_field('media_link'); ?>" target="_blank"><i class="<?php the_sub_field('media_icon_name'); ?>"></i><span><?php the_sub_field('media_name'); ?></span></a>
						        </li>
						    <?php endwhile; ?>
						    </ul>
						<?php endif; ?>
						
						
					</div>
					
					<div class="cell large-4 medium-12 footerCell">
						<div class="grid-x grid-margin-x ">
							<div class="medium-8 large-12 cell">
								
								<h4><?php the_field('newsletter_headline', 'option'); ?></h4>
								<?php the_field('newsletter_info_text', 'option'); ?>
								<style type="text/css">
					                #mc-embedded-subscribe-form input[type=checkbox]{display: inline; width: auto;margin-right: 10px;}
					                #mergeRow-gdpr {margin-top: 20px;}
					                #mergeRow-gdpr fieldset label {font-weight: normal;}
					                #mc-embedded-subscribe-form .mc_fieldset{border:none;min-height: 0px;padding-bottom:0px;}
								</style>
								<form action=https://bergenglobal.us10.list-manage.com/subscribe/post?u=b7892d2e9c911b7035ca3f38d&amp;id=c9f481bc02&amp;v_id=5380&amp;f_id=00d3cce5f0 method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
								    <div id="mc_embed_signup_scroll">
								        <div class="newsletter-form">
								            <div class="mc-field-group">
								                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" required>
								                <span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span>
								            </div>
								            <div class="frm_submit"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
								            <div class="content__gdpr" style="font-size:0.80rem;">
									            <div>
										        <label style="color: #FFF;"><strong>GDPR Permission</strong></label>
										        <p>We need your consent to invite you to our events on global challenges.</p>
											        <fieldset class="mc_fieldset gdprRequired mc-field-group" name="interestgroup_field" style="width: 100%; display: block;">
												        <label class="checkbox subfield" for="gdpr_11573"><input type="checkbox" style="height: auto;" id="gdpr_11573" name="gdpr[11573]" value="Y" class="av-checkbox "><span style="color: #FFF;">Email</span> </label>
											        </fieldset>
									            </div>
									            <div>
										        	<p style="display: block;">You can unsubscribe at any time by clicking the link in the footer of our emails.</p>
									            </div>
										    </div>
										    <!--div class="content__gdprLegal" style="font-size: 0.80rem;">
										        <p>We use Mailchimp as our marketing platform. By clicking below to subscribe, you acknowledge that your information will be transferred to Mailchimp for processing. <a href=https://mailchimp.com/legal/terms target="_blank">Learn more about Mailchimp's privacy practices here.</a></p>
										    </div-->
								            <div id="mce-responses" class="clear foot">
				                               <div class="response" id="mce-error-response" style="display:none"></div>
				                               <div class="response" id="mce-success-response" style="display:none"></div>
							                </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->  
								            <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="" tabindex="-1" value=""></div>
								           
								        </div>
								    </div>
								</form>	
								<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
							</div>
							
						</div>
					</div>
					
				</div>
			
				
			
			</div>
		</footer>
	</div>
	
	<?php
	wp_footer();
	kodeks_footer_hook();
	?>
	<script src="http://localhost:8888/bergenglobal.no/wordpress//wp-content/themes/bergenglobal-theme/node_modules/what-input/dist/what-input.js"></script>
	<script src="http://localhost:8888/bergenglobal.no/wordpress//wp-content/themes/bergenglobal-theme/node_modules/foundation-sites/dist/js/foundation.js"></script>
	<script src="http://localhost:8888/bergenglobal.no/wordpress//wp-content/themes/bergenglobal-theme/node_modules/swiper/swiper-bundle.min.js"></script>
	<script src="http://localhost:8888/bergenglobal.no/wordpress//wp-content/themes/bergenglobal-theme/node_modules/mixitup/dist/mixitup.min.js"></script>
	<script>
	    <?php
	    $templateDir = get_template_directory() . '/js/app.min.js';
	    $js = file_get_contents($templateDir);
	    echo $js;
	    ?>
	</script>
	
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit-icons.min.js"></script>
	
	<script>
		
		var swiper = new Swiper(".bannerSwiper", {
	        speed: 600,
	        parallax: false,
	        autoplay: {
		      delay: 5000,
		      disableOnInteraction: false,
		      pauseOnMouseEnter: true, 
	        },
	        pagination: {
	          el: ".swiper-pagination",
	          clickable: true,
	        },
	        navigation: {
	          nextEl: ".swiper-button-next",
	          prevEl: ".swiper-button-prev",
	        },
	    });
		
	    var swiper = new Swiper(".modalSwiper", {
	        speed: 600,
	        parallax: true,
	        pagination: {
	          el: ".swiper-pagination",
	          clickable: true,
	        },
	        navigation: {
	          nextEl: ".swiper-button-next",
	          prevEl: ".swiper-button-prev",
	        },
	    });
	      
	    var swiper = new Swiper(".boxSwiper", {
	        slidesPerView: 1,
	        spaceBetween: 10,
	        slidesPerGroup: 1,
	        loop: true,
	        autoplay: {
		      delay: 5000,
		      disableOnInteraction: false,
		      pauseOnMouseEnter: true, 
	        },
	        on:{
			    beforeResize() {
				    if (window.innerWidth >= 640) {
					    swiper.slides.css('width', '');
					}
				}
			},
	        breakpoints: {
		        1400: {
		          slidesPerView: 3,
		          spaceBetween: 50,
		          slidesPerGroup: 3,
		        },
		        1081: {
		          slidesPerView: 3,
		          spaceBetween: 50,
		          slidesPerGroup: 3,
		        },
		        768: {
		          slidesPerView: 2,
		          spaceBetween: 30,
		          slidesPerGroup: 2,
		        },
		        640: {
		          slidesPerView: 1,
		          spaceBetween: 30,
		          slidesPerGroup: 1,
		        },
		    },
		    
		    loopFillGroupWithBlank: true,
	        pagination: {
	          el: ".swiper-pagination",
	          clickable: true,
	        },
	        navigation: {
	          nextEl: ".swiper-button-next",
	          prevEl: ".swiper-button-prev",
	        },
	    });
	      
	</script>
	
	
	
	<script>
        var containerEl = document.querySelector('.container');
        var mixer = mixitup(containerEl);
    </script>

</body>

</html>