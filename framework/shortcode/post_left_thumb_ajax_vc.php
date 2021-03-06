<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );
/**
 * Visual Composer Shortcode of LEFT THUMB ajax
 */
if ( function_exists( 'vc_map' ) ) {
class WPBakeryShortCode_tn_post_left_thumb_ajax extends WPBakeryShortCode {

    protected function content($atts, $content = null) {
        extract(shortcode_atts(array(
            'title' 		=> '',            
            'cat_id' 		=> '',            
            'limit' 		=> '',
            'ajax_post_load'    => 'yes',            
            'el_class' 		=> '',                
        ), $atts));
        
    	ob_start();	 		    				
        top_news_post_left_thumb_ajax($title,$cat_id,$limit,$ajax_post_load,$el_class);
        return ob_get_clean();		        	         
    }
}

$cats[]	=	top_news_getcat();
vc_map( array(
    "base"                  => "tn_post_left_thumb_ajax",
    "name"                  => esc_html__("Recent Post Left Thumb (Ajax)", 'top-news'),
    "class"                 => "",
    "category"              => esc_html__('TopNews Ajax', 'top-news'),
    "icon"                  => get_template_directory_uri().'/images/admin/left-thumb.jpg',
    "params" => array(
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Title for this block:", 'top-news'),
            "param_name"    => "title",
            "description"   => esc_html__("Enter text which will be used as this block title. Leave blank if no title is needed.", 'top-news'),
        ),                	    	
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Select category:", 'top-news'),
            "param_name"    => "cat_id",
            "value"         => top_news_getcat(),
            "description"   => esc_html__("Select Category to display", 'top-news')
    	),
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Limit (numeric value only)", 'top-news'),
            "param_name"    => "limit",
            "description"   => esc_html__("Limit of total post Eg: 5, Default value is 5", 'top-news'),
            "default"       =>'5'
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__( "Ajax post load button:", 'top-news' ),
            "param_name"    => "ajax_post_load",
            "value"         => array(
                esc_html__( "Yes",'top-news')	=> "yes",
                esc_html__( "No", 'top-news' )	=> "no",                
            ),
            "default"       =>'yes'
        ),
    	array(
        "type"              => "textfield",
        "heading"           => esc_html__("Extra class name:", 'top-news'),
        "param_name"        => "el_class",
        "description"       => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'top-news')
      )       	    
    )
) );
}