<?php

add_theme_support( 'menus' );
function custom_nav_menu_classes($classes, $item, $args, $depth) {
    switch ($args->menu) {
        case 3:
            $classes = ['header-menu-item'];
            break;
        case 4:
            $classes = ['footer-menu-item'];
            break;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'custom_nav_menu_classes', 10, 4);


add_theme_support( 'custom-logo' );
add_filter( 'upload_mimes', 'svg_upload_allow' );

# Добавляет SVG в список разрешенных для загрузки файлов.
function svg_upload_allow( $mimes ) {
    $mimes['svg']  = 'image/svg+xml';

    return $mimes;
}

add_action( 'wp_enqueue_scripts', 'softmg_scripts' );
function softmg_scripts() {
    wp_enqueue_style( 'variables-style', get_template_directory_uri() . '/assets/css/variables.css');
    wp_enqueue_style( 'swiper-style', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css');
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/assets/fonts/fonts.css');
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js');
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/script.js');
}

require get_template_directory() . '/inc/template-functions.php';

register_nav_menus( [
    'header_menu' => 'Меню в шапке',
	'header_sub_menu' => 'Меню с категориями',
	'footer_menu' => 'Меню в футере',
] );

function add_menu_image_property($item) {
    if (!is_admin()) {
        $image = get_field('menu_image', $item);
        if ($image) {
            $item->title = '<div class="menu-image-item"><span>' . $item->title . '</span><div class="red-line"></div><img src="' . $image . '"/></div>';
        } else {
            $item->title = '<span>' . $item->title . '</span><div class="red-line"></div>';
        }
    }
    
    return $item;
}
add_filter('wp_setup_nav_menu_item', 'add_menu_image_property');