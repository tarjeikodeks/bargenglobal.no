<?php

function bergenglobal_block_category( $categories, $post ) {
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'bergenglobal-blocks',
                'title' => __( 'Custom Blocks', 'kodeks-blocks' ),
            ),
        )
    );
}
add_filter( 'block_categories_all', 'bergenglobal_block_category', 10, 2);


add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {

       
        
        // Hero Image
        acf_register_block_type(array(
            'name'              => 'hero_image',
            'title'             => __('Hero image'),
            'render_template'   => 'blocks/hero_image.php',
            'category'          => 'bergenglobal-blocks',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M0 96C0 60.7 28.7 32 64 32H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM323.8 202.5c-4.5-6.6-11.9-10.5-19.8-10.5s-15.4 3.9-19.8 10.5l-87 127.6L170.7 297c-4.6-5.7-11.5-9-18.7-9s-14.2 3.3-18.7 9l-64 80c-5.8 7.2-6.9 17.1-2.9 25.4s12.4 13.6 21.6 13.6h96 32H424c8.9 0 17.1-4.9 21.2-12.8s3.6-17.4-1.4-24.7l-120-176zM112 192c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48z"/></svg>',
            'keywords'          => array( 'hero-image' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' =>  get_template_directory_uri() . '/blocks/previews/hero_image.jpg',
                    )
                )
            )
        ));
        
        
        
         // Main content
        acf_register_block_type(array(
            'name'              => 'main-content',
            'title'             => __('Main Content'),
            'render_template'   => 'blocks/main-content.php',
            'category'          => 'bergenglobal-blocks',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zM256 0V128H384L256 0zM112 256H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H272c8.8 0 16 7.2 16 16s-7.2 16-16 16H112c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>',
            'keywords'          => array( 'main-content' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' =>  get_template_directory_uri() . '/blocks/previews/main-content.jpg',
                    )
                )
            )
        ));
        
        // Contacts list
        acf_register_block_type(array(
            'name'              => 'contacts-list',
            'title'             => __('Contacts list'),
            'render_template'   => 'blocks/contacts-list.php',
            'category'          => 'bergenglobal-blocks',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm80 256h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm96-96c0 35.3-28.7 64-64 64s-64-28.7-64-64s28.7-64 64-64s64 28.7 64 64zm128-32H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64H496c8.8 0 16 7.2 16 16s-7.2 16-16 16H368c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/></svg>',
            'keywords'          => array( 'contact-list' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' =>  get_template_directory_uri() . '/blocks/previews/contacts-list.jpg',
                    )
                )
            )
        ));
        
        // Events list
        acf_register_block_type(array(
            'name'              => 'events-list',
            'title'             => __('Events list'),
            'render_template'   => 'blocks/events-list.php',
            'category'          => 'bergenglobal-blocks',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm64 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm128 0v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H208c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H336zM64 400v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H80c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H208zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V400c0-8.8-7.2-16-16-16H336c-8.8 0-16 7.2-16 16z"/></svg>',
            'keywords'          => array( 'event-list' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' =>  get_template_directory_uri() . '/blocks/previews/events-list.jpg',
                    )
                )
            )
        ));
        
        // Events list
        acf_register_block_type(array(
            'name'              => 'events-list-pagination',
            'title'             => __('Events list Pagination'),
            'render_template'   => 'blocks/events-list-pagination.php',
            'category'          => 'bergenglobal-blocks',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H512c8.8 0 16-7.2 16-16V96c0-8.8-7.2-16-16-16H64zM0 96C0 60.7 28.7 32 64 32H512c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zm96 64a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm104 0c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm0 96c0-13.3 10.7-24 24-24H448c13.3 0 24 10.7 24 24s-10.7 24-24 24H224c-13.3 0-24-10.7-24-24zm-72-64a32 32 0 1 1 0-64 32 32 0 1 1 0 64zM96 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>',
            'keywords'          => array( 'event-list-pagination' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' =>  get_template_directory_uri() . '/blocks/previews/events-list-pagination.jpg',
                    )
                )
            )
        ));
        
        // Events banner
        acf_register_block_type(array(
            'name'              => 'event-banner',
            'title'             => __('Event banner'),
            'render_template'   => 'blocks/event-banner.php',
            'category'          => 'bergenglobal-blocks',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M152 64H296V24C296 10.75 306.7 0 320 0C333.3 0 344 10.75 344 24V64H384C419.3 64 448 92.65 448 128V448C448 483.3 419.3 512 384 512H64C28.65 512 0 483.3 0 448V128C0 92.65 28.65 64 64 64H104V24C104 10.75 114.7 0 128 0C141.3 0 152 10.75 152 24V64zM48 448C48 456.8 55.16 464 64 464H384C392.8 464 400 456.8 400 448V192H48V448z"/></svg>',
            'keywords'          => array( 'event-banner' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' =>  get_template_directory_uri() . '/blocks/previews/event-banner.jpg',
                    )
                )
            )
        ));
        
        // Contact section
        acf_register_block_type(array(
            'name'              => 'contact-info',
            'title'             => __('Contact info'),
            'render_template'   => 'blocks/contact-info.php',
            'category'          => 'bergenglobal-blocks',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M384 476.1L192 421.2V35.9L384 90.8V476.1zm32-1.2V88.4L543.1 37.5c15.8-6.3 32.9 5.3 32.9 22.3V394.6c0 9.8-6 18.6-15.1 22.3L416 474.8zM15.1 95.1L160 37.2V423.6L32.9 474.5C17.1 480.8 0 469.2 0 452.2V117.4c0-9.8 6-18.6 15.1-22.3z"/></svg>',
            'keywords'          => array( 'contact-info' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' =>  get_template_directory_uri() . '/blocks/previews/contact-info.jpg',
                    )
                )
            )
        ));
        
        // Upcoming events list
        acf_register_block_type(array(
            'name'              => 'upcoming-events-list',
            'title'             => __('Upcoming events list'),
            'render_template'   => 'blocks/upcoming-events-list.php',
            'category'          => 'bergenglobal-blocks',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zm80 64c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16H368c8.8 0 16-7.2 16-16V272c0-8.8-7.2-16-16-16H80z"/></svg>',
            'keywords'          => array( 'upcoming-events-list' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' =>  get_template_directory_uri() . '/blocks/previews/upcoming-events-list.jpg',
                    )
                )
            )
        ));
        
        // Past events slider
        acf_register_block_type(array(
            'name'              => 'past-events-slider',
            'title'             => __('Past events slider'),
            'render_template'   => 'blocks/past-events-slider.php',
            'category'          => 'bergenglobal-blocks',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>',
            'keywords'          => array( 'past-events-slider' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' =>  get_template_directory_uri() . '/blocks/previews/past-events-slider.jpg',
                    )
                )
            )
        ));
        
        // Search banner
        acf_register_block_type(array(
            'name'              => 'search-banner',
            'title'             => __('Search banner'),
            'render_template'   => 'blocks/search-banner.php',
            'category'          => 'bergenglobal-blocks',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352c79.5 0 144-64.5 144-144s-64.5-144-144-144S64 128.5 64 208s64.5 144 144 144z"/></svg>',
            'keywords'          => array( 'search-banner' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' =>  get_template_directory_uri() . '/blocks/previews/search-banner.jpg',
                    )
                )
            )
        ));
        
         // Contact Form Section
        acf_register_block_type(array(
            'name'              => 'contact-form-section',
            'title'             => __('Contact form section'),
            'render_template'   => 'blocks/contact-form-section.php',
            'category'          => 'bergenglobal-blocks',
            'icon'              => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M448 75.2v361.7c0 24.3-19 43.2-43.2 43.2H43.2C19.3 480 0 461.4 0 436.8V75.2C0 51.1 18.8 32 43.2 32h361.7c24 0 43.1 18.8 43.1 43.2zm-37.3 361.6V75.2c0-3-2.6-5.8-5.8-5.8h-9.3L285.3 144 224 94.1 162.8 144 52.5 69.3h-9.3c-3.2 0-5.8 2.8-5.8 5.8v361.7c0 3 2.6 5.8 5.8 5.8h361.7c3.2.1 5.8-2.7 5.8-5.8zM150.2 186v37H76.7v-37h73.5zm0 74.4v37.3H76.7v-37.3h73.5zm11.1-147.3l54-43.7H96.8l64.5 43.7zm210 72.9v37h-196v-37h196zm0 74.4v37.3h-196v-37.3h196zm-84.6-147.3l64.5-43.7H232.8l53.9 43.7zM371.3 335v37.3h-99.4V335h99.4z"/></svg>',
            'keywords'          => array( 'contact-form-section' ),
            'example'  => array(
                'attributes' => array(
                    'mode' => 'preview',
                    'data' => array(
                        'preview_image_help' =>  get_template_directory_uri() . '/blocks/previews/contact-form-section.jpg',
                    )
                )
            )
        ));
        
    }
};

// --------- Allow blocks -------- 

function wpse_allowed_block_types($allowed_block_types, $post) {

    return array(
        'acf/example',
        'acf/hero-image',
        'acf/excerpt',
        'acf/fullwidth-text',
        'acf/main-content',
        'acf/contacts-list',
        'acf/events-list',
        'acf/events-list-pagination',
        'acf/event-banner',
        'acf/contact-info',
        'acf/upcoming-events-list',
        'acf/past-events-slider',
        'acf/search-banner',
        'acf/contact-form-section'
    );

}
add_filter('allowed_block_types_all', 'wpse_allowed_block_types', 10, 2);
