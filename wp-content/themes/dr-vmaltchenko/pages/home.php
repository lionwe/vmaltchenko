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
    <?php get_template_part('sections/home/services'); ?>
    <?php get_template_part('sections/home/cta'); ?>
    <?php get_template_part('sections/home/consultation-process'); ?>
</main>

<?php get_footer(); ?>