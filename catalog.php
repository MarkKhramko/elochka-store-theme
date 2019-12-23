<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Catalog
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neutral
 */

	get_header();
?>

<!-- Query parameters -->
<?php

	$searchQuery = get_query_var('search');
	var_dump($searchQuery);

	$priceMin = get_query_var('price_min', 0);
	$priceMax = get_query_var('price_max', 100000000000);

	$params = array(
		'posts_per_page' => 9,
		'post_type' => 'product',

		'meta_query' => array(
			array(
				'key' => '_price',
				'value' => array($priceMin, $priceMax),
				'compare' => 'BETWEEN',
				'type' => 'NUMERIC'
			)
		)
	);
	$wc_query = new WP_Query($params);
?>

<section class="catalog">
	<div class="container">
		<h2 class="title">Паркет</h2>
		<div class="catalog__container">
			<?php get_template_part('./template-parts/catalog/searchform') ?>
			сортировка
			<?php get_template_part('./template-parts/catalog/priceform') ?>
		</div>
		<div class="catalog__container">
			<div class="sidebar">
				<div class="filters">
					<?php get_template_part('./template-parts/catalog/sidebar-filter') ?>
				</div>
			</div>
			<div class="catalog__grid">
				<div class="catalog__list">
					<?php if ($wc_query->have_posts()) : ?>
						<?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
							<div class="catalog__item">
								<?php the_post_thumbnail('medium', ['class' => 'catalog__item-img']);?>
								<div class="catalog__item-title"><?php the_title(); ?></div>
								<div class="catalog__item-subtitle">350х50х15 (0,875 м2)</div>
								<!-- <div class="catalog__item-sale-cost">3045 ₽</div> -->
								<div class="catalog__item-cost">2025 ₽</div>
								<a href="#" class="button button--tr button--with-grey-arrow"><span>Описание</span></a>
							</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else:  ?>
						<p>
							 <?php _e( 'По вашему запросу товаров не найдено.'); ?>
						</p>
					<?php endif; ?>
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
		</div>
	</div>
</section>
<?php get_template_part('./template-parts/dialog') ?>


<?php
	get_footer();
?>
