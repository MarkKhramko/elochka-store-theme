<?php
	$title = "Паркет";
?>

<h2 class="title">
	<?php echo $title; ?>
</h2>
<div class="catalog__container">
	<div class="sidebar">
		<div class="filters">
			<form id="elochka-main-filter" method="get" action="<?php the_permalink(); ?>">
				<button type="submit" class="search-button"></button>
				<?php get_template_part('./template-parts/catalog/filter-search') ?>
				<?php get_template_part('./template-parts/catalog/filter-orderby') ?>
				<?php get_template_part('./template-parts/catalog/filter-price') ?>
			</form>
		</div>
	</div>
	<?php get_template_part('./template-parts/catalog/catalog-grid') ?>
</div>