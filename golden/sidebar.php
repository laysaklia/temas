<?php
/**
 * The sidebars containing the main widget (secondary) area and navigation (tertiary).
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Golden
 */


// Active widgets in sidebars boolean check.  If none then collapse sidebar.

if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}

// If we get this far, we have widgets that will display with the following...
?>

<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
                <div id="secondary" class="widget-area grid" role="complementary">
                    <?php dynamic_sidebar( 'sidebar-1' ); ?>
                </div><!-- #secondary -->
<?php endif; ?>

<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>                
                <div id="tertiary" class="widget-area grid" role="complementary">
                    <?php dynamic_sidebar( 'sidebar-2' ); ?>
                </div><!-- #tertiary -->
<?php endif; ?>               