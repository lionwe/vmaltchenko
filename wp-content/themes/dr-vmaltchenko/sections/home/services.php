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
                                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M0.146446 3.32833C-0.0488157 3.52359 -0.0488157 3.84018 0.146446 4.03544L3.32843 7.21742C3.52369 7.41268 3.84027 7.41268 4.03553 7.21742C4.2308 7.02216 4.2308 6.70557 4.03553 6.51031L1.20711 3.68188L4.03553 0.853457C4.2308 0.658195 4.2308 0.341612 4.03553 0.14635C3.84027 -0.048912 3.52369 -0.048912 3.32843 0.14635L0.146446 3.32833ZM11.5 3.68188L11.5 3.18188L0.5 3.18188L0.5 3.68188L0.5 4.18188L11.5 4.18188L11.5 3.68188Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </button>
                            <button type="button" class="btn btn--slider-nav services-next">
                                <span class="btn__icon-wrapper">
                                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.3536 4.03544C11.5488 3.84018 11.5488 3.52359 11.3536 3.32833L8.17157 0.146351C7.97631 -0.0489113 7.65973 -0.0489113 7.46447 0.146351C7.2692 0.341613 7.2692 0.658195 7.46447 0.853458L10.2929 3.68188L7.46447 6.51031C7.2692 6.70557 7.2692 7.02216 7.46447 7.21742C7.65973 7.41268 7.97631 7.41268 8.17157 7.21742L11.3536 4.03544ZM0 3.68188V4.18188H11V3.68188V3.18188H0V3.68188Z"
                                            fill="white" />
                                    </svg>
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