<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );

if ( function_exists( 'vc_map' ) ) {
class WPBakeryShortCode_tn_photo_gallery extends WPBakeryShortCode {


    protected function content($atts, $content = null) {
        extract(shortcode_atts(array(
            'title' 		=> '',
            'cat_id' 		=> '',
            'categorie_slug'    => '', 
            'tag'               => '', 
            'orderby' 		=> '',
            'order' 		=> '',
            'el_class' 		=> '',                
        ), $atts));
        
    	ob_start();	 		    				
        top_news_photo_gallery($title,$cat_id,$categorie_slug,$tag,$orderby,$order,$el_class);
        return ob_get_clean();
		        
	         
    }
}



/*
 ---------------------------------------------------------- */
/* ivi News By Cats For Pagebuider
---------------------------------------------------------- */
$cats[]	=	top_news_getcat();
vc_map( array(
    "base"                  => "tn_photo_gallery",
    "name"                  => esc_html__("PHOTO GALLERY", 'top-news'),
    "class"                 => "",
    "category"              => esc_html__('TopNews', 'top-news'),
    "icon"                  => get_template_directory_uri().'/images/admin/photo-gallery.jpg',
    "params" => array(
        array(
            "type"          => "textfield",
            "heading"       => esc_html__("Widget title", 'top-news'),
            "param_name"    => "title",
            "description"   => esc_html__("Enter text which will be used as widget title. Leave blank if no title is needed.", 'top-news'),
            "admin_label"   => true
        ),              	
	array(
            "type"          => "dropdown",
            "heading"       => esc_html__("Select category:", 'top-news'),
            "param_name"    => "cat_id",
            "value"         => top_news_getcat(),
            "description"   => esc_html__("Select Category to display", 'top-news')
    	),    	
        array(
            "type" => "textfield",
            "heading"       => esc_html__("Multiple categories filter:", "top-news"),
            "param_name"    => "categorie_slug",
            "description"   => esc_html__("Filter multiple categories by category slug separated by commas Eg: fashion-news,tech-land,sport-news. Leave empty if you want to select category from dropdown list above", "top-news"),
        ),      	
        array(
            "type" => "textfield",
            "heading"       => esc_html__("Filter by tag slug:", "top-news"),
            "param_name"    => "tag",
            "description"   => esc_html__("To filter multiple tag slugs, enter here the tag slugs separated by commas (ex: tag1,tag2,tag3). Leave empty if you want to display post from Category or Category slug", "top-news"),
        ), 
    	array(
            "type"          => "dropdown",
            "heading"       => esc_html__( "Order By", 'top-news' ),
            "param_name"    => "orderby",
            "description"   => esc_html__( 'Select how to sort retrieved posts. More at %s.', 'top-news' ), 
            "value"		=> array(
                esc_html__( "Select order by",'top-news')	=> "DESC",
                esc_html__( "Date", 'top-news' )		=> "date",
                esc_html__( "Name", 'top-news' )		=> "name",
                esc_html__( "Modified", 'top-news' )	=> "modified",
                esc_html__( "Author", 'top-news' )	=> "author",
                esc_html__( "Random", 'top-news' )	=> "rand",
                esc_html__( "Comment Count", 'top-news' )=> "comment_count",
            ),
        ),
        array(
            "type"          => "dropdown",
            "heading"       => esc_html__( "Order", 'top-news' ),
            "param_name"    => "order",
            "description"   => sprintf( esc_html__( 'Designates the ascending or descending order. More at %s.', 'top-news' ), '<a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex</a>' ),
            "value"		=> array(
                esc_html__( "Select order",'top-news')	=> "DESC",
                esc_html__( "DESC",'top-news')	=> "DESC",
                esc_html__( "ASC", 'top-news' )	=> "ASC",
            ),
        ),  
    	array(
        "type"              => "textfield",
        "heading"           => esc_html__("Extra class name", 'top-news'),
        "param_name"        => "el_class",
        "description"       => esc_html__("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'top-news')
      )       	    
    )
) );
}