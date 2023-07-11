<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|', true, 'right'); ?></title>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header id="masthead" class="site-header" role="banner">
    <div class="container">
      <div class="site-branding">
        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
        <p class="site-description"><?php bloginfo('description'); ?></p>
      </div>
      <?php get_search_form(); ?>
    </div>
  </header>