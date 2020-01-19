<?php
	/**
	 * The template for displaying all pages
	 *
	 * This is the template that displays all pages by default.
	 * Please note that this is the WordPress construct of pages
	 * and that other 'pages' on your WordPress site may use a
	 * different template.
	 * Template Name: Designers
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package neutral
	 */

	get_header();
?>

<section class="designers">
	<div class="container">
		<h2 class="title">Мировые дизайнеры</h2>
		<div class="designers__grid">
			<div class="designers__item">
				<div class="designers__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<h3 class="designers__name">Jamie Beckwith</h3>
				<a href="/mirovye-dizajnery/jamie-beckwith/" class="button button--tr button--with-grey-arrow"><span>Описание</span></a>
			</div>
			<div class="designers__item">
				<div class="designers__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<h3 class="designers__name">Jamie Beckwith</h3>
				<a href="/mirovye-dizajnery/jamie-beckwith/" class="button button--tr button--with-grey-arrow"><span>Описание</span></a>
			</div>
			<div class="designers__item">
				<div class="designers__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<h3 class="designers__name">Jamie Beckwith</h3>
				<a href="/mirovye-dizajnery/jamie-beckwith/" class="button button--tr button--with-grey-arrow"><span>Описание</span></a>
			</div>
			<div class="designers__item">
				<div class="designers__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<h3 class="designers__name">Jamie Beckwith</h3>
				<a href="/mirovye-dizajnery/jamie-beckwith/" class="button button--tr button--with-grey-arrow"><span>Описание</span></a>
			</div>
			<div class="designers__item">
				<div class="designers__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<h3 class="designers__name">Jamie Beckwith</h3>
				<a href="/mirovye-dizajnery/jamie-beckwith/" class="button button--tr button--with-grey-arrow"><span>Описание</span></a>
			</div>
			<div class="designers__item">
				<div class="designers__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
				<h3 class="designers__name">Jamie Beckwith</h3>
				<a href="/mirovye-dizajnery/jamie-beckwith/" class="button button--tr button--with-grey-arrow"><span>Описание</span></a>
			</div>
		</div>
	</div>
</section>


<?php get_template_part('./template-parts/dialog') ?>

<?php
	get_footer();
?>
