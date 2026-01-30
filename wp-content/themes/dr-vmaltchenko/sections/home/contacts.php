<?php
/**
 * Contacts Section
 * 
 * @package Dzherela-Hels
 */

$container_bg = get_field('contacts_container_bg');
$bg_image = get_field('contacts_bg_image');
$overlay_content = get_field('contacts_overlay_content');
$form_intro = get_field('contacts_form_intro');
$form_shortcode = get_field('contacts_form_shortcode');

// Option Page Data
$phone = get_field('phone_1', 'option');
$phone_icon = get_field('phone_main_icon', 'option');

$email = get_field('email_main', 'option');
$email_icon = get_field('email_main_icon', 'option');

$address = get_field('address_main', 'option');
$address_icon = get_field('address_main_icon', 'option');

$schedule_icon = get_field('schedule_icon', 'option');
$schedule_rows = get_field('schedule_list', 'option');
?>

<section id="contacts" class="contacts">
    <div class="container">
        <div class="contacts__wrapper">
            <?php if ($container_bg): ?>
                <div class="contacts__bg">
                    <?php echo get_picture([
                        'src' => $container_bg['url'],
                        'alt' => $container_bg['alt'] ?: 'Contacts Wrapper Background',
                        'class' => 'contacts__bg-img',
                        'lazy' => true
                    ]); ?>
                </div>
            <?php endif; ?>

            <div class="contacts__grid">

                <!-- LEFT COLUMN: Image + Overlay + Data -->
                <div class="contacts__col-info">
                    <?php if ($bg_image): ?>
                        <div class="contacts__bg">
                            <?php echo get_picture([
                                'src' => $bg_image['url'],
                                'alt' => $bg_image['alt'] ?: 'Contacts Background',
                                'class' => 'contacts__bg-img',
                                'lazy' => true
                            ]); ?>
                        </div>
                    <?php endif; ?>

                    <div class="contacts__info-content">
                        <?php if ($overlay_content): ?>
                            <div class="contacts__overlay-text">
                                <?php echo $overlay_content; ?>
                            </div>
                        <?php endif; ?>

                        <div class="contacts__data-grid">
                            <!-- Col 1: Contacts List -->
                            <div class="contacts__list">
                                <?php if ($phone): ?>
                                    <div class="contacts__item">
                                        <div class="contacts__item-icon">
                                            <?php if ($phone_icon): ?>
                                                <img src="<?php echo esc_url($phone_icon['url']); ?>" alt="Phone">
                                            <?php endif; ?>
                                        </div>
                                        <a href="tel:<?php echo preg_replace('/[^0-9+]/', '', $phone); ?>"
                                            class="contacts__item-text">
                                            <?php echo esc_html($phone); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <?php if ($email): ?>
                                    <div class="contacts__item">
                                        <div class="contacts__item-icon">
                                            <?php if ($email_icon): ?>
                                                <img src="<?php echo esc_url($email_icon['url']); ?>" alt="Email">
                                            <?php endif; ?>
                                        </div>
                                        <a href="mailto:<?php echo esc_attr($email); ?>" class="contacts__item-text">
                                            <?php echo esc_html($email); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <?php if ($address): 
                                    $address_text = strip_tags($address);
                                    $map_link = 'https://www.google.com/maps/search/?api=1&query=' . urlencode($address_text);
                                ?>
                                    <div class="contacts__item">
                                        <div class="contacts__item-icon">
                                            <?php if ($address_icon): ?>
                                                <img src="<?php echo esc_url($address_icon['url']); ?>" alt="Address">
                                            <?php endif; ?>
                                        </div>
                                        <a href="<?php echo esc_url($map_link); ?>" target="_blank" class="contacts__item-text">
                                            <?php echo wp_kses_post($address); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <!-- Col 2: Schedule -->
                            <?php if ($schedule_rows): ?>
                                <div class="contacts__schedule">
                                    <div class="contacts__schedule-inner">
                                        <div class="contacts__schedule-icon">
                                            <?php if ($schedule_icon): ?>
                                                <img src="<?php echo esc_url($schedule_icon['url']); ?>" alt="Clock">
                                            <?php endif; ?>
                                        </div>
                                        <div class="contacts__schedule-list">
                                            <?php foreach ($schedule_rows as $row): ?>
                                                <div class="contacts__schedule-row">
                                                    <?php echo esc_html($row['text']); ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- RIGHT COLUMN: Form -->
                <div class="contacts__col-form">
                    <?php if ($form_intro): ?>
                        <div class="contacts__form-intro">
                            <?php echo $form_intro; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($form_shortcode): ?>
                        <div class="contacts__form-wrapper">
                            <?php echo do_shortcode($form_shortcode); ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>