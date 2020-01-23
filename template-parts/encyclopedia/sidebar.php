<?php
	$searchTerm = $args['search_term'];
	$category = $args['category'];
	$categories = $args['categories'];
?>

<div class="sidebar">
	<form id="elochka-encyclopedia-filter">
		<input
			id="search"
			name="search"
			class="search"
			value="<?php echo $searchTerm; ?>"
		>
		<input 
			id="category"
			name="category"
			type="hidden"
			value="<?php echo $category; ?>"
		>
	</form>
	<ul class="knowledge__filter">
		<?php if (count($categories) > 0) : foreach ($categories as $key => $category) : ?>
			<li class="knowledge__list-item" data-category-id="<?php echo $category->term_id; ?>">
				<?php echo trim($category->name, " "); ?>
			</li>
		<?php endforeach; endif; ?>
	</ul>
</div>