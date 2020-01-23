<?php
	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 * Template Name: Энциклопедия (Encyclopedia)
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package neutral
	 */

	get_header();

	// Config
	$numberOfPostsInCategory = 4;

	// Get query vars
	$searchTerm = get_query_var('search', '');
	// Get category id
	$categoryId = get_query_var('category', null);

	// If search term defined, find posts
	if ($searchTerm != ''){
		$params = array(
			's' => $searchTerm,
			'post_type' => 'post'
		);

		$wc_query = new WP_Query($params);
	}
	// If category defined, find posts
	else if ($categoryId != null){
		$params = array(
			'post_type' => 'post',
			'cat' => $categoryId
		);

		$wc_query = new WP_Query($params);
	}

	$args = array(
		'orderby' => 'name',
		'order' => 'ASC',
		'parent' => 0
	);

	$parentCategories = get_categories($args);

	/* UNREQUIRED
		// Create array of child categories
		$childCategories = array();
		// Populate child categories array
		foreach ($parentCategories as $key => $parentCategory) {
			$c = get_categories(array('parent' => $parentCategory->cat_ID));
			$childCategories = array_merge($childCategories, $c);
		}
	*/
?>

<section class="knowledge">
	<div class="container">
		<h2 class="title">
			<?php the_title(); ?>
		</h2>
		
		<div class="knowledge__container">

			<?php _get_template_part('./template-parts/encyclopedia/sidebar', null, [
					'search_term' => $searchTerm, 
					'categories' => $parentCategories,
					'category' => $categoryId
				]);
			?>

			<div class="knowledge__content">
				<div class="knowledge__head">
					Простой и понятный путеводитель о том, с чего начать знакомство с напольными покрытиями
				</div>
				<div class="knowledge__section">

					<?php if ($searchTerm == "" && $categoryId == null) : ?>

						<?php if (count($parentCategories) > 0) : foreach ($parentCategories as $key => $category) : ?>
							<h3 class="knowledge__title">
								<?php echo $category->name; ?>
							</h3>
							<p class="text">
								<?php echo $category->description; ?>
							</p>

							<div class="knowledge__grid">
								<?php
									// Get posts inside current category
									$args = array(
										'category' => $category->term_id,
										'post_type' => 'post',
										'posts_per_page' => $numberOfPostsInCategory
									);
									$posts = get_posts( $args );

									foreach ($posts as $post):
								?>
									<a href="<?php the_permalink(); ?>" class="knowledge__item">
										<div class="knowledge__item-img" style="background-image: url('<?php echo get_the_post_thumbnail_url();?>')"></div>
										<div class="knowledge__item-name">
											<?php the_title(); ?>
										</div>
									</a>
								<?php endforeach; ?>
							</div>
						<?php endforeach; endif; ?>


					<?php 
						// If search term or category definded:
						elseif($searchTerm != "" || $categoryId != null) : 
					?>
						<?php if ($wc_query->have_posts()) : ?>
							<div class="knowledge__grid">
								<?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
									<a href="<?php the_permalink(); ?>" class="knowledge__item">
										<div class="knowledge__item-img"
											 style="background-image: url('<?php echo get_the_post_thumbnail_url();?>"></div>
										<div class="knowledge__item-name">
											<?php the_title(); ?>
										</div>
									</a>
								<?php endwhile; wp_reset_postdata(); ?>
							</div>
						<?php else: ?>
							<p>
								По вашему запросу ничего не найдено...
							</p>
						<?php endif; ?>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>
	</div>
</section>

<?php
	get_template_part('./template-parts/consultation');
	get_footer();
?>
