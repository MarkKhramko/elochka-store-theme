<?php

	$query_args = array(
		'status' => 'publish',
		'limit' => -1
	);

	$products = wc_get_products($query_args);

	$attributesList = array();
	foreach($products as $product){
		foreach($product->get_attributes() as $taxonomy => $attribute ){
			$attributeName = wc_attribute_label( $taxonomy); // Attribute name
			$attributesList[] = $attributeName;
			// Or: $attribute_name = get_taxonomy( $taxonomy )->labels->singular_name;
			// foreach ($attribute->get_terms() as $term){
			// 		$attributesList[$taxonomy][$term->term_id] = $term->name;
			// 		// Or with the product attribute label name instead:
			// 		// $attributesList[$attribute_name][$term->term_id] = $term->name;
			// }
		}
	}

	var_dump($attributesList);
?>