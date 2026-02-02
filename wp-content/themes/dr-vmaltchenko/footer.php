<?php
/**
 * Footer
 */
?>

<footer class="page-footer">
    <div class="container page-footer__container">
        <div class="page-footer__top">
            <nav class="page-footer__nav">
                <ul class="page-footer__menu">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'menu-footer',
                        'container' => false,
                        'items_wrap' => '%3$s',
                        'depth' => 1,
                    ]);
                    ?>
                </ul>
            </nav>
        </div>

        <div class="page-footer__separator-horizontal"></div>

        <div class="page-footer__bottom">
            <?php
            $developer = get_field('developer_credit', 'option');
            if ($developer && !empty($developer['text'])):
                if (!empty($developer['link'])): ?>
                    <a href="<?php echo esc_url($developer['link']); ?>" class="page-footer__developer" target="_blank">
                        <?php echo esc_html($developer['text']); ?>
                    </a>
                <?php else: ?>
                    <span class="page-footer__developer"><?php echo esc_html($developer['text']); ?></span>
                <?php endif;
            endif;
            ?>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button -->
<button id="scroll-to-top" class="btn btn--scroll-to-top" aria-label="Scroll to top">
    <span class="btn__icon-wrapper">
        <?php echo file_get_contents(get_template_directory() . '/assets/img/svg/arrow-prev.svg'); ?>
    </span>
</button>

<?php wp_footer(); ?>
</body>

</html>