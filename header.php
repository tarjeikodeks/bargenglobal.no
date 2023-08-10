<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="http://localhost:8888/bergenglobal.no/wordpress/wp-content/themes/bergenglobal-theme/node_modules/swiper/swiper-bundle.css">
	
    <?php
    wp_head();
    kodeks_header_hook();

    $templateDir = get_template_directory_uri() . '/css/app.css';

    if (0 == get_option('blog_public')) {
        echo '
    <link rel="stylesheet" href="' . $templateDir . '" />';
    } else {
        $css = file_get_contents($templateDir);
        echo '<style>' . $css . '</style>';
    };
    ?>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5975515f58.js" crossorigin="anonymous"></script>

</head>

<body <?php body_class(); ?>>
	
	<input id="menu-switch" type="checkbox" />
	
	<nav id="menu">
		<div class="grid-container">
			<div class="grid-x grid-margin-y">
				<div class="headerSearch cell">
					<?php get_search_form(); ?>
				    <!--form>
					    <input type="search" class="search" placeholder="Search" />
					    <button type="submit"><span>Search</span></button>
					</form-->
			    </div>
			</div>
		</div>
		<?php wp_nav_menu(array('theme_location' => 'primary', '', 'container' => false)); ?>
		
	</nav>
	
	<div class="page-wrap">

	    <?php 
	    //get_template_part('breakpoints');
	    kodeks_body_hook(); 
	    ?>
	
		<label for="menu-switch" id="menu-toggle"><span></span></label>
	
	    <header id="top" class="site-header">
		    
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
						    <div class="minLogo">
							    
						    	<?php 
							    	$mini_logo = get_theme_mod('mini_logo'); 
							    	$custom_logo_id = get_theme_mod( 'custom_logo' );
									$image = wp_get_attachment_image_src( $custom_logo_id , 'full' ); 
							    	if( $mini_logo !== '' ) {   	
							    	?>
							    	<img src="<?php echo get_theme_mod('mini_logo'); ?>" alt="" />
							    	<?php 
								    	} 
								    else  {
									    ?>
									    <img src="<?php echo $image[0]; ?>" alt="">
									    <?php
								    }
								?>						    	
						    </div>
						</a>
						<div class="slogan">
							<?php the_field('header_info_text', 'option'); ?>
							
						</div>
				    </div>
				    <div class="large-8 medium-9 small-8 cell navContainer">
					    
					    <nav class="mainNav">
							<?php wp_nav_menu(array('theme_location' => 'primary', '', 'container' => false)); ?>
							
								<div class="searchToggle"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></div>
							
					    </nav>
				    </div>
				</div>
				
			</div>
			<div class="grid-x grid-padding-x searchBox align-center hide-for-small-only hide-for-medium-only">
				<div class="cell large-8 headerSearch">
					<?php get_search_form(); ?>
				    
				</div>
			</div>
	    </header>
	    