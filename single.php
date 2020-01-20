<?php
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