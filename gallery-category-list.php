<?php
	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 * Template Name: Категория Галерии (Gallery Category List)
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package neutral
	 */
	get_header();
?>

<section class="gallery">
	<div class="container">
		<h2 class="title">
			<?php the_title(); ?>
		</h2>

		<div>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; else: ?>
				<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>
		</div>

	</div>
</section>

<?php
	get_template_part('./template-parts/consultation');
	get_footer();
?>