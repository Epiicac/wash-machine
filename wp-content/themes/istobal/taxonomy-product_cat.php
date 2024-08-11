<?php get_header(); ?>
<div class="catalog container">
    <div class="breadcrumbs first">
        <?php
        if (function_exists('bcn_display')) {
            bcn_display();
        }
        ?>
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
        <div class="catalog-wrapper">
            <div class="catalog-list">
    <?php
    // пока что у нас есть возможность получить ярлык текущего элемента таксономии и название самой таксономии
    $taxonomy_slug = get_query_var('term');
    $taxonomy = get_query_var('taxonomy');

    // затем уже можно получить ID
    $term = get_term_by('slug', $taxonomy_slug, $taxonomy);
    $term_id = $term->term_id;
    // и потом уже выводим через get_terms() :)


    $children = get_terms($taxonomy, array('child_of' => $term_id));
    if ($children) {
        foreach ($children as $subcat) {
            $term_link = get_term_link($subcat->term_id);
            ?>
            <div class="catalog-item">
                <a href="<?= $term_link ?>" class="image">
                    <img src="<?= get_the_post_thumbnail_url() ?>" alt="">
                </a>

                <div class="catalog-item-info">
                    <a href="<?= $term_link ?>" class="catalog-item-title"><?= $subcat->name ?></a>
                    <div class="catalog-item-desc"><?= $subcat->description ?></div>
                </div>
            </div>
            <?
        }
    } else {
    // Аргументы запроса
    $args = array(
        'post_type' => 'catalog',
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $term_id,
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
    ?>


                <?php while ($query->have_posts()) {
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
                    </div> <?
                } ?>
            <?php } else {
                echo "no posts";
            }

            wp_reset_postdata();
            }
            ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>

