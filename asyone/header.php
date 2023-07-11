<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> •:• <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>

    <div id="wrap">
        <header>
            <a href="<?php echo esc_url(home_url('/')) ?>">
                <img style="width:100px" src="<?php echo get_template_directory_uri() ?>/assets/felogo.png" alt="Logotipo de <?php bloginfo('name') ?>">
                <h1 style="display:none"><?php bloginfo('name') ?></h1>
                <small style="display:none"><?php bloginfo('description') ?></small>
            </a>
        </header>
        <nav>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_class' => 'menu'
                )
            )
            ?>
        </nav>
