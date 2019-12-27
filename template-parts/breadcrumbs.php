<?php
	if (!is_home() && !is_front_page()) :
		if (function_exists ('woocommerce_breadcrumb')) :
?>
		<section class="breadcrumbs">
			<?php woocommerce_breadcrumb(); ?>
		</section>
<?php
		endif;
	endif;
?>