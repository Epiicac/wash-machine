<?php get_header(); ?>
<div class="breadcrumbs first">
    <?php
    if(function_exists('bcn_display')) {
        bcn_display();
    }
    ?>
</div>
<?php
// пока что у нас есть возможность получить ярлык текущего элемента таксономии и название самой таксономии
$taxonomy_slug = get_query_var('term');
$taxonomy = get_query_var('taxonomy');

// затем уже можно получить ID
$term = get_term_by( 'slug', $taxonomy_slug, $taxonomy );
$term_id = $term->term_id;
// и потом уже выводим через get_terms() :)


$children = get_terms($taxonomy, array( 'child_of' => $term_id ) );
if ( $children ) {
    echo 'i have subcategory<br>';
    foreach ($children as $subcat) {
        $term_link = get_term_link($subcat->term_id);
        echo '<a href="' . $term_link . '">' . $subcat->name . '</a><br>';
    }
} else {
    // Аргументы запроса
    $args = array(
        'post_type' => 'catalog',
        'tax_query' => array(
            array(
                'taxonomy' => $taxonomy,
                'field'    => 'term_id',
                'terms'    => $term_id,
            ),
        ),
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {

        echo "i have posts:<br>";
        while ( $query->have_posts() ) {
            $query->the_post();
            echo '<a href="'.get_permalink().'">ID поста: ' . get_the_ID() . '<a/><br>';
        }
    } else {
        echo "no posts";
    }

    wp_reset_postdata();
}
?>
<?php
get_footer();
?>

