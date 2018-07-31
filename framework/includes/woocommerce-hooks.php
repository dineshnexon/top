<?php
/** Remove breadcrumbs from woocommerce pages */
add_action( 'init', 'plumber_zone_remove_wc_breadcrumbs' );
function plumber_zone_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}


//Change number of thumbnails per row in product galleries
add_filter ( 'woocommerce_product_thumbnails_columns', 'plumber_zone_thumb_cols' );
 function plumber_zone_thumb_cols() {
     return 4; // .last class applied to every 4th thumbnail
 }

