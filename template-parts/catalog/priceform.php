<div class="price-wrapper">
	<label>
		Цена:
	</label>
	<form method="get" action="<?php echo home_url('/katalog/'); ?>">
		<input 
			type="text"
			name="price_min"
			size="20"
			class="price-textbox"
			placeholder="<?php esc_html_e( 'Мин', 'tishonator' ); ?>"
			tabindex="1"
			value="0"
		/>
		<span> — <span/>
		<input 
			type="text"
			name="price_max"
			size="20"
			class="price-textbox"
			placeholder="<?php esc_html_e( 'Макс', 'tishonator' ); ?>"
			tabindex="1"
		/>
		<button type="submit" class="price-button"></button>
	</form>
</div>