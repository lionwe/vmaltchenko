<?php
/**
 * FAQ Section
 *
 * @package Dr. Vmaltchenko
 */

$background = get_field('faq_background');
$badge = get_field('faq_badge');
$heading = get_field('faq_heading');
$faq_list = get_field('faq_list');

if (!$faq_list)
    return;
?>

<section id="faq" class="faq">

    <div class="container">
        <div class="faq__header faq__header--mobile">
            <?php if ($badge): ?>
                <div class="faq__badge">
                    <?php echo esc_html($badge); ?>
                </div>
            <?php endif; ?>

            <?php if ($heading): ?>
                <div class="faq__title">
                    <?php echo $heading; ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="faq__wrapper">
            <?php if ($background): ?>
                <div class="faq__background">
                    <?php echo get_picture(array(
                        'src' => $background['url'],
                        'alt' => $background['alt'],
                        'class' => '',
                        'lazy' => true
                    )); ?>
                </div>
            <?php endif; ?>

            <div class="faq__content">
                <div class="faq__header faq__header--desktop">
                    <?php if ($badge): ?>
                        <div class="faq__badge">
                            <?php echo esc_html($badge); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($heading): ?>
                        <div class="faq__title">
                            <?php echo $heading; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="faq__list">
                    <?php foreach ($faq_list as $index => $item):
                        $question = $item['question'];
                        $answer = $item['answer'];
                        ?>
                        <div class="faq__item" data-accordion>
                            <div class="faq__question" data-accordion-trigger>
                                <span class="faq__question-text"><?php echo esc_html($question); ?></span>
                                <div class="faq__icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/plus.svg"
                                        alt="Open" class="faq__icon-plus">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/minus.svg"
                                        alt="Close" class="faq__icon-minus">
                                </div>
                            </div>
                            <div class="faq__answer" data-accordion-content>
                                <div class="faq__answer-inner">
                                    <?php echo $answer; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>