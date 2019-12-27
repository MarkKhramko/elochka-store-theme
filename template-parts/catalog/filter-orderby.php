<?php

	// WPCS: sanitization ok, input var ok, CSRF ok.
	$orderby = get_query_var('orderby');

	$orderByOptions = array(
		'none' => 'Сортировать по:',
		'date-asc' => "Дата: сначала новые",
		'date-desc' => "Дата: сначала старые",
		'price-asc' => "Цены: по возрастанию",
		'price-desc' => "Цены: по убыванию"
	);

	$currentKey = isset($orderby) && $orderby != "" ? $orderby : "none";
?>

<select id="filter-orderby" name="orderby" form="elochka-main-filter">
	<?php foreach ($orderByOptions as $key => $value) : ?>
		<option value="<?php echo $key; ?>" <?php if ($key == $orderby) echo 'selected'; ?>>
			<?php echo $value; ?>
		</option>
	<?php endforeach; ?>
</select>