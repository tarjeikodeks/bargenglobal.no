<?php

/**
 * Kodeks functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kodeks
 */

include_once('blocks.php');
include_once('hooks.php');
include_once('project.php');

// Remove WP JQ and add own jQuery
function kodeks_remove_jquery()
{
    if ((!is_admin() && $GLOBALS['pagenow'] != 'wp-login.php')) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }
}
add_action('init', 'kodeks_remove_jquery');

function theme_scripts()
{
    wp_enqueue_script('jQuery', 'https://code.jquery.com/jquery-3.6.0.min.js');
}
add_action('wp_enqueue_scripts', 'theme_scripts');




// Remove JQuery migrate
function kodeks_remove_jquery_migrate($scripts)
{
    if ((!is_admin() && $GLOBALS['pagenow'] != 'wp-login.php') && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];

        if ($script->deps) { // Check whether the script has any dependencies
            $script->deps = array_diff($script->deps, array(
                'jquery-migrate'
            ));
        }
    }
}
add_action('wp_default_scripts', 'kodeks_remove_jquery_migrate');


// Remove wp-embed
function my_deregister_scripts()
{
    wp_deregister_script('wp-embed');
}
add_action('wp_footer', 'my_deregister_scripts');


// Add image sizes 
add_image_size('admin-thumb', 150, 150);


// Add admin.css
function load_admin_style()
{
    wp_enqueue_style('admin_css', get_template_directory_uri() . '/css/admin.css', false, '1.0.0');
}
add_action('admin_enqueue_scripts', 'load_admin_style');


//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css()
{
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wc-block-style'); // Remove WooCommerce block CSS
}
add_action('wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100);


// Remove default Posts post type

add_action( 'admin_menu', 'remove_default_post_type' );

function remove_default_post_type() {
    remove_menu_page( 'edit.php' );
}

add_action( 'admin_bar_menu', 'remove_default_post_type_menu_bar', 999 );

function remove_default_post_type_menu_bar( $wp_admin_bar ) {
    $wp_admin_bar->remove_node( 'new-post' );
}

function remove_add_new_post_href_in_admin_bar() {
    ?>
    <script type="text/javascript">
        function remove_add_new_post_href_in_admin_bar() {
            var add_new = document.getElementById('wp-admin-bar-new-content');
            if(!add_new) return;
            var add_new_a = add_new.getElementsByTagName('a')[0];
            if(add_new_a) add_new_a.setAttribute('href','#!');
        }
        remove_add_new_post_href_in_admin_bar();
    </script>
    <?php
}
add_action( 'admin_footer', 'remove_add_new_post_href_in_admin_bar' );


function remove_frontend_post_href(){
    if( is_user_logged_in() ) {
        add_action( 'wp_footer', 'remove_add_new_post_href_in_admin_bar' );
    }
}
add_action( 'init', 'remove_frontend_post_href' );

add_action( 'wp_dashboard_setup', 'remove_draft_widget', 999 );

function remove_draft_widget(){
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}

// End remove Posts


// Register nav menus
register_nav_menus(array(
    'primary' => esc_html__('Primary', 'kodeks'),
    'secondary' => esc_html__('Secondary', 'kodeks'),
));


// Add GTM
function kodeks_add_GTM()
{
    $gtm = '';
    if (function_exists('get_field')) {
        if (get_field('gtm', 'options')) :
            echo '<script>
            (function(w, d, s, l, i) {
                w[l] = w[l] || [];
                w[l].push({
                    "gtm.start": new Date().getTime(),
                    event: "gtm.js"
                });
                var f = d.getElementsByTagName(s)[0],
                    j = d.createElement(s),
                    dl = l != "dataLayer" ? "&l=" + l : "";
                j.async = true;
                j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
                f.parentNode.insertBefore(j, f);
            })(window, document, "script", "dataLayer", "' . get_field('gtm', 'options') . '");
        </script>';
        endif;
    }
}
add_action('kodeks_header_hook', 'kodeks_add_GTM');

function kodeks_add_GTM_body()
{
    if (function_exists('get_field')) {
        if (get_field('gtm', 'options')) {
            echo '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=' . get_field("gtm", "options") . '" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';
        }
    }
}
add_action('kodeks_body_hook', 'kodeks_add_GTM_body');


// Add image to block preview
function block_render($block, $content = '', $is_preview = false)
{
    if (isset($block['data']['preview_image_help'])) {
        echo '<img width="100%" height="auto" src="' . $block['data']['preview_image_help'] . '">';
        return;
    }
}


// Global columns
function global_columns() {
    $global_columns = 'grid-12 grid-m-8 grid-s-4'; 
    return $global_columns;
}


// Slugify
function slugify($word)
{
    return mb_strtolower(trim(preg_replace('/[^A-Za-z0-9-ÆØÅæøåAöÖäÄ]+/', '-', $word)), 'UTF-8');
}


// Block CSS inject
function bergenglobal_block_css($_block)
{
    if (!defined('style_' . $_block) || is_admin()) :
        echo '<style>' . file_get_contents(get_template_directory_uri() . '/css/blocks/' . $_block . '.css') . '</style>';
        !defined('style_' . $_block) ? define('style_' . $_block, 1) : '';
    endif;
}


function custom_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" ><div class="search-form">
    <label class="screen-reader-text hide-element" for="s">' . __( 'Search for events:' ) . '</label>
    <div class="mc-field-group">
    <input type="text" value="' . get_search_query() . '" name="s" placeholder="Search for events" class="search" id="s" />
    </div>
    <input type="hidden" name="post_type" value="events" />
    <div class="frm_submit"><input type="submit" id="searchsubmit" value="'. esc_attr__( 'Search' ) .'"  class="button frm_button_submit"  /></div>
 </div> </form>';

  return $form;
}
add_filter( 'get_search_form', 'custom_search_form', 40 );

// Custom logo
function bergenglobal_theme_customizer_options($wp_customize){
    
    // Custom secondary logo for minimized header
    $wp_customize->add_setting( 'mini_logo', array(
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mini_logo_control', array(
        'label' => 'Secondary logo for minimized header',
        'priority' => 20,
        'section' => 'title_tagline',
        'settings' => 'mini_logo',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select logo',
                    'remove' => 'Remove logo',
                    'change' => 'Change logo',
                    )
    )));
    
    // Custom secondary logo for footer
    $wp_customize->add_setting( 'footer_logo', array(
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo_control', array(
        'label' => 'Logo for footer',
        'priority' => 20,
        'section' => 'title_tagline',
        'settings' => 'footer_logo',
        'button_labels' => array(// All These labels are optional
                    'select' => 'Select logo',
                    'remove' => 'Remove logo',
                    'change' => 'Change logo',
                    )
    )));
    
    
    
    
}
add_action( 'customize_register', 'bergenglobal_theme_customizer_options' );





// ADD TO CALENDAR BUTTON

function justread_ics_download() {

        if ( is_singular( 'event' ) && isset( $_GET['ics'] ) ) {

                include get_stylesheet_directory() . '/inc/ICS.php';

                header('Content-Type: text/calendar; charset=utf-8');

                header('Content-Disposition: attachment; filename=invite.ics');


                $ics = new ICS(array(

                        'location' => $_POST['location'],

                        'dtstart' => $_POST[start_date],

                        'dtend' => $_POST[end_date],

                        'summary' => $_POST['summary'],

                ));


                echo $ics->to_string();

                exit();

        }

}

add_action( 'template_redirect', 'justread_ics_download' );


/**
* Twitter helpfully won't show the image if it's served from an SSL server.
* Most servers are configured to handle images on non-SSL ports so this should
* work.
*
* @param  string $image URL for the twitter card image
* @return none
*/
function check_ssl_twitter_card_image($image) {
return preg_replace("/https/", 'http', $image);
}
// Hook into the Yoast plugin's hooks for handling the Twitter image
add_action('wpseo_twitter_image', 'check_ssl_twitter_card_image');
