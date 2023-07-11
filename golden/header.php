<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Golden
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    
                  <header id="masthead" class="site-header" role="banner">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'golden' ); ?></a>
        
                        <div class="site-branding" >
                            <div class="site-header-main">



                                <?php if ( is_front_page() && is_home() ) : ?>
                                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                                    <?php else : ?>
                                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                                    <?php endif;
                                    $description = get_bloginfo( 'description', 'display' );
                                    if ( $description || is_customize_preview() ) : ?>
                                            <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
                                    <?php endif; ?>



                            </div> <!-- .site-header-main -->
                    </div><!-- .site-branding -->
        
                        <nav id="site-navigation" class="main-navigation" role="navigation">
                            
                                    <div class="toggle-container">
                                        <h1 class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><a href="#"><?php esc_html_e( 'Menu', 'golden' ); ?></a></h1>
                                        <div class="search-toggle">
                                                    <i class="fa fa-search"></i>
                                                    <a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'golden' ); ?></a>
                                        </div>
                                    </div><!-- .toggle-container -->
                            
                                    <div id="header-search-container" class="search-box-wrapper clear hide">
                                        <div class="search-box clear">
                                                <?php get_search_form(); ?>
                                        </div>
                                    </div><!-- #header-search-container -->

                                    <?php wp_nav_menu( 
                                            array( 
                                                'theme_location'    => 'primary', 
                                                'container_id'    => 'primary-container',
                                                'menu_id'           => 'primary-menu',

                                            ) 
                                        ); 
                                    ?>

                                    

                            </nav><!-- #site-navigation -->

                    <?php
                       if ( get_header_image() && !('blank' == get_header_textcolor()) ) {
                           echo '<div class="site-header header-background-image" style="background-image: url(' . get_header_image() . ')">';
                       } else {
                           echo '<div class="site-header">';
                       }
                       
                    ?>
                            <title id="header-image-title"> <?php the_title(''); ?> </title>
                            </div>
                            
                            
                  </header><!-- #masthead -->

	<div id="content" class="site-content">