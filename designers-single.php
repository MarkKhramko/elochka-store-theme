<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Designers-single
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neutral
 */

	get_header();
?>

<section class="designers-single">
	<div class="container">
		<h2 class="title">Jamie Beckwith</h2>
		<div class="designers-single__head">
			<div class="designers-single__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/design.png')"></div>
			<div class="designers-single__text">Jamie Beckwith - ведущий законодатель моды в сфере роскошного дизайна
				интерьера. Это инновационное предложение престижных обработок древесины для напольных и вертикальных
				поверхностей навсегда изменяет концепцию использования древесины в жилых, коммерческих и корпоративных
				условиях. С момента основания дизайн-студии Beckwith Interiors в 2006 году прославилась своим
				проницательным взглядом и утонченными интерьерами для коммерческих и жилых объектов по всему США. Дизайн
				Jamie Beckwith представляет собой преобразующую среду для дизайнера, предназначенную для выражения
				идеального баланса между творчеством и дизайном, искусством и функциональностью. Jamie Beckwith
				охватывает дух качества ремесленников и внимание к деталям.
			</div>
		</div>
		<div class="our-objects-single__grid">
			<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
			<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
			<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
			<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
			<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
			<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
			<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
			<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
		</div>
		<div class="paggination">
			<div class="paggination__arrow paggination__arrow--left"></div>
			<div class="paggination__count">
				<ul>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
				</ul>
			</div>
			<div class="paggination__arrow paggination__arrow--right"></div>
		</div>
	</div>
</section>

<?php get_template_part('./template-parts/dialog') ?>

<?php
	get_footer();
?>
