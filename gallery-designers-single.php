<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Мировые дизайнеры в галереи (Конечная страница) (Gallery - Designers Single)
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neutral
 */

	get_header();
?>

<section class="designers-single">
	<div class="container">
		<h2 class="title">
			<?php the_title(); ?>
		</h2>
		<div class="designers-single__head">
			<div class="designers-single__img" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>')"></div>
			<div class="designers-single__text">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</section>

<?php
	get_template_part('./template-parts/consultation');
	get_footer();
?>
