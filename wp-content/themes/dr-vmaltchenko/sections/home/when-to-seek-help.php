<?php
$badge = get_field('badge');
$title = get_field('title');
$cards = get_field('cards');
$bottom_description = get_field('bottom_description');
?>

<section class="when-to-seek-help">
    <div class="container">
        <div class="when-to-seek-help__wrapper">
            <div class="when-to-seek-help__bg">
                <?php echo get_picture([
                    'name' => 'bg_when-to-seek-help.webp',
                    'alt' => 'Background',
                    'class' => 'when-to-seek-help__bg-img',
                    'lazy' => true
                ]); ?>
            </div>

            <?php if ($badge): ?>
                <div class="when-to-seek-help__badge">
                    <?php echo esc_html($badge); ?>
                </div>
            <?php endif; ?>

            <?php if ($title): ?>
                <h2 class="when-to-seek-help__title">
                    <?php echo esc_html($title); ?>
                </h2>
            <?php endif; ?>

            <?php if ($cards): ?>
                <div class="when-to-seek-help__grid">
                    <?php
                    $counter = 1;
                    foreach ($cards as $card):
                        $card_content = $card['card_content'];
                        ?>
                        <div class="when-to-seek-help__card-container">
                            <div class="when-to-seek-help__card-counter"><?php echo str_pad($counter, 2, '0', STR_PAD_LEFT); ?>
                            </div>
                            <div class="when-to-seek-help__card">
                                <div class="when-to-seek-help__card-content">
                                    <?php echo $card_content; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                        $counter++;
                    endforeach;
                    ?>
                </div>
            <?php endif; ?>

            <div class="when-to-seek-help__footer">
                <?php if ($bottom_description): ?>
                    <div class="when-to-seek-help__description-text">
                        <?php echo $bottom_description; ?>
                    </div>
                <?php endif; ?>

                <div class="when-to-seek-help__separator"></div>

                <div class="when-to-seek-help__cta">
                    <?php get_template_part('templates/button', null, [
                        'text' => 'Записатись на консультацію',
                        'link' => '#contacts',
                        'type' => 'primary',
                        'icon_name' => 'consultation_arrow',
                        'class' => 'when-to-seek-help__button'
                    ]); ?>
                </div>
            </div>

        </div>
    </div>
</section>