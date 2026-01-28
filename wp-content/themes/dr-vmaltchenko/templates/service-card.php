<?php
/**
 * Service Card Template
 *
 * @package Dr. Vmaltchenko
 */
?>

<div class="service-card">
    <div class="service-card__bg">
        <?php
        $bg_args = [
            'lazy' => true,
            'alt'  => get_the_title(),
        ];

        if (has_post_thumbnail()) {
            $bg_args['src'] = get_the_post_thumbnail_url(null, 'full');
        } else {
            $bg_args['name'] = 'card-service-bg.png';
        }

        get_picture($bg_args);
        ?>
    </div>

    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/elipse-svg-card.svg" alt=""
        class="service-card__decor">

    <div class="service-card__content">
        <h3 class="service-card__title">
            <?php the_title(); ?>
        </h3>
        <div class="service-card__description">
            <?php the_content(); ?>
        </div>
    </div>
</div>