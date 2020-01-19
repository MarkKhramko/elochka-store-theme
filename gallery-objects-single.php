<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Наши объекты в галереи (Конечная страница) (Gallery - Our Objects Single)
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neutral
 */

	get_header();
?>

<section class="our-objects-single">
	<div class="container">
		<h2 class="title">
			<?php the_title(); ?>
		</h2>
		<div class="our-objects-single__text">
			<?php the_content(); ?>
		</div>
	</div>
</section>

<?php
	get_footer();
?>
