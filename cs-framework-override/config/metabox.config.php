<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();

// -----------------------------------------
// Page Metabox Options                    -
// -----------------------------------------
$options[]    = array(
    'id'        => '_custom_page_options',
    'title'     => 'Top New Page Options',
    'post_type' => 'page',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

        // begin: a section
        array(
            'name'  => 'section_1',
            'icon'  => 'fa fa-cog',

            // begin: fields
            'fields' => array(                
                array(
                    'id'    => 'is_breadcrumbs',
                    'type'  => 'switcher',
                    'title' => 'Breadcrumbs',
                    'label' => 'if you want to enable Breadcrumbs for this page switch "on" to this button',
                    'default' => false
                ),                
                array(
                    'type'    => 'heading',
                    'content'   =>  esc_html__('Header & Slider Settings', 'top-news'),
                    'dependency' => array( 'use_theme_option', '==', 'false' ),
                ),
                array(
                    'id'    => 'use_theme_option',
                    'type'  => 'switcher',
                    'title' => 'Use seetings from top news panel',
                    'label' => 'if you want different seetings for this page please switch "off" to this button',
                    'default' => true
                ),
                array(
                    'id'         => 'page_header_style',
                    'type'       => 'radio',
                    'title'      =>  esc_html__('Header Style', 'top-news'),
                    'class'      => 'horizontal',
                    'options'    => array(
                        '1'    =>  esc_html__('Header 1 (Default)', 'top-news'),
                        '2'    =>  esc_html__('Header 2 (Fashion)', 'top-news'),
                        '3'    =>  esc_html__('Header 3 (Sports)', 'top-news'),                        
                        '4'    =>  esc_html__('Header 4 (Black Menu)', 'top-news'),                        
                        '5'    =>  esc_html__('Header 5 (Black Menu 2)', 'top-news'),                        
                        '6'    =>  esc_html__('Header 6 (Theme Color Menu)', 'top-news'),                                               
                        '7'    =>  esc_html__('Header 7 (Viral & Buzz)', 'top-news'),
                        '8'    =>  esc_html__('Header 8 (Dark Header with any color menu)', 'top-news'),                        
                        '9'    =>  esc_html__('Header 9 (Light Header with any color menu)', 'top-news'), 
                    ),
                    'dependency' => array( 'use_theme_option', '==', 'false' ),
                    'default'    => '1'
                ),
                array(
                    'id'      => 'page_slider_post_limit',
                    'type'    => 'number',
                    'title'   =>  esc_html__('Limit Slider Posts:', 'top-news'),
                    'default'   => '5',
                    'dependency' => array( 'use_theme_option', '==', 'false' ),
                ),
                array(
                    'id'           => 'page_slider_post_from',
                    'type'         => 'radio',
                    'class'        => 'horizontal',
                    'title'        =>  esc_html__('Display Slider Post from?', 'top-news'),
                    'options'      => array(
                        'category'     =>  esc_html__('Category', 'top-news'),
                        'tag'          =>  esc_html__('Tag', 'top-news'),
                        'all'          =>  esc_html__('All', 'top-news'),
                    ),
                    'default'   => 'all',
                    'dependency' => array( 'use_theme_option', '==', 'false' ),
                ),
                array(
                    'id'             => 'page_slider_posts_cat',
                    'type'           => 'select',
                    'title'          =>  esc_html__('Category:', 'top-news'),
                    'options'        => 'categories',
                    'query_args'     => array(
                        'orderby'      => 'name',
                        'order'        => 'ASC',
                    ),
                    'attributes' => array(
                        'multiple' => 'multiple',
                        'style'    => 'width: 200px; height: 150px;'
                    ),                    
                    'default_option' =>  esc_html__('Select category', 'top-news'),
                    'dependency'      => array( 'page_slider_post_from_category', '==', 'true' ),

                ),
                array(
                    'id'             => 'page_slider_posts_tag',
                    'type'           => 'select',
                    'title'          =>  esc_html__('Tag:', 'top-news'),
                    'options'        => 'tag',
                    'query_args'     => array(
                        'orderby'      => 'name',
                        'order'        => 'ASC',
                    ),
                    'attributes' => array(
                        'multiple' => 'multiple',
                        'style'    => 'width: 200px; height: 150px;'
                    ),                    
                    'default_option' =>  esc_html__('Select tag', 'top-news'),
                    'dependency'      => array( 'page_slider_post_from_tag', '==', 'true' ),
                ),
                array(
                    'id'    => 'tn_background_header',
                    'type'  => 'switcher',
                    'title' => 'Use Background Image Header(for 2 , 3)',
                    'label' => 'If you want to enable Breadcrumbs for this page switch "on" to this button',
                    'default' => false,
                    'dependency' => array( 'use_theme_option', '==', 'false' ),
                ),
                array(
                    'type'    => 'heading',
                    'content'   =>  esc_html__('Featured Post Grid Settings', 'top-news'),
                    'dependency' => array( 'use_theme_option', '==', 'false' ),
                ),        
                array(
                    'id'         => 'page_featured_post_grid',
                    'type'       => 'switcher',
                    'title'      => 'Featured Post',
                    'default'    => false,
                    'dependency' => array( 'use_theme_option', '==', 'false' ),
                ),
                array(
                    'id'             => 'page_featured_post_layout',
                    'type'           => 'select',
                    'title'          => 'Select Featured Post Layout',
                    'options'        => array(
                        '2-4-col'    => '2/4 column',
                        '2-4-col-v2'    => '2/4 column (v2)',
                        '2-3-col'    => '2/3 column',                        
                        '3-col'      => '3 columon',
                        'slider-thumb'      => 'Slider With Thumbnail Image',
                        'slider-no-thumb'      => 'Slider Without Thumbnail Image',
                    ),
                    'dependency' => array( 'page_featured_post_grid', '==', 'true' ) // dependency rule 
                ),        
                array(
                    'id'      => 'page_featured_post_limit',
                    'type'    => 'number',
                    'title'   =>  esc_html__('Limit Featured Posts:', 'top-news'),
                    'default'   => '6',
                    'dependency' => array( 'page_featured_post_grid', '==', 'true' ) // dependency rule
                ),        
                array(
                    'id'           => 'page_featured_post_from',
                    'type'         => 'radio',
                    'class'        => 'horizontal',
                    'title'        =>  esc_html__('Display Post from?', 'top-news'),
                    'options'      => array(
                        'category'     =>  esc_html__('Category', 'top-news'),
                        'tag'          =>  esc_html__('Tag', 'top-news'),
                        'all'          =>  esc_html__('All', 'top-news'),
                    ),
                    'default'   => 'all',
                    'dependency' => array( 'page_featured_post_grid', '==', 'true' ) // dependency rule
                ),
                array(
                    'id'             => 'page_featured_posts_cat',
                    'type'           => 'select',
                    'title'          =>  esc_html__('Category:', 'top-news'),
                    'options'        => 'categories',
                    'query_args'     => array(
                        'orderby'      => 'name',
                        'order'        => 'ASC',
                    ),
                    'attributes' => array(
                        'multiple' => 'multiple',
                        'style'    => 'width: 200px; height: 150px;'
                    ),
                    'default_option' =>  esc_html__('Select category', 'top-news'),
                    'dependency'      => array( 'page_featured_post_from_category', '==', 'true' ),

                ),
                array(
                    'id'             => 'page_featured_posts_tag',
                    'type'           => 'select',
                    'title'          =>  esc_html__('Tag:', 'top-news'),
                    'options'        => 'tag',
                    'query_args'     => array(
                        'orderby'      => 'name',
                        'order'        => 'ASC',
                    ),
                    'attributes' => array(
                        'multiple' => 'multiple',
                        'style'    => 'width: 200px; height: 150px;'
                    ),
                    'default_option' =>  esc_html__('Select tag', 'top-news'),
                    'dependency'      => array( 'page_featured_post_from_tag', '==', 'true' ),
                ),
            ), // end: fields
        ), // end: a section

        

    ),
);

// -----------------------------------------
// Page Side Metabox Options               -
// -----------------------------------------

// --------- Post Type  -----------------
//$options[]    = array(
//    'id'        => '_tn_advance_post_type',
//    'title'     => 'Advance Post Type',
//    'post_type' => 'post',
//    'context'   => 'side',
//    'priority'  => 'default',
//    'sections'  => array(
//
//        array(
//            'name'   => 'tn_advance_post_type_meta',
//            'fields' => array(                
//                array(
//                  'id'       => 'tn_advance_post_type_option',
//                  'type'     => 'checkbox',
//                  'options'  => array(
//                    'featured'  => 'Keep Featured',
//                    'trending'   => 'Keep Trending',
//                    'hot' => 'Keep Hot',                    
//                  ),
//                ),
//
//            ),
//        ),
//
//    ),
//);

// --------- Page Layout  -----------------
$options[]    = array(
    'id'        => '_custom_page_side_options',
    'title'     => 'Select Page Layout',
    'post_type' => 'page',
    'context'   => 'side',
    'priority'  => 'default',
    'sections'  => array(

        array(
            'name'   => 'section_3',
            'fields' => array(
                array(
                    'id'        => 'section_3_image_select',
                    'type'      => 'image_select',
                    'options'   => array(
                        'v1' => get_template_directory_uri().'/images/admin/t-style-01.jpg',
                        'v2' => get_template_directory_uri().'/images/admin/t-style-02.jpg',
                        'v3' => get_template_directory_uri().'/images/admin/t-style-03.jpg',
                        'v4' => get_template_directory_uri().'/images/admin/t-style-04.jpg',
                        'v5' => get_template_directory_uri().'/images/admin/t-style-05.jpg',                        
                        'v6' => get_template_directory_uri().'/images/admin/t-style-06.jpg',
                    ),
                    'default'   => 'v2',
                ),
                array(
                    'id'             => 'sidebar_option_1',
                    'type'           => 'select',
                    'title'          => 'Sidebar 1',
                    'options'        => top_news_get_registered_sidebars(),
                    'default_option' => 'Select a sidebar',
                ),
                array(
                  'id'             => 'sidebar_option_2',
                  'type'           => 'select',
                  'title'          => 'Sidebar 2',
                  'options'        => top_news_get_registered_sidebars(),
                  'default_option' => 'Select a sidebar',
                )  
            ),
        ),

    ),
);
// -----------------------------------------
// Post Metabox Options                    -
// -----------------------------------------
$options[]      = array(
    'id'            => '_post_template_options',
    'title'         => 'Post Settings',
    'post_type'     => 'post', // or post or CPT or array( 'page', 'post' )
    'context'       => 'normal',
    'priority'      => 'default',
    'sections'      => array(
        array(
            'name'   => 'template_list',
            'fields' => array(
            array(
                'id'             => 'single_post_style',
                'type'           => 'select',
                'title'          =>  esc_html__('Post Style:', 'top-news'),
                'options'     => array(
                    ''  =>  esc_html__('Option Panel Style','top-news'),             
                    'default-style'  =>  esc_html__('Default','top-news'),             
                    'style-1'  =>  esc_html__('Style 1','top-news'),             
                    'style-2'  =>  esc_html__('Style 2','top-news'),             
                    'style-3'  =>  esc_html__('Style 3','top-news'),
                    'style-4'  =>  esc_html__('Style 4','top-news'),
                ),
                'default'       => '',
            ), 
            ),
        ),        
    ),
);

// -----------------------------------------
// Post Metabox Options                    -
// -----------------------------------------
$options[]    = array(
    'id'        => '_format-video',
    'title'     => 'Featured Video',
    'post_type' => 'post',
    'context'   => 'normal',
    'priority'  => 'default',
    'sections'  => array(

        array(
            'name'   => 'video_settings',
            'fields' => array(                
                array(
                    'id'            => 'embedded_link', // another unique id
                    'type'          => 'text',
                    'title'         =>  esc_html__('Video Link','top-news'),
                    'desc'          =>  esc_html__('You can add Youtube, Vimeo or Dailymotion video link here.','top-news'),
                ),

            ),
        ),

    ),
);

CSFramework_Metabox::instance( $options );
