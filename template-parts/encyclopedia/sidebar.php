<?php
	$searchTerm = $args['search_term'];
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
	</form>
	<ul class="knowledge__filter">
		<?php if (count($categories) > 0) : foreach ($categories as $key => $category) : ?>
			<li class="knowledge__list-item">
				<?php echo trim($category->name, " "); ?>
			</li>
		<?php endforeach; endif; ?>
	</ul>
</div>