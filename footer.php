<?php
	/**
	 * The template for displaying the footer
	 *
	 * Contains the closing of the #content div and all content after.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package neutral
	 */
?>

	<footer class="footer">
		<div class="container">
			<div class="footer__grid">
				<div class="footer__contacts">
					<h3 class="footer__title">
						Наши контакты:
					</h3>
					<a href="#" class="footer__data">+79235323377</a>
					<a href="#" class="footer__data">info@elochka42.ru</a>
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
				<div class="footer__rights">
					ООО "Ёлочка" © 2018. все права защищены. копирование и использование материалов сайта только со ссылкой
					на источник.
				</div>
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
	</body>
</html>
