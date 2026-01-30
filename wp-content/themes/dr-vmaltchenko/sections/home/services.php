<?php
/**
 * Services Section
 *
 * @package Dr. Vmaltchenko
 */

// ACF Fields
$badge_text = get_field('services_badge') ?: 'Наші послуги';
$title = get_field('services_title') ?: 'Послуги';
$selected_posts = get_field('services_selected');

$args = array(
    'post_type' => 'services',
    'posts_per_page' => -1,
    'post_status' => 'publish',
);

if ($selected_posts) {
    $args['post__in'] = $selected_posts;
    $args['orderby'] = 'post__in';
}

$services_query = new WP_Query($args);
?>

<section id="services" class="services">
    <div class="container">
        <div class="services__wrapper">
            <div class="services__info">
                <?php if ($badge_text): ?>
                    <div class="services__badge">
                        <?php echo esc_html($badge_text); ?>
                    </div>
                <?php endif; ?>

                <?php if ($title): ?>
                    <div class="services__title">
                        <?php echo $title; ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="services__slider">
                <div class="swiper services-swiper">
                    <div class="swiper-wrapper">
                        <?php if ($services_query->have_posts()): ?>
                            <?php while ($services_query->have_posts()):
                                $services_query->the_post(); ?>
                                <div class="swiper-slide">
                                    <?php get_template_part('templates/service-card'); ?>
                                </div>
                            <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="services__controls">
                    <div class="services__controls-inner">
                        <div class="services__nav">
                            <button type="button" class="btn btn--slider-nav services-prev">
                                <span class="btn__icon-wrapper">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/arrow-prev.svg"
                                        alt="Prev">
                                </span>
                            </button>
                            <button type="button" class="btn btn--slider-nav services-next">
                                <span class="btn__icon-wrapper">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/arrow-next.svg"
                                        alt="Next">
                                </span>
                            </button>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>