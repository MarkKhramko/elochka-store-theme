<?php
	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 * Template Name: Наши объекты в галереи (Gallery - Our Objects)
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package neutral
	 */

	get_header();

	$args = array(
		'post_type'      => 'page',
		'posts_per_page' => -1,
		'post_parent'    => $post->ID,
		'order'          => 'ASC',
		'orderby'        => 'menu_order'
	);

	$parent = new WP_Query($args);
?>

<section class="our-objects">
	<div class="container">
		<h2 class="title">
			<?php the_title(); ?>
		</h2>
		<div class="our-objects__grid">

			<?php if ($parent->have_posts() ) : while ( $parent->have_posts() ) : $parent->the_post(); ?>
				<div class="our-objects__item">
					<?php the_post_thumbnail('medium', ['class' => 'our-objects__img']);?>
					<div class="our-objects__text">
						<?php the_title(); ?>
					</div>
					<a href="<?php the_permalink(); ?>" class="button button--tr button--with-grey-arrow">
						<span>Описание</span>
					</a>
				</div>
			<?php endwhile; ?>
			<?php else: ?>
				<p>
					Страниц не обнаружено...
				</p>
			<?php endif; wp_reset_postdata(); ?>

		</div>
	</div>
</section>

<?php
	get_footer();
?>

