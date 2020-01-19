<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Скидки (Stocks)
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neutral
 */

	get_header();
?>

<section class="stocks">
	<div class="container">
		<div class="stocks__item-container">
			<h2 class="title">Скидка 50% на первый заказ</h2>
			<div class="stocks__item">
				<div class="stocks__photo"
					 style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_1.png')"></div>
				<div class="stocks__info">
					<div class="stocks__img"
						 style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/pattern.png')"></div>
					<span class="stocks__text"> Оставь заявку и на первый заказ вы получите скидку 50%</span>
					<p class="text">Скидка предоставляется на весь ассортимент напольного покрытия, а так же на все
						сопутствующие товары</p>
					<div class="button button--brown">Получить скидку</div>
				</div>
			</div>
		</div>
		<div class="stocks__item-container">
			<h2 class="title">Скидка 20% на второй заказ</h2>
			<div class="stocks__item">
				<div class="stocks__photo"
					 style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_1.png')"></div>
				<div class="stocks__info">
					<div class="stocks__img"
						 style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/pattern.png')"></div>
					<span class="stocks__text"> Оставь заявку и на первый заказ вы получите скидку 50%</span>
					<p class="text">Скидка предоставляется на весь ассортимент напольного покрытия, а так же на все
						сопутствующие товары</p>
					<div class="button button--brown">Получить скидку</div>
				</div>
			</div>
		</div>

	</div>
</section>
<?php get_template_part('./template-parts/popular--with-cost') ?>
<?php get_template_part('./template-parts/dialog') ?>

<?php

	get_footer();

?>
