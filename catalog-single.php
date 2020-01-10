<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Catalog-Single
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neutral
 */

	get_header();
?>

<section class="catalog-single">
	<div class="container">
		<h2 class="title">Штучный паркет мербау Селект D</h2>
		<div class="catalog-single__item">
			<div class="catalog-single__photos">
				<div class="catalog-single__img catalog-single__img--big"
					 style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_1.png')"></div>
				<div class="catalog-single__img catalog-single__img--small"
					 style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="catalog-single__img catalog-single__img--small"
					 style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_3.png')"></div>
				<div class="catalog-single__img catalog-single__img--small"
					 style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_1.png')"></div>
				<div class="catalog-single__img catalog-single__img--small"
					 style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
			</div>
			<div class="catalog-single__info">
				<p class="text">Размеры: 420х70х15 (1,0584 м2) Соответствует ГОСТ 862.1 — 85. Влажность — 8-10%.<br><br>
					Это
					экологически чистый продукт высшей категории качества. произведён на оборудовании и по технологии
					немецких и итальянских производителей.
					<br><br>
					Артикул: 1A01103
				</p>
				<div class="catalog-single__cost">5202 ₽</div>
				<button class="button button--brown">Оставить заявку</button>
			</div>
			<div class="catalog-single__table">
				<table>
					<thead>
					<tr>
						<td class="catalog-single__brand">О бренде</td>
						<td class="catalog-single__chars">Характеристики</td>
					</tr>
					</thead>
					<tbody>
					<tr>
						<td>Размер</td>
						<td>420х70х15</td>
					</tr>
					<tr>
						<td>УП</td>
						<td>1, 0584 м2</td>
					</tr>
					<tr>
						<td>Фаска</td>
						<td>нет</td>
					</tr>
					<tr>
						<td>Порода дерева</td>
						<td>мербау</td>
					</tr>
					<tr>
						<td>Цвет</td>
						<td>натуральный без покрытия</td>
					</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('./template-parts/home/popular') ?>
<?php
	get_footer();
?>
