<?php
/**
 * The sidebar containing the left widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Golden
 */
?>

<?php if ( is_active_sidebar( 'sidebar-2' )  ) : ?>
	 <div id="tertiary" class="widget-area grid" role="complementary">
                        <?php dynamic_sidebar( 'sidebar-2' ); ?>
                   </div><!-- #tertiary -->
<?php endif; ?>
                  
<?php if ( ! is_active_sidebar( 'sidebar-2' )  ) : ?>
	<div id="tertiary" role="complementary">
                  </div><!-- #secondary -->
<?php endif; ?>