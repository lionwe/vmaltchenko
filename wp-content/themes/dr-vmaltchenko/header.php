<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
	<meta name="description" content="Side maded on Wordpress by Recipe team">

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
					$menu_items = [
						'#about' => 'Про мене',
						'#services' => 'Послуги',
						'#when-to-visit' => 'Коли варто звернутись',
						'#methods' => 'Методи лікування',
						'#results' => 'Результати',
						'#faq' => 'Відповіді на питання',
					];
					?>
					<ul class="header__menu">
						<?php foreach ($menu_items as $link => $label):
							$len = mb_strlen($label);
							$padding_class = ($len < 12) ? 'header__menu-link--wide' : 'header__menu-link--narrow';
							?>
							<li class="header__menu-item">
								<a href="<?php echo esc_url($link); ?>"
									class="header__menu-link <?php echo $padding_class; ?>">
									<?php echo esc_html($label); ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
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
						<ul class="mobile-popup__list">
								<?php foreach ($menu_items as $link => $label): ?>
								<li class="mobile-popup__item">
									<a href="<?php echo esc_url($link); ?>" class="mobile-popup__link">
											<?php echo esc_html($label); ?>
									</a>
								</li>
								<?php endforeach; ?>
						</ul>
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