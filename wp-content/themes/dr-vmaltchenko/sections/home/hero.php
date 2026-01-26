<?php
/**
 * Hero Section
 */

$bg_image_url = get_field('hero_background');
$badges = get_field('hero_badges');
$content = get_field('hero_content');
$patients_avatars_url = get_field('hero_patients_avatars');
$doctor_image_url = get_field('hero_doctor_image');
$patients_text = get_field('hero_patients_text') ?: '+ 100 задоволених пацієнтів';
?>

<section class="hero">
	<?php if ($bg_image_url): ?>
		<div class="hero__background">
			<?php echo get_picture([
				'src' => $bg_image_url,
				'alt' => 'Background',
				'class' => 'hero__bg-img',
				'lazy' => false
			]); ?>
		</div>
	<?php endif; ?>

	<div class="container hero__container">
		<div class="hero__content-wrapper">
			<?php if ($badges): ?>
				<ul class="hero__badges">
					<?php foreach ($badges as $badge): ?>
						<li class="hero__badge">
							<?php echo esc_html($badge['text']); ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ($content): ?>
				<div class="hero__content">
					<?php
					// Parsing H1 and Content
					$h1_text = '';
					$description = '';

					if (preg_match('/<h1>(.*?)<\/h1>/s', $content, $matches)) {
						$h1_text = strip_tags($matches[1]);
						$description = str_replace($matches[0], '', $content);
					} else {
						// Fallback if no H1 found
						$description = $content;
					}

					if ($h1_text) {
						$parts = explode(' ', trim($h1_text), 2);
						$part1 = $parts[0] ?? '';
						$part2 = $parts[1] ?? '';

						echo '<div class="hero__content-grid">';
						echo '<h1 class="hero__title-part hero__title-part--1">' . esc_html($part1) . '</h1>';
						echo '<div class="hero__desc">' . $description . '</div>';
						echo '<h1 class="hero__title-part hero__title-part--2">' . esc_html($part2) . '</h1>';
						echo '</div>';
					} else {
						echo $content;
					}
					?>
				</div>
			<?php endif; ?>

			<div class="hero__actions">
				<div class="hero__cta">
					<?php get_template_part('templates/button', null, [
						'text' => 'Записатись на консультацію',
						'link' => '#contacts',
						'type' => 'primary',
						'icon_name' => 'consultation_arrow',
						'class' => 'hero__button'
					]); ?>
				</div>

				<div class="hero__patients">
					<?php if ($patients_avatars_url): ?>
						<div class="hero__patients-avatars">
							<?php echo get_picture([
								'src' => $patients_avatars_url,
								'alt' => 'Patients',
								'class' => 'hero__patients-img'
							]); ?>
						</div>
					<?php endif; ?>
					<span class="hero__patients-text">
						<?php echo wp_kses_post($patients_text); ?>
					</span>
				</div>
			</div>
		</div>

		<?php if ($doctor_image_url): ?>
			<div class="hero__doctor">
				<?php echo get_picture([
					'src' => $doctor_image_url,
					'alt' => 'Dr. VMaltchenko',
					'class' => 'hero__doctor-img'
				]); ?>
			</div>
		<?php endif; ?>
	</div>
</section>