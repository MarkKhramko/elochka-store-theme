<?php

	$show_default_orderby = 'menu_order' === apply_filters('woocommerce_default_catalog_orderby', get_option('woocommerce_default_catalog_orderby'));
	$catalog_orderby_options = apply_filters('woocommerce_catalog_orderby', array(
		'menu_order' => __('Default sorting', 'woocommerce'),
		'date'       => "Товары: сначала новые",
		'date-des'       => "Товары: сначала старые",
		'price'      => "Цены: по возрастанию",
		'price-desc' => "Цены: по убыванию"
	));

	$default_orderby = wc_get_loop_prop('is_search') ? 'relevance' : apply_filters('woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', ''));

	// WPCS: sanitization ok, input var ok, CSRF ok.
	$orderby = isset($_GET['orderby']) ? wc_clean(wp_unslash($_GET['orderby'])) : $default_orderby;

	if (wc_get_loop_prop('is_search')) {
		$catalog_orderby_options = array_merge(array('relevance' => __('Relevance', 'woocommerce')), $catalog_orderby_options);

		unset($catalog_orderby_options['menu_order']);
	}

	if (!$show_default_orderby) {
		unset( $catalog_orderby_options['menu_order']);
	}

	if (!array_key_exists($orderby, $catalog_orderby_options)) {
		$orderby = current(array_keys($catalog_orderby_options));
	}
?>

<select name="orderby" form="elochka-main-filter" onchange="document.getElementById('elochka-main-filter').submit()">
	<?php foreach ($catalog_orderby_options as $key => $value) : ?>
		<option value="<?php echo $key; ?>" selected="<?php $value === $orderby; ?>">
			<?php echo $value; ?>
		</option>
	<?php endforeach; ?>
</select>