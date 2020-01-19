<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title>
		<?php the_title(); ?>
	</title>

	<?php wp_head(); ?>

	<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>

<body <?php body_class(); ?>>
<?php
	include(__DIR__ . '/template-parts/modal/send.php');
?>
<header class="header">
	<div class="container">
		<div class="header__nav">
			<a href="/" class="logo">
				<img src="<?php bloginfo('template_url'); ?>/static/images/images/logo.png">
			</a>
			<nav class="navigation">
				<?php
					wp_nav_menu(array(
						'theme-location' => 'elochka-top-menu'
					));
				?>
			</nav>
			<div class="header__mobile-btn">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<nav class="navigation navigation--mobile">
				<?php
					wp_nav_menu(array(
							'theme-location' => 'elochka-top-menu'
					));
				?>
			</nav>
		</div>
	</div>
</header>
<?php get_template_part('./template-parts/breadcrumbs') ?>

