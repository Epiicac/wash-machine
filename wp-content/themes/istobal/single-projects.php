<?php
/**
 * The template for displaying archive pages
 * Template Name: Projects Page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Theme
 */
get_header();
$post_id = get_the_ID();
$short_desc = get_field('short-desc', $post_id);
$desc = get_field('desc', $post_id);
$select_desc = get_field('select-desc', $post_id);
$image = get_field('image', $post_id);
$video = get_field('video', $post_id);
$projects = get_field('projects', $post_id);
?>
<div class="gray-bg">
    <div class="container breadcrumbs first">
        <?php get_breadcrumb(); ?>
    </div>
</div>
<section class="section-project gray-bg after-crumbs">
    <div class="container">
        <div class="project-header">
            <h2 class="red-point point">Проект</h2>
            <div class="right-part">
                <h3><?php the_title() ?></h3>
                <div class="desc"><?= $short_desc ?></div>
            </div>
        </div>
        <div class="project-desc">
            <img src="<?= $image ?>" alt="" class="image">
            <div class="separator"></div>
            <div class="desc">
                <div class="main"><?= $desc ?></div>
                <div class="select"><?= $select_desc ?></div>
            </div>
        </div>
    </div>
</section>
<section class="video gray-bg">
    <div class="container">
        <video>
            <source src="<?= $video ?>" type="video/mp4">
        </video>
        <div id="controls">
            <a id="playBtn">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.0002 36.2165L33.3335 22.8832C33.8465 22.5925 34.2732 22.1709 34.5701 21.6614C34.8669 21.152 35.0233 20.5729 35.0233 19.9832C35.0233 19.3936 34.8669 18.8145 34.5701 18.305C34.2732 17.7955 33.8465 17.3739 33.3335 17.0832L10.0002 3.74988C9.49121 3.45602 8.91363 3.30193 8.32595 3.30323C7.73828 3.30453 7.16139 3.46118 6.65376 3.75729C6.14614 4.05341 5.72583 4.47846 5.43542 4.98937C5.14502 5.50029 4.99485 6.07889 5.00014 6.66655V33.3332C5.00073 33.918 5.15519 34.4924 5.448 34.9987C5.7408 35.5049 6.16164 35.9252 6.66827 36.2174C7.17491 36.5096 7.74949 36.6633 8.33432 36.6631C8.91916 36.663 9.49366 36.509 10.0002 36.2165Z" fill="white" />
                </svg>
            </a>
        </div>

    </div>
</section>

<?php
the_content();


$page_id = 352;
$content = get_post_field('post_content', $page_id);
echo apply_filters('the_content', $content);

get_footer();
?>
