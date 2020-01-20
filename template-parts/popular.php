<?php
	// Config
	$postsPerPage = 4;

	$params = array(
		'posts_per_page' => $postsPerPage,
		'post_type' => 'product',

		'tax_query' => array()
	);

	$wc_query = new WP_Query($params);
?>
<section class="popular">
	<div class="container">
		<h2 class="title">Популярные Товары</h2>
		<div class="popular__grid">
			<?php if ($wc_query->have_posts()) : ?>
				<?php while ($wc_query->have_posts()) : $wc_query->the_post(); ?>
					<?php 
						// Extract product
						$product = new WC_Product(get_the_ID());
						/* REMOVED BY CLIENT INTENTION
							$price = $product->get_price();
						*/

						$onSale = $product->is_on_sale();
						/* REMOVED BY CLIENT INTENTION
							$regularPrice = $onSale ? $product->get_regular_price() : null;
						*/
					?>
					<div class="popular__item">
						<a href="<?php the_permalink(); ?>">
							<div class="popular__img" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')"></div>
						</a>
						<a href="<?php the_permalink(); ?>">
							<div class="popular__name">
								<?php the_title(); ?>
							</div>
						</a>
						<div class="popular__description">
							<?php echo $product->get_attribute('razmer'); ?>
						</div>

						<a href="<?php the_permalink(); ?>" class="button button--tr button--with-grey-arrow">
							<span>Описание</span>
						</a>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php else: ?>
				<p>
					<?php _e('Товаров не найдено.'); ?>
				</p>
			<?php endif; ?>
		</div>
	</div>
</section>
