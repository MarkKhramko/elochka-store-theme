<div class="search-wrapper">
	<form method="get" action="<?php echo home_url('/katalog/'); ?>">
		<input 
			type="text"
			name="search"
			size="20"
			class="search-textbox"
			placeholder="<?php esc_html_e( 'Поиск...', 'tishonator' ); ?>"
			tabindex="1"
			required
		/>
		<button type="submit" class="search-button"></button>
	</form>
</div>