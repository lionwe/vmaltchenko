<?php
/**
 * Treatment Results Section
 *
 * @package Dr. Vmaltchenko
 */

// ACF Fields
$badge_text = get_field('treatment_results_badge') ?: 'Результати';
$title = get_field('treatment_results_title');
$results = get_field('treatment_results_list');

// Button logic is hardcoded as per request
$button_args = [
    'text' => 'Записатись на консультацію',
    'link' => '#contacts',
    'type' => 'primary',
    'icon_name' => 'consultation_arrow',
    'class' => 'treatment-results__button'
];
?>

<section class="treatment-results">
    <div class="container">

        <div class="treatment-results__header">
            <div class="treatment-results__header-left">
                <?php if ($badge_text): ?>
                    <div class="treatment-results__badge">
                        <?php echo esc_html($badge_text); ?>
                    </div>
                <?php endif; ?>

                <div class="treatment-results__title-wrapper">
                    <?php if ($title): ?>
                        <div class="treatment-results__title">
                            <?php echo $title; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="treatment-results__cta">
                <?php get_template_part('templates/button', null, $button_args); ?>
            </div>
        </div>

        <div class="treatment-results__slider">
            <div class="swiper treatment-results-swiper">
                <div class="swiper-wrapper">
                    <?php if ($results): ?>
                        <?php foreach ($results as $item):
                            $card_description = $item['description'];
                            $image = $item['image'];
                            ?>
                            <div class="swiper-slide">
                                <div class="treatment-results__card">
                                    <?php if ($card_description): ?>
                                        <div class="treatment-results__card-description">
                                            <?php echo $card_description; ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($image): ?>
                                        <div class="treatment-results__card-image">
                                            <?php echo get_picture(array(
                                                'src' => $image['url'],
                                                'alt' => $image['alt'],
                                                'class' => '',
                                                'lazy' => true
                                            )); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="treatment-results__controls">
                <div class="treatment-results__controls-inner">
                    <div class="treatment-results__nav">
                        <button type="button" class="btn btn--slider-nav treatment-results-prev">
                            <span class="btn__icon-wrapper">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/arrow-prev.svg"
                                    alt="Prev">
                            </span>
                        </button>
                        <button type="button" class="btn btn--slider-nav treatment-results-next">
                            <span class="btn__icon-wrapper">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/arrow-next.svg"
                                    alt="Next">
                            </span>
                        </button>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="treatment-results__mobile-cta">
                <?php get_template_part('templates/button', null, $button_args); ?>
            </div>
        </div>
    </div>
</section>