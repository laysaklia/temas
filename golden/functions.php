<?php
/**
 * Golden functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Golden
 */

if ( ! function_exists( 'golden_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function golden_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Golden, use a find and replace
	 * to change 'golden' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'golden', get_template_directory() . '/languages' );

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
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         * @link https://developer.wordpress.org/reference/functions/the_post_thumbnail/
	 */
	add_theme_support( 'post-thumbnails' );
        // Featured image sizes for resesponsive display
        // add_image_size ( string $name, int $width, int $height, bool|array $crop = false )

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'   => esc_html__( 'Primary Menu', 'golden' ),
                ) 
        );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', 
                array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
                ) 
        );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', 
                apply_filters( 'golden_custom_background_args', 
                    array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                    ) 
                ) 
        );
        
        /*
	 * This theme styles the visual editor to resemble the theme style.
	 */
	add_editor_style( 'editor-style.css' );
}
endif; // golden_setup
add_action( 'after_setup_theme', 'golden_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function golden_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'golden_content_width', 1197 );
}
add_action( 'after_setup_theme', 'golden_content_width', 0 );

/* allows site owners to create a new menu location which is used to display links to Social Media Profiles */
add_theme_support( 'jetpack-social-menu' );

function golden_social_menu() {
    if ( ! function_exists( 'jetpack_social_menu' ) ) {
        return;
    } else {
        jetpack_social_menu();
    }
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function golden_widgets_init() {
register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Right', 'golden' ),
        'id'            => 'sidebar-1',
        'class'         => 'grid',
        'description'   => __( 'Widget area for the right sidebar.', 'golden' ),
        'before_widget' => '<aside id="%1$s" class="widget grid-item %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
) );
        
register_sidebar( array(
        'name'          => esc_html__( 'Sidebar Left', 'golden' ),
        'id'            => 'sidebar-2',
        'class'         => 'grid',
        'description'   => __( 'Widget area for the left sidebar.', 'golden' ),
        'before_widget' => '<aside id="%1$s" class="widget grid-item %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
) );
}
add_action( 'widgets_init', 'golden_widgets_init' );

/**
 * Remove JetPack style.
 *
 * @link http://www.tjkelly.com/blog/remove-wordpress-jetpack-css/
 */
function golden_remove_jetpack_styles(){
wp_deregister_style('AtD_style'); // After the Deadline
wp_deregister_style('the-neverending-homepage'); // Infinite Scroll
wp_deregister_style('infinity-twentyten'); // Infinite Scroll - Twentyten Theme
wp_deregister_style('infinity-twentyeleven'); // Infinite Scroll - Twentyeleven Theme
wp_deregister_style('infinity-twentytwelve'); // Infinite Scroll - Twentytwelve Theme
}
add_action('wp_print_styles', 'golden_remove_jetpack_styles');

/**
 * Excerpt length.
 *
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/excerpt_length
 */
function golden_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'golden_excerpt_length', 999 );

 /**
 * Enqueue scripts and styles.
 */
function golden_scripts() {
    
         // Get the current layout setting (sidebar left or right)
        $golden_layout = get_option( 'layout_setting' );
        if ( is_page_template( 'page-templates/two-sidebars.php' )) {
            $layout_stylesheet = '/layouts/sidebar-content-sidebar.css';
        } elseif ( is_page_template( 'page-templates/right-sidebar.php' )) {
            $layout_stylesheet = '/layouts/content-sidebar.css';
        } elseif ( is_page_template( 'page-templates/left-sidebar.php' )) {
            $layout_stylesheet = '/layouts/sidebar-content.css';
        } elseif ( is_page_template( 'page-templates/no-sidebar.php' )) {
            $layout_stylesheet = '/layouts/no-sidebar.css';
        } else {
            $layout_stylesheet = '/layouts/sidebar-content-sidebar.css';
        }
        
        wp_enqueue_style( 'golden-layout' , get_template_directory_uri() . $layout_stylesheet );  // Load layout stylesheet
               
        wp_enqueue_style( 'golden-style', golden_get_parent_stylesheet_uri() );  // Load parent theme stylesheet even when child theme is active
        
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/font-awesome/css/font-awesome.css'); // FontAwesome
        wp_enqueue_script( 'golden-hide-search', get_template_directory_uri() . '/js/hide-search.js', array('jquery'), '20160128', true );
        wp_enqueue_script( 'golden-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
        wp_enqueue_script( 'golden-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );
        wp_enqueue_script( 'golden-functions', get_template_directory_uri() . '/js/functions.js', array('jquery'), '20160128', true );
        
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
                wp_enqueue_script( 'comment-reply' );
        }
}
add_action( 'wp_enqueue_scripts', 'golden_scripts' );

/**
 * Return parent stylesheet URI
 */
function golden_get_parent_stylesheet_uri() {
	if ( is_child_theme() ) {
		return trailingslashit( get_template_directory_uri() ) . 'style.css';
	} else {
		return get_stylesheet_uri();
	}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';