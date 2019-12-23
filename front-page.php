<?php get_header(); ?>

<section class="intro">
	<div class="container">
		<div class="intro__left">
			<div class="intro__container">
				<span class="intro__name">Магазин напольного покрытия</span>
				<h1 class="intro__title">Лучшие<br> в своем деле</h1>
				<button id="consult" class="button button--brown">Получить консультацию</button>
				<a href="/katalog" class="button button--tr button--with-grey-arrow">
					<span>Смотреть каталог</span>
				</a>
				<ul class="pluses">
					<li>Профессионалы с большим стажем работы</li>
					<li>На рынке более 10 лет</li>
					<li>Большой ассортимент товара</li>
				</ul>
				<div class="socials">
					социал иконки через плагин
				</div>
			</div>
		</div>
		<div class="intro__right">
			<div class="slider-intro">
				<div class="slider-intro__slider">
					<div class="slider-intro__slider-slide"
						 style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/back.png')"></div>
				</div>
				<div class="slider-intro__bottom">
					<div class="slider-intro__arrow"></div>
					<div class="slider-intro__paggination">
						<span class="slider-intro__paggination-bullet "></span>
						<span class="slider-intro__paggination-bullet "></span>
						<span class="slider-intro__paggination-bullet slider-intro__paggination-bullet--is-active"></span>
					</div>
					<div class="slider-intro__name">Галерея</div>
					<a href="/galereya" class="button button--tr button--with-white-arrow">
						<span>Подробнее</span>
					</a>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="about">
	<div class="container">
		<h2 class="title">О нас</h2>
		<div class="about__container">
			<div class="about__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/back_2.png')">
			</div>
			<div class="about__description">
				<div class="about__subtitle">Мы - профессионалы и фанаты своего дела.</div>
				<p>Многолетний опыт в сфере напольных покрытий позволяет нам с уверенностью с самого первого дня
					открытия нашего магазина утверждать, что мы одни из лучших в сегменте узкоспециализированных салонов
					напольных покрытий в России.</p>
				<ul class="pluses">
					<li>Большой выбор товаров по цене, которая подходит именно вам</li>
					<li>Мы поможем вам подобрать паркет для вашего интерьера</li>
				</ul>
				<a href="/o-nas" class="button button--with-grey-arrow">
					<span>Читать дальше</span>
				</a>
			</div>
		</div>
	</div>
</section>
<?php get_template_part('./template-parts/home/advantages') ?>
<?php get_template_part('./template-parts/home/bid') ?>
<?php get_template_part('./template-parts/home/sales') ?>
<?php get_template_part('./template-parts/home/popular') ?>
<?php get_template_part('./template-parts/home/dialog') ?>

<?php get_footer();?>
