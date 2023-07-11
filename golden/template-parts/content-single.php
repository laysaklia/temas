<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Golden
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<div class="entry-meta">
			<?php golden_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php the_content(); ?>
            
                                    <div id="author-info">
                                        
                                        <div id="author-avatar">
                                            <?php echo get_avatar( get_the_author_meta('user_email'), '150', '' ); ?>
                                            <?php golden_social_menu(); ?>
                                        </div><!-- .author-avatar -->
                                        
                                        <div id="author-description">
                                            <h3><?php the_author_link(); ?></h3>
                                            <p><?php the_author_meta('description'); ?></p>
                                        </div><!-- .author-description -->
                                        
                                    </div><!-- .author-info -->
                                    
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'golden' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php golden_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
