<?php get_header(); ?>

<div class="container">
  <div class="site-content">
    <div id="primary">
      <main id="main" class="site-main" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <header class="entry-header">
              <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>
            <div class="entry-content">
              <?php the_content(); ?>
            </div>
          </article>
        <?php endwhile; endif; ?>
      </main>
    </div>

    <div id="secondary">
      <aside id="sidebar" class="widget-area" role="complementary">
        <?php dynamic_sidebar('sidebar-1'); ?>
      </aside>
    </div>
  </div>
</div>

<?php get_footer(); ?>