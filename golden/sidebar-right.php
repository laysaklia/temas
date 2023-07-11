<?php
/**
 * The sidebar containing the right widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Golden
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div id="secondary" class="widget-area grid" role="complementary">
                           <?php dynamic_sidebar( 'sidebar-1' ); ?>
                  </div><!-- #secondary -->
<?php endif; ?>
                  
<?php if ( ! is_active_sidebar( 'sidebar-1' )  ) : ?>
	<div id="secondary" role="complementary">
                  </div><!-- #secondary -->
<?php endif; ?>

