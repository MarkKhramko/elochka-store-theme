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
					<a href="<?php echo get_the_post_thumbnail_url(); ?>" class="catalog-single__img catalog-single__img--big" data-lightbox="<?php echo get_the_post_thumbnail_url(); ?>"
					 style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></a>
				</div>
				<div class="catalog-single__info">
					<p class="text">
						Размеры: <?php echo $product->get_attribute('razmer'); ?> Соответствует ГОСТ 862.1 — 85. Влажность — 8-10%.
						<br><br>
						<?php echo $product->get_description(); ?>
						<br><br>
						Артикул: <?php echo $product->get_sku(); ?>
					</p>
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
							<?php
								foreach($product->get_attributes() as $taxonomy => $attribute) :
									$attributeName = wc_attribute_label($taxonomy); // Attribute name

									if ($attribute->get_terms()) :
										foreach ($attribute->get_terms() as $term) :
							?>
											<tr>
												<td><?php echo $attributeName; ?></td>
												<td><?php echo $term->name; ?></td>
											</tr>
							<?php
										endforeach;
									endif;
								endforeach;
							?>
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
