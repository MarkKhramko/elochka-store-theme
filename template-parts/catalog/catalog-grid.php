<!-- Query parameters -->
<?php
	$searchQuery = get_query_var('search');
	$priceMin = get_query_var('price_min', 0);
	$priceMax = get_query_var('price_max', 100000000000);

	// Order By filter
	$orderBy = get_query_var('orderby');
	$queryOrderBy = array(
		'orderby' => 'meta_value_num',
		'meta_key' => '_price',
		'order' => 'desc'
	);

	$metaQuery = array();
	// array(
	// 		'key' => '_price',
	// 		'value' => array($priceMin, $priceMax),
	// 		'compare' => 'BETWEEN',
	// 		'type' => 'NUMERIC'
	// 	)

	$params = array(
		'posts_per_page' => 9,
		'offset'         => 0,
		'post_type' => 'product',

		'meta_query' => $metaQuery
	);
	$wc_query = new WP_Query($params);
?>
<div class="catalog__grid">
	<div class="catalog__list">
		<?php if ($wc_query->have_posts()) : ?>
			<?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
				<?php 
					// Extract product
					$product = new WC_Product(get_the_ID());
					$price = $product->get_price();

					$onSale = $product->is_on_sale();
					$regularPrice = $onSale ? $product->get_regular_price() : null;
				?>
				<div class="catalog__item">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('medium', ['class' => 'catalog__item-img']);?>
					</a>
					<a href="<?php the_permalink(); ?>">
						<div class="catalog__item-title">
							<?php the_title(); ?>
						</div>
					</a>
					<div class="catalog__item-subtitle">
						<?php echo $product->get_attribute('razmer'); ?>
					</div>
					<?php if (!!$onSale) : ?>
						<div class="catalog__item-sale-cost">
							<?php echo wc_price($regularPrice); ?>
						</div>
					<?php endif; ?>
					<div class="catalog__item-cost">
						<?php echo wc_price($price); ?>
					</div>
					<a href="<?php echo $productLink; ?>" class="button button--tr button--with-grey-arrow">
						<span>Описание</span>
					</a>
				</div>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		<?php else: ?>
			<p>
				<?php _e('По вашему запросу товаров не найдено.'); ?>
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