<?php

	// Get current terms ids
	$queryAttributes = get_query_var('attributes');

	$currentAttributes = array();
	if ($queryAttributes != ''){
		$currentAttributes = explode(',', $queryAttributes);
	}

	$query_args = array(
		'status' => 'publish',
		'limit' => -1
	);

	$products = wc_get_products($query_args);

	$attributesList = array();
	foreach($products as $product){
		foreach($product->get_attributes() as $taxonomy => $attribute){
			$attributeName = wc_attribute_label($taxonomy); // Attribute name

			if (!isset($attributesList[$taxonomy])){
				if ($attribute->get_terms()){
					$attributeData = array(
						'name' => $attributeName,
						'terms' => array()
					);

					foreach ($attribute->get_terms() as $term){
						$attributeData['terms'][] = array(
							"id" => $term->term_id,
							"name" => $term->name
						);
					}

					$attributesList[$taxonomy] = $attributeData;
				}
			}
		}
	}

	foreach ($attributesList as $taxonomyKey => $attributeData) :
?>
	<div data-tax_key="<?php echo $taxonomyKey; ?>" data-name="attributes-container" class="filters__option">
		<button class="filters__attr"
		>
			<?php echo $attributeData['name']; ?>
		</button>
		<ul class="filters__list">
			<?php
				foreach($attributeData['terms'] as $term) :
			?>
				<li class="filters__item">
                    <label>
					<input
						type="checkbox"
						name="attributes"
						value="<?php echo $term['id']; ?>"
						<?php
							foreach ($currentAttributes as $selectedAttributeId){
								if ($selectedAttributeId == $term['id']){
									echo 'checked';
									break;
								}
							}
						?>
					>
						<?php echo $term['name']; ?>
					</input>
                    </label>
				</li>

			<?php endforeach; ?>
		</ul>
	</div>
<?php	endforeach; ?>