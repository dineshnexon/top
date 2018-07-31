<?php
if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TopNews
 */
$top_news_sidebar_meta_field = '';

if (function_exists('cs_get_option')):
    $blog_template_sidebar_option_2 = cs_get_option( 'blog_template_sidebar_option_2' );

    if (is_page()){
        $top_news_layout_meta_data = get_post_meta( get_the_ID(), '_custom_page_side_options', true );
        $top_news_sidebar_meta_field = $top_news_layout_meta_data['sidebar_option_2'];
    }else if (is_home()){
        if(!empty($blog_template_sidebar_option_2)){
            $top_news_sidebar_meta_field = cs_get_option( 'blog_template_sidebar_option_2' );
        }else{
            $top_news_sidebar_meta_field = cs_get_option( 'page_sidebar_option_2' );
        }
    } else if (class_exists( 'WooCommerce' ) && is_woocommerce()) {
        $shop_template_sidebar_option_2 = cs_get_option( 'shop_template_sidebar_option_2');
        if (!empty($shop_template_sidebar_option_2)){
            $top_news_sidebar_meta_field = cs_get_option( 'shop_template_sidebar_option_2' );
        } else {
            $top_news_sidebar_meta_field = cs_get_option( 'page_sidebar_option_2' );
        }    
    }else if (is_category()){
        $this_category = get_category($cat);
        $this_cat_id = $this_category->cat_ID;
        $category_template_sidebar_option_2_id = cs_get_option( 'category_template_sidebar_option_2_'.$this_cat_id );                    
        $category_template_sidebar_option_2 = cs_get_option( 'category_template_sidebar_option_2');
        $archive_template_sidebar_option_2 = cs_get_option( 'archive_template_sidebar_option_2');
        $single_page_sidebar_option_2 = cs_get_option( 'single_page_sidebar_option_2');

        if(!empty($category_template_sidebar_option_2_id)){
            $top_news_sidebar_meta_field = cs_get_option( 'category_template_sidebar_option_2_'.$this_cat_id );
        }else if (!empty($category_template_sidebar_option_2)){
            $top_news_sidebar_meta_field = cs_get_option( 'category_template_sidebar_option_2' );
        }else{
            $top_news_sidebar_meta_field = cs_get_option( 'page_sidebar_option_2' );
        }           
    }else if (is_archive()){
        if (!empty($archive_template_sidebar_option_2)){
            $top_news_sidebar_meta_field = cs_get_option( 'archive_template_sidebar_option_2' );
        }else{
            $top_news_sidebar_meta_field = cs_get_option( 'page_sidebar_option_2' );
        }
    }else if (is_single()){
        if (!empty($single_page_sidebar_option_2)){
            $top_news_sidebar_meta_field = cs_get_option( 'single_page_sidebar_option_2' );
        }else{
            $top_news_sidebar_meta_field = cs_get_option( 'page_sidebar_option_2' );
        }
    }
endif;
?>
<div class="col-md-2 sidebar sidebar-small">
    <div class="theiaStickySidebar">
        <div id="secondary" class="widget-area primary-sidebar" role="complementary">
            <?php                
                if (!empty($top_news_sidebar_meta_field)){
                    dynamic_sidebar( $top_news_sidebar_meta_field ); 
                }else{
                    dynamic_sidebar( 'sidebar-left' );
                }                
            ?>
        </div><!-- #secondary -->
    </div>
</div>
