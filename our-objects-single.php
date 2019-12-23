<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Our-objects-single
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neutral
 */

get_header();

?>

<section class="our-objects-single">
    <div class="container">
        <h2 class="title">Наши объекты</h2>
        <div class="our-objects-single__text">
            Частный интерьер в г.Кемерово. материал : клеевая кварц-виниловая плитка пр-во Ю.Корея. Укладка английская
            ёлочка в 2х цветах по дизайн проекту. Дизайнер Ольга Пудж.
        </div>
        <div class="our-objects-single__grid">
            <div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
            <div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
            <div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
            <div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
            <div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
            <div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
            <div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
            <div class="our-objects-single__photo" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
        </div>
        <div class="paggination">
            <div class="paggination__arrow paggination__arrow--left"></div>
            <div class="paggination__count">
                <ul>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                </ul>
            </div>
            <div class="paggination__arrow paggination__arrow--right"></div>
        </div>
    </div>
</section>

<?php get_template_part('./template-parts/dialog') ?>

<?php

get_footer();

?>
