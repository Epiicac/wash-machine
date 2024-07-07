<?php get_header(); ?>
<div class="breadcrumbs first">
    <?php
    if(function_exists('bcn_display')) {
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

$query = new WP_Query( $args );

if ( $query->have_posts() ) {

    echo "This is all posts:<br>";
    while ( $query->have_posts() ) {
        $query->the_post();
        echo '<a href="'.get_permalink().'">ID поста: ' . get_the_ID() . '<a/><br>';
    }
} else {
    echo "no posts";
}

wp_reset_postdata();
get_footer();
?>

