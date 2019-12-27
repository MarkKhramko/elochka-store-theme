<?php
	$priceMin = get_query_var('price_min', null);
	$priceMax = get_query_var('price_max', null);
?>
<label>
	Цена
</label>
<input 
	type="text"
	name="price_min"
	class="price-textbox"
	placeholder="Мин цена"
	tabindex="3"
	value="<?php echo $priceMin; ?>"
/>
<span> — <span/>
<input 
	type="text"
	name="price_max"
	class="price-textbox"
	placeholder="Макс цена"
	tabindex="4"
	value="<?php echo $priceMax; ?>"
/>