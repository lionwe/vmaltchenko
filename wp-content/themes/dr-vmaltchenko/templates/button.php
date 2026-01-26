<?php
/**
 * Button Template
 *
 * @param array $args
 */

$defaults = [
    'text' => '',
    'link' => '#',
    'type' => 'primary', // primary, secondary, etc.
    'icon_name' => '', // e.g. 'arrow-right'
    'class' => '',
    'target' => '_self'
];

$args = wp_parse_args($args, $defaults);

$tag = $args['link'] ? 'a' : 'button';
$href = $args['link'] ? 'href="' . esc_url($args['link']) . '"' : '';
$target = $args['target'] ? 'target="' . esc_attr($args['target']) . '"' : '';

$classes = ['btn'];
if ($args['type']) {
    $classes[] = 'btn--' . $args['type'];
}
if ($args['class']) {
    $classes[] = $args['class'];
}
$class_attr = 'class="' . esc_attr(implode(' ', $classes)) . '"';

?>

<<?php echo $tag; ?>
    <?php echo $href; ?>
    <?php echo $class_attr; ?>
    <?php echo $target; ?>>
    <span class="btn__text">
        <?php echo esc_html($args['text']); ?>
    </span>

    <?php if ($args['icon_name']): ?>
        <span class="btn__icon-wrapper">
            <?php
            // Try to load SVG from assets/images/svg/ OR assets/images/
            // Assuming .svg extension usually
            $icon_path_svg = get_template_directory() . '/assets/img/svg/' . $args['icon_name'] . '.svg';
            $icon_path_root = get_template_directory() . '/assets/img/' . $args['icon_name'] . '.svg';

            if (file_exists($icon_path_svg)) {
                echo file_get_contents($icon_path_svg);
            } elseif (file_exists($icon_path_root)) {
                echo file_get_contents($icon_path_root);
            } else {
                // Fallback if SVG not found - maybe standard get_picture or just empty
                // For now, nothing or simple placeholder if debugging
            }
            ?>
        </span>
    <?php endif; ?>
</<?php echo $tag; ?>>