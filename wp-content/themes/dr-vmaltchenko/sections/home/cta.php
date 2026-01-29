<?php
/**
 * CTA Section
 * 
 * @package Dzherela-Hels
 */

$container_bg = get_field('cta_container_bg');
$content = get_field('cta_content');
$form_shortcode = get_field('cta_form_shortcode');
$right_image = get_field('cta_right_image');
?>

<section class="cta">
    <div class="container">
        <div class="cta__wrapper">
            <?php if ($container_bg): ?>
                <div class="cta__bg">
                    <?php echo get_picture([
                        'src' => $container_bg['url'],
                        'alt' => $container_bg['alt'] ?: 'Background',
                        'class' => 'cta__bg-img',
                        'lazy' => true
                    ]); ?>
                </div>
            <?php endif; ?>

            <div class="cta__grid">
                <div class="cta__col-content">
                    <?php if ($content): ?>
                        <div class="cta__text">
                            <?php echo $content; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($form_shortcode): ?>
                        <div class="cta__form-wrapper">
                            <?php echo do_shortcode($form_shortcode); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="cta__col-image">
                    <?php if ($right_image): ?>
                        <div class="cta__image-box">
                            <?php echo get_picture([
                                'src' => $right_image['url'],
                                'alt' => $right_image['alt'] ?: 'CTA Image',
                                'class' => 'cta__img',
                                'lazy' => true
                            ]); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>