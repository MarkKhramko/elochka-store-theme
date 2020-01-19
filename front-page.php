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
					<div class="socials__icons">
						<a href="#" class="socials__icon socials__icon--google"></a>
						<a href="#" class="socials__icon socials__icon--vk"></a>
						<a href="#" class="socials__icon socials__icon--instagram"></a>
						<a href="#" class="socials__icon socials__icon--twitter"></a>
						<a href="#" class="socials__icon socials__icon--pinterest"></a>
						<a href="#" class="socials__icon socials__icon--youtube"></a>
					</div>
				</div>
			</div>
		</div>
		<div class="intro__right">
			<div class="slider-intro">
				<div class="slider-intro__slider">
					<div data-id="0" class="slider-intro__slider-slide"
						 style="background-image: url('<?php bloginfo('template_url'); ?>/static/images/images/back.png')"></div>
					<div data-id="1" class="slider-intro__slider-slide"
						 style="background-image: url('<?php bloginfo('template_url'); ?>/static/images/images/back_2.png')"></div>
					<div data-id="2" class="slider-intro__slider-slide"
						 style="background-image: url('<?php bloginfo('template_url'); ?>/static/images/images/design.png')"></div>
				</div>
				<div class="slider-intro__bottom">
					<div class="slider-intro__arrow slider-intro__arrow--right"></div>
					<div class="slider-intro__arrow slider-intro__arrow--left"></div>
					<div class="slider-intro__pagination">
						<span data-id="0" class="slider-intro__pagination-bullet slider-intro__pagination-bullet--is-active "></span>
						<span data-id="1" class="slider-intro__pagination-bullet "></span>
						<span data-id="2" class="slider-intro__pagination-bullet "></span>
					</div>
					<div class="slider-intro__data">
						<div class="slider-intro__for-slide">
							<div class="slider-intro__name">Галерея</div>
							<a href="/galereya" class="button button--tr button--with-white-arrow">
								<span>Подробнее</span>
							</a>
						</div>
						<div class="slider-intro__for-slide">
							<div class="slider-intro__name">Каталог</div>
							<a href="/katalog" class="button button--tr button--with-white-arrow">
								<span>Подробнее</span>
							</a>
						</div>
						<div class="slider-intro__for-slide">
							<div class="slider-intro__name">О нас</div>
							<a href="/o-nas" class="button button--tr button--with-white-arrow">
								<span>Подробнее</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="about">
	<div class="container">
		<h2 class="title">О нас</h2>
		<div class="about__container">
			<div class="about__img"
				 style="background-image: url('<?php bloginfo('template_url'); ?>/static/images/images/back_2.png')">
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

<?php get_footer(); ?>

