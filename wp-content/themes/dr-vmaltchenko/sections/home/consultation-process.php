<?php
/**
 * Consultation Process Section
 *
 * @package Dr. Vmaltchenko
 */

$badge = get_field('consultation_badge');
$heading = get_field('consultation_heading');
$cards = get_field('consultation_cards');
?>

<section id="consultation-process" class="consultation-process">
    <div class="container">
        <div class="consultation-process__wrapper">

            <div class="consultation-process__info">
                <?php if ($badge): ?>
                    <div class="consultation-process__badge">
                        <?php echo esc_html($badge); ?>
                    </div>
                <?php endif; ?>

                <?php if ($heading): ?>
                    <div class="consultation-process__title">
                        <?php echo $heading; ?>
                    </div>
                <?php endif; ?>

                <div class="consultation-process__button-wrapper">
                    <?php get_template_part('templates/button', null, [
                        'text' => 'Записатись на консультацію',
                        'link' => '#contacts',
                        'type' => 'primary',
                        'icon_name' => 'consultation_arrow',
                        'class' => 'consultation-process__button'
                    ]); ?>
                </div>
            </div>

            <div class="consultation-process__cards">
                <?php if ($cards): ?>
                    <?php foreach ($cards as $card):
                        $icon = $card['icon'];
                        $content = $card['content'];
                        ?>
                        <div class="consultation-process__card">
                            <?php if ($icon): ?>
                                <div class="consultation-process__card-icon">
                                    <?php echo get_picture(array(
                                        'src' => $icon['url'],
                                        'alt' => $icon['alt'],
                                        'class' => '',
                                        'lazy' => true
                                    )); ?>
                                </div>
                            <?php endif; ?>

                            <div class="consultation-process__card-content">
                                <?php echo $content; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>
</section>