<?php get_header(); ?>
<div class="catalog container">
    <div class="breadcrumbs first">
        <?php
        if (function_exists('bcn_display')) {
            bcn_display();
        }
        ?>
    </div>
    <div class="category-view">
        <div class="category-image"><img class="image"
                                         src="/wp-content/themes/istobal/assets/img/Automatic_car_wash_ISTOBAL_1.jpg"
                                         alt=""></div>
        <div class="page-title-wrapper">
            <h1 class="page-title" id="page-title-heading"><?= get_the_category() ?></h1>
        </div>
        <div class="category-description">
            Get to know the wide range of ISTOBAL vehicle washes for all types of vehicles. State-of-the-art solutions
            for &nbsp;automatic car wash and tunnels or jet wash centres. Maximum technology and reliability to increase
            the profitability of your car wash business.
        </div>
    </div>
    <div class="catalog-body">
        <div class="sidebar">
            <nav class="left-menu">
                <div class="menu_title">MENU</div>
                <ul>
                    <?
                    $taxonomy = 'product_cat'; // Укажите название вашей таксономии, например, 'category' для категорий записей
                    $categories = get_terms(array(
                        'taxonomy' => $taxonomy,
                        'hide_empty' => false, // Установите в true, если вы хотите скрыть пустые категории
                    ));

                    if (!empty($categories) && !is_wp_error($categories)) {
                        foreach ($categories as $category) {
                            if ($category->parent == 0) {
                                echo '<li><a href="' . get_term_link($category) . '">' . $category->name . '</a></li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </nav>
        </div>
        <?
        $args = array(
            'post_type' => 'catalog',
        );

        $query = new WP_Query($args);
        ?>
        <div class="catalog-wrapper">
            <div class="toolbar">
                <div class="count"><strong><?= $query->found_posts ?></strong> items</div>
            </div>
            <?php


            if ($query->have_posts()) { ?>
                <div class="catalog-list">
                    <?php
                    while ($query->have_posts()) {
                        $query->the_post();
                        $desc = get_field('desc'); ?>
                        <div class="catalog-item">
                            <a href="<?= get_permalink() ?>" class="image">
                                <img src="<?= get_the_post_thumbnail_url() ?>" alt="">
                            </a>
                            <div class="catalog-item-info">
                                <a href="<?= get_permalink() ?>" class="catalog-item-title"><?= get_the_title() ?></a>
                                <div class="catalog-item-desc"><?= $desc ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div> <?php
            } else {
                echo "no posts";
            }

            wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<? get_footer(); ?>

