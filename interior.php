<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Interior
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neutral
 */

get_header();

?>

	<section class="our-objects-single">
		<div class="container">
			<h2 class="title">Подборка интерьеров</h2>
			<div class="our-objects-single__grid">
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
			</div>
		</div>
	</section>

<?php get_template_part('./template-parts/dialog') ?>

<?php

get_footer();

?>