<?php
function meu_tema_registrar_menus() {
  register_nav_menus(array(
    'primary' => 'Menu Principal',
    'footer' => 'Menu do Rodapé'
  ));
}
add_action('after_setup_theme', 'meu_tema_registrar_menus');
?>

<?php
function meu_tema_registrar_widgets() {
  register_sidebar(array(
    'name' => 'Barra Lateral',
    'id' => 'sidebar-1',
    'description' => 'Área de widgets na barra lateral',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>'
  ));
}
add_action('widgets_init', 'meu_tema_registrar_widgets');
?>