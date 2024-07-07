<!DOCTYPE html>
<html <?php language_attributes()?>>
<head>
    <title>Инновацонные технологии связи</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
    <?php
        $logo = get_field('logo', 'options');
    ?>
</head>
<body>
<header>
    <div class="page-header header">
        <div class="header-top container">
            <a href="/" class="logo" title="Istobal">
                <img src="<?=$logo?>" title="Istobal" alt="Istobal">
            </a>
            <div class="header-right-part">
                <nav>
                    <?php
                        wp_nav_menu( [
                            'theme_location'  => 'header_menu',
                            'container'       => false,
                            'menu'            => '',
                            'menu_class'      => 'menu',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                            'depth'           => 2,
                        ] );
                    ?>
                </nav>
            </div>
        </div>
        <div class="header-bottom">
            <div class="nav-menu-main container">
                <?php
                    wp_nav_menu( [
                        'theme_location'  => 'header_sub_menu',
                        'container'       => false,
                        'menu'            => '',
                        'menu_class'      => 'menu-category',
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 3,
                        'walker' => new Custom_Walker_Nav_Menu(),
                    ] );
                    class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
                        function start_lvl( &$output, $depth = 0, $args = array() ) {
                            if ($depth !== 0) {
                                $output .= '<div class="sub-menu-depth"><ul class="sub-child-menu">';
                            } else {
                                $output .= '<div class="sub-menu-wrapper"><ul class="sub-menu">';

                            }
                        }
                    
                        function end_lvl( &$output, $depth = 0, $args = array() ) {
                            $output .= '</ul>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</header>
<main>