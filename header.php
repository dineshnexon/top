<?php
if (! defined('ABSPATH')) die('Direct access forbidden.');
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TopNews
 */
$tn_top_featured_post = '';
$tn_top_featured_post_limit = '';
$tn_top_featured_post_from = '';
$tn_top_featured_post_cat = '';
$top_featured_post_tag = '';

$top_news_boxed_layout = '';
$top_news_header = '';
$page_header = '';
$top_news_header_bg = '';
$top_news_page_option_field = '';
$top_news_logo_url = '';
$top_news_page_option_meta_data = '';
$news_ticker_enabled = '';
$top_news_is_page_brea = '';
$top_news_breadcrumbs_style = '';
$tn_background_header = '';


if (function_exists('cs_get_option')):
    $tn_top_featured_post = cs_get_option('tn_top_featured_post');
    $tn_top_featured_post_limit = cs_get_option('tn_top_featured_post_limit');
    $tn_top_featured_post_from = cs_get_option('tn_top_featured_post_from');
    $tn_top_featured_post_cat = cs_get_option('tn_top_featured_post_cat');
    $top_featured_post_tag = cs_get_option('top_featured_post_tag');    
    
    $top_news_boxed_layout = cs_get_option('tn_boxed_layout');
    $top_news_group_items = cs_get_option('background_image');
    $top_news_logo_opt_m = cs_get_option('site_logo_mobile');
    $top_news_logo_opt_d = cs_get_option('site_logo');

    $top_news_header = cs_get_option('header_style');
    $blog_header_bg = cs_get_option('blog_header_bg');
    $archive_header_bg = cs_get_option('archive_header_bg');    
    $top_news_is_page_brea = cs_get_option('tn_is_breadcrumbs');    
    $top_news_breadcrumbs_style = cs_get_option('tn_breadcrumbs_style');    
    if(is_page()){
        $top_news_page_option_meta_data = get_post_meta(get_the_ID(), '_custom_page_options', true);        
        if (!empty($top_news_page_option_meta_data)):
            $top_news_page_option_field = $top_news_page_option_meta_data['use_theme_option'];
            $top_news_is_page_brea = array_key_exists('is_breadcrumbs', $top_news_page_option_meta_data) ? $top_news_page_option_meta_data['is_breadcrumbs'] : ''; 
        endif;                
    }
    if(!is_page()){
        $top_news_header = cs_get_option('header_style');
        $top_news_post_limit = cs_get_option('slider_post_limit');
        $top_news_post_from = cs_get_option('slider_post_from');
        $top_news_category = cs_get_option('slider_posts_cat');
        $top_news_tag = cs_get_option('slider_posts_tag'); 
    }else if ($top_news_page_option_field == 1){
        $top_news_header = cs_get_option('header_style');
        $top_news_post_limit = cs_get_option('slider_post_limit');
        $top_news_post_from = cs_get_option('slider_post_from');
        $top_news_category = cs_get_option('slider_posts_cat');
        $top_news_tag = cs_get_option('slider_posts_tag');                
    }else if($top_news_page_option_field != 1){
        $top_news_header = @$top_news_page_option_meta_data['page_header_style']; 
        $top_news_post_limit = @$top_news_page_option_meta_data['page_slider_post_limit'];
        $top_news_post_from = @$top_news_page_option_meta_data['page_slider_post_from'];        
        $top_news_category = @$top_news_page_option_meta_data['page_slider_posts_cat'];
        $top_news_tag = @$top_news_page_option_meta_data['page_slider_posts_tag'];
        $tn_background_header = @$top_news_page_option_meta_data['tn_background_header'];
    }else{
        $top_news_header = '1';
    }
    
    if (is_category()){
        $this_category = get_category($cat);
        $this_cat_id = $this_category->cat_ID;
        $cat_page_header_id = cs_get_option('cat_page_header_'.$this_cat_id);
        if(!empty($cat_page_header_id)){
            $page_header = cs_get_option('cat_page_header_'.$this_cat_id);
        }else{
            $page_header = cs_get_option('cat_page_header');
        }                                            
    }else if (is_home()){
        $page_header = cs_get_option('blog_page_header');
    }else{
        $page_header = cs_get_option('page_header');
    }

    $news_ticker_enabled = cs_get_option('news_ticker_enabled');
    $news_ticker_enabled_inner = cs_get_option('news_ticker_enabled_innerpage');
endif;

if(! empty($top_news_logo_opt_m)){
    $top_news_logo_url .= wp_get_attachment_url($top_news_logo_opt_m);
}else if(! empty($top_news_logo_opt_d)){
    $top_news_logo_url .= wp_get_attachment_url($top_news_logo_opt_d);
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
</head>
<?php

function top_news_boxed_background_image($top_news_group_items) {
    if(! empty($top_news_group_items)) {
        $color      = ! empty($top_news_group_items['color']) ? 'background-color: '. $top_news_group_items['color'] .';' : '';
        $image      = ! empty($top_news_group_items['image']) ? 'background-image: url('. $top_news_group_items['image'] .');' : '';
        $cover      = ! empty($top_news_group_items['size']) ? 'background-size: '. $top_news_group_items['size'] .';' : '';
        $repeat     = ! empty($top_news_group_items['repeat']) ? 'background-repeat: '. $top_news_group_items['repeat'] .';' : '';
        $position   = ! empty($top_news_group_items['position']) ? 'background-position: '. $top_news_group_items['position'] .';' : '';
        $attachment = ! empty($top_news_group_items['attachment']) ? 'background-attachment: '. $top_news_group_items['attachment'] .';' : '';                
        echo 'style="'. $color . $image . $cover . $repeat . $position . $attachment .'"';
    }
}
function top_news_body_header_classes( $classes ) {}
?>
<body <?php body_class(); ?> <?php if ($top_news_boxed_layout == 'true'): top_news_boxed_background_image($top_news_group_items);endif; ?>> 
    <div id="wrapper" class="site">
        <?php        
        //featured post on top 
        if (is_front_page()):
            if ($tn_top_featured_post == 1 && $top_news_header != 3):
                top_news_featured_posts_top($tn_top_featured_post_from, $tn_top_featured_post_cat, $top_featured_post_tag, $tn_top_featured_post_limit);
            endif;
        endif;            
        
        if (! empty($top_news_header)) {
            get_template_part('template-parts/headers/header', $top_news_header);
        } else {
            get_template_part('template-parts/headers/header', '1');
        }
        ?>

        <!-- Primary Menu -->
        <div id="mobile-header">
            <div class="head-content">
                <div class="navigation-toggle">
                        <i id="navigation-toggle" class="fa fa-bars"></i>
                </div><!-- /.navigation-toggle -->
                <div class="logo-area">
                    <?php if (!empty($top_news_logo_url)): ?>
                        <a class="navbar-logo" href="<?php echo esc_url(home_url('/')); ?>">
                                <img src="<?php echo esc_url($top_news_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>
                    <?php endif; ?>
                </div><!-- /.logo-area -->

                <div class="search-area mobile-search">
                        <?php get_search_form() ?>
                </div><!-- /.search-area -->
            </div><!-- /.head-content -->

            <div id="mobile-menu" class="mobile-menu">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'mobile_menu',
                        'menu_id' => 'mobile-primary-menu',
                        'menu_class' => 'nav',
                        'container' => false
                   )
               );
                ?>
            </div><!-- /#mobile-menu -->

            <div class="off-canvas"></div>
        </div><!-- /#mobile-menu -->
        <div class="top-slider">
        <?php
            if ($top_news_header === '2' && is_page() && $tn_background_header == '') {
                    top_news_posts_slider_v2($top_news_post_from, $top_news_category, $top_news_tag, $top_news_post_limit);
            } else if($top_news_header === '3' && is_page() && $tn_background_header == '') {
                    top_news_posts_slider($top_news_post_from, $top_news_category, $top_news_tag, $top_news_post_limit,'full');
            }
        ?>
        </div>        
        <div id="content">
            <?php
            if (is_front_page()) {
                $top_news_is_breadcrumbs = 'false';
            } else if (is_page() && (empty($top_news_is_page_brea))){
                $top_news_is_breadcrumbs = 'flase';
            } else if (empty($top_news_is_page_brea)){
                $top_news_is_breadcrumbs = 'flase';
            } else {
                $top_news_is_breadcrumbs = 'true';
            }         
            if(!is_front_page() || (is_front_page() && is_home())) :                    
                    if (is_category() && $page_header == 'true') {
                        $cat_header_bg_id = cs_get_option('cat_header_bg_'.$this_cat_id);
                        $cat_header_bg = cs_get_option('cat_header_bg');
                        if(!empty($cat_header_bg_id)) {
                            $top_news_header_bg = cs_get_option('cat_header_bg_'.$this_cat_id);
                        } else if(!empty($cat_header_bg)) {
                            $top_news_header_bg = cs_get_option('cat_header_bg');
                        } else {
                            $top_news_header_bg = cs_get_option('header_bg');
                        }                        
                    } else if (is_home() && $page_header == 'true') {
                        if(!empty($blog_header_bg)){
                            $top_news_header_bg = cs_get_option('blog_header_bg');
                        } else {
                            $top_news_header_bg = cs_get_option('header_bg'); 
                        }                       
                    } else if (is_archive() && $page_header == 'true') {
                        if(!empty($archive_header_bg)){
                            $top_news_header_bg = cs_get_option('archive_header_bg');
                        } else {
                            $top_news_header_bg = cs_get_option('header_bg'); 
                        }                       
                    } else if ($page_header == 'true') {
                        $top_news_header_bg = cs_get_option('header_bg');                        
                    }
                    
                    if(($top_news_header === '2' && !is_page() && !is_search()) || ($top_news_header === '2' && is_page() && $tn_background_header == '1' && !is_search())) { ?>
                        <div class="page-header transparent v2" data-tp-src="<?php echo wp_get_attachment_url($top_news_header_bg); ?>">
                            <div class="content">
                                <?php if (($top_news_is_breadcrumbs == 'true') && !is_search()): ?>
                                <?php top_news_page_header() ?>
                                <?php endif; ?>
                            </div><!-- /.content -->
                        </div>
                <?php } else if(($top_news_header === '3' && !is_page()) || ($top_news_header === '3' && is_page() && $tn_background_header == '1')) { ?>
                        <div class="page-header v3 transparent" data-tp-src="<?php echo wp_get_attachment_url($top_news_header_bg); ?>">
                            <div class="content">
                                <?php if (($top_news_is_breadcrumbs == 'true') && !is_search()): ?>
                                <?php top_news_page_header() ?>
                                <?php endif; ?>
                            </div><!-- /.content -->
                        </div>
                <?php } else { ?>
                        <?php if ($top_news_is_breadcrumbs == 'true' && !is_search()): ?>
                        <div class="page-header <?php echo $top_news_breadcrumbs_style ?>">                            
                            <?php 
                                if ($top_news_breadcrumbs_style == 'style1'){
                                    top_news_page_header();
                                }else if($top_news_breadcrumbs_style == 'style2'){
                                    top_news_page_header2();
                                }                                                       
                            ?>
                        </div>
                        <?php endif; ?>
                <?php }
                endif; ?>
        <?php

            if($news_ticker_enabled === true && is_front_page()) {
                get_template_part('template-parts/extras/news-ticker');
            } else if ($news_ticker_enabled === true && $news_ticker_enabled_inner === true) {
                get_template_part('template-parts/extras/news-ticker');
            }
        ?>