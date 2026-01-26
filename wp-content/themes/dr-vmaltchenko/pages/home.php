<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<main id="home">
    <?php get_template_part('sections/home/hero'); ?>
    <?php get_template_part('sections/home/about-me'); ?>
    <?php get_template_part('sections/home/when-to-seek-help'); ?>
</main>

<?php get_footer(); ?>