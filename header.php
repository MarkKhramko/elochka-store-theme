<?php ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title><?php the_title(); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header class="header">
		<div class="container">
			<div class="header__nav">
				<a href="/" class="logo">
					<img src="<?php bloginfo('template_url');?>/static/images/images/logo.png">
				</a>
				<nav class="navigation">
					<!-- Создаёт список ссылок (<ul>li><a>) из настроек меню (Внешний вид->Меню) -->
					<?php 
						wp_nav_menu(
							[
								'theme-location' => 'elochka-top-menu'
							]
						);
					?>
				</nav>
			</div>
		</div>
	</header>
	<?php get_template_part('./template-parts/breadcrumbs') ?>