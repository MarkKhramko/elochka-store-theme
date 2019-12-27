<?php
	/**
	 * The template for displaying product content in the single-product.php template
	 *
	 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
	 *
	 * HOWEVER, on occasion WooCommerce will need to update template files and you
	 * (the theme developer) will need to copy the new files to your theme to
	 * maintain compatibility. We try to do this as little as possible, but it does
	 * happen. When this occurs the version of the template file will be bumped and
	 * the readme will list any important changes.
	 *
	 * @see     https://docs.woocommerce.com/document/template-structure/
	 * @package WooCommerce/Templates
	 * @version 3.6.0
	 */

	defined( 'ABSPATH' ) || exit;

	global $product;

	$productName = $product->get_name();
	$price = $product->get_price();

	$onSale = $product->is_on_sale();
	$regularPrice = $onSale ? $product->get_regular_price() : null;
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('', $product); ?>>
	<section class="catalog-single">
		<div class="container">
			<h2 class="title">
				<?php echo $productName; ?>
			</h2>
			<div class="catalog-single__item">
				<div class="catalog-single__photos">
					<div
						class="catalog-single__img catalog-single__img--big"
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
					<p class="text">
						Размеры: 420х70х15 (1,0584 м2) Соответствует ГОСТ 862.1 — 85. Влажность — 8-10%.
						<br><br>
						Это экологически чистый продукт высшей категории качества. произведён на оборудовании и по технологии
						немецких и итальянских производителей.
						<br><br>
						Артикул: 1A01103
					</p>
					<div class="catalog-single__cost">
						<?php echo wc_price($price); ?>
					</div>
					<button class="button button--brown">
						Оставить заявку
					</button>
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
</div>

<?php //do_action( 'woocommerce_after_single_product' ); ?>
<?php
	get_template_part('./template-parts/popular');
	get_footer();
?>