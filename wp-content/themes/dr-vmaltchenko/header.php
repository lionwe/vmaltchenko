<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
	<meta name="description" content="Лікування варикозу, тромбозу та сіток у Києві. Консультація флеболога Вадима Мальченка. Запишіться на прийом!">

	<?php wp_head(); ?>

	<title><?php wp_title(); ?></title>

</head>

<body>

	<header class="header">
		<div class="container header__outer-container">
			<div class="header__logo">
				<?php if (has_custom_logo()) {
					the_custom_logo();
				} else {
					echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
				} ?>
			</div>

			<div class="header__menu-container">
				<nav class="header__nav">
					<?php
					wp_nav_menu([
						'theme_location' => 'menu-header',
						'container' => false,
						'menu_class' => 'header__menu',
						'items_wrap' => '<ul class="%2$s">%3$s</ul>',
						'fallback_cb' => false,
						'depth' => 1,
						'link_before' => '',
						'link_after' => '',
						'add_li_class' => 'header__menu-item',
						'add_a_class' => 'header__menu-link',
					]);
					?>
				</nav>
			</div>

			<div class="header__actions">
				<?php get_template_part('templates/button', null, [
					'text' => 'Записатись на консультацію',
					'link' => '#contacts',
					'type' => 'primary',
					'icon_name' => 'consultation_arrow',
					'class' => 'header__button'
				]); ?>

				<div class="header__burger-wrapper">
					<button class="header__burger" aria-label="Open Menu" aria-expanded="false"
						aria-controls="mobile-menu">
						<span class="header__burger-icon-open">
							<?php echo file_get_contents(get_template_directory() . '/assets/img/svg/burger.svg'); ?>
						</span>
						<span class="header__burger-icon-close" style="display: none;">
							<?php echo file_get_contents(get_template_directory() . '/assets/img/svg/close.svg'); ?>
						</span>
					</button>
				</div>
			</div>
		</div>
	</header>

	<!-- Mobile Menu Backdrop & Popup -->
	<div class="backdrop" role="dialog" aria-modal="true" aria-labelledby="mobile-menu-title">
		<div class="mobile-popup" id="mobile-menu">
			<div class="mobile-popup__header">
				<div class="container mobile-popup__header-inner">
					<div class="mobile-popup__logo">
						<?php if (has_custom_logo()) {
							the_custom_logo();
						} else {
							echo '<a href="' . esc_url(home_url('/')) . '">' . get_bloginfo('name') . '</a>';
						} ?>
					</div>
					<div class="mobile-popup__close-wrapper">
						<button class="mobile-popup__close" aria-label="Close Menu">
							<?php echo file_get_contents(get_template_directory() . '/assets/img/svg/close.svg'); ?>
						</button>
					</div>
				</div>
			</div>

			<div class="mobile-popup__content">
				<div class="container">
					<nav class="mobile-popup__nav">
						<h2 id="mobile-menu-title" class="visually-hidden">Головне меню</h2>
						<?php
						wp_nav_menu([
							'theme_location' => 'menu-header',
							'container' => false,
							'menu_class' => 'mobile-popup__list',
							'items_wrap' => '<ul class="%2$s">%3$s</ul>',
							'fallback_cb' => false,
							'depth' => 1,
							'add_li_class' => 'mobile-popup__item',
							'add_a_class' => 'mobile-popup__link',
						]);
						?>
					</nav>

					<div class="mobile-popup__cta">
						<?php get_template_part('templates/button', null, [
							'text' => 'Записатись на консультацію',
							'link' => '#contacts',
							'type' => 'primary',
							'icon_name' => 'consultation_arrow',
							'class' => 'mobile-popup__button'
						]); ?>
					</div>
				</div>
			</div>
		</div>
	</div>