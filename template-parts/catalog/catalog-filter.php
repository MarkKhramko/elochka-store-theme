<?php
	$currentCategory = get_query_var('category');

	$title = "Каталог";

	$category = get_category_by_slug($currentCategory);
	if ($category instanceof WP_Term) {
		$title = $category->name;
	}
?>
<h2 class="title">
	<?php echo ucfirst($title); ?>
</h2>
<div class="catalog__container">
	<form id="elochka-main-filter" method="get" action="<?php the_permalink(); ?>">
		<div class="catalog__form">
			<?php get_template_part('./template-parts/catalog/filter-search'); ?>
			<button type="submit" class="catalog__search-button">
				<span>Искать</span>
			</button>

			<div class="catalog__inputs">
				<?php get_template_part('./template-parts/catalog/filter-orderby'); ?>
			</div>
		</div>
	</form>
</div>
<div class="catalog__container">
	<div class="sidebar">
		<div class="filters">
			<?php get_template_part('./template-parts/catalog/filter-category'); ?>
			<?php get_template_part('./template-parts/catalog/filter-attribute'); ?>
		</div>
		</form>
	</div>
	<?php get_template_part('./template-parts/catalog/catalog-grid'); ?>
</div>