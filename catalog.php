<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Каталог (Catalog)
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neutral
 */

	get_header();
?>

<section class="catalog">
	<div class="container">
		<?php get_template_part('./template-parts/catalog/catalog-filter') ?>
	</div>
</section>


<?php
	get_template_part('./template-parts/consultation');
	get_footer();
?>