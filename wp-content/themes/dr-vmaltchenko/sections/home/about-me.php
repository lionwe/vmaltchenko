<?php
$image = get_field('about_image');
$badge = get_field('about_badge');
$content = get_field('about_main_content');
$cards = get_field('about_cards');
$grid_text = get_field('about_grid_text');
?>

<section class="about-me" id="about">
    <div class="container">
        <div class="about-me__wrapper">

            <!-- Left Column: Image -->
            <div class="about-me__image-wrapper">
                <?php if ($image): ?>
                    <img src="<?php echo esc_url($image); ?>" alt="Doctor" class="about-me__image">
                <?php endif; ?>
            </div>

            <!-- Right Column: Content -->
            <div class="about-me__content-wrapper">

                <?php if ($badge): ?>
                    <div class="about-me__badge">
                        <?php echo esc_html($badge); ?>
                    </div>
                <?php endif; ?>

                <?php if ($content): ?>
                    <div class="about-me__header">
                        <?php echo $content; ?>
                    </div>
                <?php endif; ?>

                <!-- Grid -->
                <div class="about-me__grid">
                    <?php if ($cards): ?>
                        <?php foreach ($cards as $card): ?>
                            <div class="about-me__card">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/elipse-svg-card.svg" alt=""
                                    class="about-me__card-decor">
                                <div class="about-me__card-content">
                                    <div class="about-me__card-badge">
                                        <?php echo esc_html($card['card_badge']); ?>
                                    </div>
                                    <div class="about-me__card-value">
                                        <?php echo esc_html($card['card_value']); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if ($grid_text): ?>
                        <div class="about-me__text-block">
                            <?php echo $grid_text; ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>