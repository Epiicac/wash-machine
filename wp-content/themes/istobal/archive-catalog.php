<?php get_header(); ?>
<div class="breadcrumbs first">
    <?php
    if (function_exists('bcn_display')) {
        bcn_display();
    }
    ?>
</div>
MENU:<br>
<?php

$taxonomy = 'product_cat'; // Укажите название вашей таксономии, например, 'category' для категорий записей
$categories = get_terms(array(
    'taxonomy' => $taxonomy,
    'hide_empty' => false, // Установите в true, если вы хотите скрыть пустые категории
));

if (!empty($categories) && !is_wp_error($categories)) {
    foreach ($categories as $category) {
        if ($category->parent == 0) {
            echo '<a href="' . get_term_link($category) . '">' . $category->name . '</a><br>';
        }
    }
}

$args = array(
    'post_type' => 'catalog',
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    echo "This is all posts:<br>"; ?>
    <div class="catalog-list">
        <?php
        while ($query->have_posts()) {
            $query->the_post();
            $desc = get_field('desc'); ?>
            <div class="catalog-item">
                <img src="<?= get_the_post_thumbnail_url() ?>" alt="">
                <a href="<?= get_permalink() ?>"><?= get_the_title() ?></a>
                <span class="desc"><?= $desc ?></span>
            </div>
        <?php } ?>
    </div> <?php
} else {
    echo "no posts";
}

wp_reset_postdata();
get_footer();
?>

