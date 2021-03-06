<?php

	// Get current category slug
	$currentCategory = get_query_var('category');

	$taxonomy     = 'product_cat';
	$orderby      = 'name';  
	$show_count   = 0; // 1 for yes, 0 for no
	$pad_counts   = 0; // 1 for yes, 0 for no
	$hierarchical = 1; // 1 for yes, 0 for no  
	$title        = '';
	$hideEmpty    = 1;

	$args = array(
		'taxonomy'     => $taxonomy,
		'orderby'      => $orderby,
		'show_count'   => $show_count,
		'pad_counts'   => $pad_counts,
		'hierarchical' => $hierarchical,
		'title_li'     => $title,
		'hide_empty'   => $hideEmpty
	);
	$all_categories = get_categories($args);

	$categoriesHierarchyList = array();

	foreach ($all_categories as $cat) :
		if ($cat->category_parent == 0) :
			$category_id = $cat->term_id;
			$slug = $cat->slug;
?>
			<div class="filters__container">
				<div class="filters__category">
					<button 
						type="submit" 
						data-name="category" 
						data-slug="<?php echo $slug; ?>" 
						data-selected="<?php echo $currentCategory === $slug ? 'true' : 'false' ?>"
						class="filters__category-button"
					>
						<?php echo $cat->name; ?>
					</button>
				</div>
				<ul class="filters__subcategory">
					<?php
						$args2 = array(
							'taxonomy'     => $taxonomy,
							'child_of'     => 0,
							'parent'       => $category_id,
							'orderby'      => $orderby,
							'show_count'   => $show_count,
							'pad_counts'   => $pad_counts,
							'hierarchical' => $hierarchical,
							'title_li'     => $title,
							'hide_empty'   => $hideEmpty
						);

						$sub_cats = get_categories($args2);
						if ($sub_cats) :
							foreach($sub_cats as $sub_category) :
					?>
								<li>
									<button
										type="submit"
										data-name="category"
										data-slug="<?php echo $sub_category->slug; ?>"
										data-selected="<?php echo $currentCategory === $sub_category->slug ? 'true' : 'false' ?>"
									>
										<?php echo $sub_category->name; ?>
									</button>
								</li>
					<?php endforeach; endif; ?>
				</ul>
			</div>

<?php	
		endif;
	endforeach;
?>