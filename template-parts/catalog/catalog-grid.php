<!-- Query parameters -->
<?php
	// Config
	$postsPerPage = 1;

	// Get current terms & ids
	$queryTerms = get_query_var('term-names', '');
	$queryAttributes = get_query_var('attributes', '');

	$selectedTerms = array();
	if ($queryTerms != ''){
		$selectedTerms = explode(',', $queryTerms);
	}

	$currentAttributes = array();
	if ($queryAttributes != ''){
		$currentAttributes = explode(',', $queryAttributes);
	}

	$currentCategory = get_query_var('category');
	$orderBy = get_query_var('orderby', null);
	$searchQuery = get_query_var('search');

	/*// Get minimal available price
	$priceMin = get_query_var('price_min', 0);
	if ($priceMin === '')
		$priceMin = 0;

	// Get maximal available price
	$priceMax = get_query_var('price_max', 100000000000);
	if ($priceMax === '')
		$priceMax = 100000000000;*/

	// Get page
	$currentPage = get_query_var('page');
	$currentPage = $currentPage ? $currentPage : 1;

	// Add price range
	/*$metaQuery = array(
		array(
			'key' => '_price',
			'value' => array($priceMin, $priceMax),
			'compare' => 'BETWEEN',
			'type' => 'NUMERIC'
		)
	);*/
	

	$params = array(
		'posts_per_page' => $postsPerPage,
		'offset' => ($currentPage - 1) * $postsPerPage,
		'post_type' => 'product',

		'meta_query' => $metaQuery,
		'tax_query' => array()
	);

	// If terms & attributes defined, add to query
	if (count($selectedTerms) > 0 && count($currentAttributes) > 0) {
		foreach ($selectedTerms as $termName) {
			$params['tax_query'][] = array(
				'taxonomy' => $termName,
				'field' => 'term_id',
				'terms' => $currentAttributes,
				'operator' => 'IN'
			);
		}
	}

	// If category defined, add to query
	if (!!$currentCategory){
		$params['tax_query'][] = array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => $currentCategory
		);
	}

	// If order by defined, add to query
	if (!!$orderBy){
		$orderByQueryLabel = '';
		$orderByQueryKey = '';
		if (preg_match("/date/i", $orderBy)){
			$orderByQueryLabel = 'date';
		}

		if (preg_match("/price/i", $orderBy)){
			$orderByQueryLabel = 'meta_value_num';
			$orderByQueryKey = '_price';
		}

		$orderByQueryOrder = 'asc';
		if (preg_match("/desc/i", $orderBy))
			$orderByQueryOrder = 'desc';
		

		$queryOrderBy = array(
			'orderby' => $orderByQueryLabel,
			'meta_key' => $orderByQueryKey,
			'order' => $orderByQueryOrder
		);

		$params = array_merge($params, $queryOrderBy);
	}

	$wc_query = new WP_Query($params);
?>
<div class="catalog__grid-container">
<div class="catalog__grid">
	<div class="catalog__list">
		<?php if ($wc_query->have_posts()) : ?>
			<?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
				<?php 
					// Extract product
					$product = new WC_Product(get_the_ID());
					/*$price = $product->get_price();*/

					$onSale = $product->is_on_sale();
					/*$regularPrice = $onSale ? $product->get_regular_price() : null;*/
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

					<a href="<?php the_permalink(); ?>" class="button button--tr button--with-grey-arrow">
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

</div>
    <?php _get_template_part('./template-parts/catalog/catalog-pagination', null, ['wc_query' => $wc_query]) ?>
</div>
