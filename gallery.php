<?php
	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 * Template Name: Галерея (Gallery)
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

<section class="gallery">
	<div class="container">
		<h2 class="title">
			<?php the_title(); ?>
		</h2>
		<div class="gallery__grid">
			<?php if ($parent->have_posts() ) : while ( $parent->have_posts() ) : $parent->the_post(); ?>
				<a href="<?php the_permalink(); ?>" class="gallery__item">
					<?php the_post_thumbnail('medium', ['class' => 'gallery__item-img']);?>
					<div class="gallery__item-name">
						<?php the_title(); ?>
					</div>
				</a>
			<?php endwhile; ?>
			<?php else: ?>
				<p>
					Страниц не обнаружено...
				</p>
			<?php endif; wp_reset_postdata(); ?>


			<!-- <a href="/galereya/nashi-obekty/" class="gallery__item">
				<div class="gallery__item-img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="gallery__item-name">Наши объекты</div>
			</a>
			<a href="/galereya/mirovye-dizajnery/" class="gallery__item">
				<div class="gallery__item-img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="gallery__item-name">Мировые дизайнеры</div>
			</a>
			<a href="/galereya/podborki-intererov/" class="gallery__item">
				<div class="gallery__item-img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="gallery__item-name">Подборки интерьеров</div>
			</a> -->
		</div>
	</div>
</section>

<?php
	get_footer();
?>