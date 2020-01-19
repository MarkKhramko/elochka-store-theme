<?php
	$searchQuery = get_query_var('search');
?>
<input
	type="text"
	name="search"
	class="catalog__inputs-search"
	placeholder="Поиск..."
	value="<?php echo $searchQuery; ?>"
	tabindex="1"
/>