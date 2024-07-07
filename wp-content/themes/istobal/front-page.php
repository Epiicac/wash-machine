<?php
/*
 * Template Name: Главная страница
 */
the_post();
get_header();

?>

<main id="main" class="front-page">
	<?php the_content(); ?> 
</main>

<?php get_footer(); ?>