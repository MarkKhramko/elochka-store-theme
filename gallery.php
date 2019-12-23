<?php
	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 * Template Name: Gallery
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package neutral
	 */
	get_header();
?>

<section class="gallery">
	<div class="container">
		<h2 class="title">Галерея</h2>
		<div class="gallery__grid">
			<a href="/galereya/nashi-obekty/" class="gallery__item">
				<div class="gallery__item-img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="gallery__item-name">Наши объекты</div>
			</a>
			<a href="/galereya/mirovye-dizajnery/" class="gallery__item">
				<div class="gallery__item-img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="gallery__item-name">Мировые дизайнеры</div>
			</a>
			<a href="/galereya/podborki-intererov/" class="gallery__item">
				<div class="gallery__item-img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="gallery__item-name">Подборки интерьеров</div>
			</a>
			<a href="#" class="gallery__item">
				<div class="gallery__item-img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="gallery__item-name">Работы наших партнеров</div>
			</a>
		</div>
	</div>
</section>

<?php get_template_part('./template-parts/dialog') ?>

<?php
	get_footer();
?>