<?php if ( ! defined( 'ABSPATH' ) ) die( 'Direct access forbidden.' );
/**
 * Helper functions used all over the theme
 *
 * @package TopNews
 * @author Codexcoder
 */

if ( ! function_exists( 'top_news_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function top_news_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on TopNews, use a find and replace
         * to change 'top-news' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'top-news', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );
        
        /*
         * Enable support for woocommerce
         * 
         */
        add_theme_support( 'woocommerce' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

        /*
         * Post Thumbnail Size
         *
         * @link https://developer.wordpress.org/reference/functions/add_image_size/
         */
        add_image_size( 'top-news-large-slider', 1140, 570, true );
        add_image_size( 'top-news-thumbnail-x2', 360, 260, true );
        add_image_size( 'top-news-slider-thumb', 368, 164, true );
        add_image_size( 'top-news-large-featured', 760, 320, true );
        add_image_size( 'top-news-thumbnail-featured', 380, 320, true );
        add_image_size( 'top-news-3-col-featured', 376, 316, true );
        add_image_size( 'top-news-gallery-wide', 555, 320, true );



        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );
        
        // Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'top_news_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/themes/functionality/post-formats/
         */
        add_theme_support('post-formats', array('video'));
        

    }
endif; // top_news_setup

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function top_news_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'top_news_content_width', 640 );
}