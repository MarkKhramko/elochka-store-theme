<?php
	$searchTerm = $args['search_term'];
	$childCategories = $args['child_categories'];
?>

<div class="sidebar">
	<form id="elochka-encyclopedia-filter">
		<input
			id="search"
			name="search"
			class="search"
			value="<?php echo $searchTerm; ?>"
		>
	</form>
	<ul class="knowledge__filter">
		<?php if (count($childCategories) > 0) : foreach ($childCategories as $key => $category) : ?>
			<li class="knowledge__list-item">
				<?php echo $category->name; ?>
			</li>
		<?php endforeach; endif; ?>
	</ul>
</div>