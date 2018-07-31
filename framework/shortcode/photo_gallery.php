<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );
/**
 * Photo Gallery Widget
 * @param $limit int limit
 * @param $cat_ids bool cat ids
 */

function top_news_photo_gallery($title,$cat_id,$categorie_slug,$tag,$orderby,$order,$el_class) {
    $unqID = uniqid();
    $k = 0;                        
    if($tag != ''){
        $query_args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 6,
            'order'             => $order,
            'orderby'           => $orderby,
            'paged'             => 1,
            'tag'               => $tag,
        );            
    } else if($categorie_slug != '' && $tag == ''){		
        $query_args = array(
            'post_type'		=> 'post',
            'posts_per_page'	=> 6,
            'order'             => $order,
            'orderby'		=> $orderby,				 
            'paged'             => 1, 
            'category_name' 	=> $categorie_slug,
        );
    } else if( $cat_id == true && !empty($cat_id[0]) && $categorie_slug == '') {
        $query_args = array(
            'post_type' => 'post',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'term_id',
                    'terms'    => $cat_id,
                ),
            ),
            'post_status'         => 'publish',
            'posts_per_page'      =>  6,
            'order'               => $order,
            'orderby'             => $orderby,
            'ignore_sticky_posts' => true,
        );
    } else {
        $query_args = array(
            'post_type' => 'post',
            'post_status'         => 'publish',
            'posts_per_page'      =>  6,
            'order'		=> $order,
            'orderby'		=> $orderby,
            'ignore_sticky_posts' => true,
        );
    }       
    $the_query = new WP_Query( $query_args );
    $cats[]	= top_news_getcat();    
?>
    <div id="photo-gallery-<?php echo esc_attr($unqID); ?>" class="posts-widget post-photo-gallery-widget block <?php echo esc_attr($el_class); ?>">
        <?php if(! empty($title)) : ?>
        <h2 class="widget-title"><span><?php echo esc_html($title); ?></span></h2>
        <div class="clearfix"></div>
        <?php endif; ?>            
        <div class="gallery-container shortcode-gallery-container prettygallery <?php echo esc_attr($el_class); ?>">
            <?php
            if ( $the_query->have_posts() ) :
                while ( $the_query->have_posts() ) : $the_query->the_post();
                $post_id  = get_the_ID();
                $thumb_id = get_post_thumbnail_id( $post_id );
                $img_src  = wp_get_attachment_url( $thumb_id );                      
                if ( has_post_thumbnail() ) :
            ?>
                <div class="col-md-4 col-sm-4 col-xs-4 pad0">
                    <div class="tn-gallery-item">
                        <?php the_post_thumbnail('top-news-3-col-featured'); ?>
                        <div class="overlay">
                            <div class="caption">
                                <a class="tp-lightbox action" href="<?php echo esc_url($img_src); ?>" rel="prettyPhoto"><i class="fa fa-search"></i></a>                            
                            </div><!-- /.caption -->
                        </div><!-- /.overlay -->
                    </div><!-- /.gallery-item -->
                </div><!-- /.col-md-4 -->                
            <?php endif; 
            endwhile;
            wp_reset_postdata();                    
            else : ?>
            <p><?php esc_html__( 'Sorry, no posts matched your criteria.' , 'top-news'); ?></p>
            <?php endif; ?>
            <div class="clearfix"></div>
        </div><!-- /.gallery-container -->
    </div><!-- /.posts-widget -->
<?php }