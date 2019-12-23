<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * Template Name: Our-objects
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package neutral
 */

get_header();

?>

<section class="our-objects">
    <div class="container">
        <h2 class="title">Наши объекты</h2>
        <div class="our-objects__grid">
            <div class="our-objects__item">
                <div class="our-objects__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
                <div class="our-objects__text">Частный интерьер в г.Кемерово. материал : клеевая кварц-виниловая плитка
                    пр-во Ю.Корея. Укладка английская ёлочка в 2х цветах по дизайн проекту. Дизайнер Ольга Ладурко.
                </div>
                <a href="#" class="button button--tr button--with-grey-arrow"><span>Описание</span></a>
            </div>
            <div class="our-objects__item">
                <div class="our-objects__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
                <div class="our-objects__text">Частный интерьер г.Новосибирск. Штучный паркет дуб натур. Укладка
                    английская ёлочка. Размер паркетной планки 420х70х15мм. На объекте сделана фаска, финишное покрытие
                    масло воск с тонировкой "табак". Дизайнер Елена Пудж.
                </div>
                <a href="#" class="button button--tr button--with-grey-arrow"><span>Описание</span></a>
            </div>
            <div class="our-objects__item">
                <div class="our-objects__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
                <div class="our-objects__text">Частный интерьер г.Новосибирск. Штучный паркет дуб натур. Укладка
                    английская ёлочка. Размер паркетной планки 420х70х15мм. На объекте сделана фаска, финишное покрытие
                    масло воск с тонировкой "табак". Дизайнер Елена Пудж.
                </div>
                <a href="#" class="button button--tr button--with-grey-arrow"><span>Описание</span></a>
            </div>
            <div class="our-objects__item">
                <div class="our-objects__img" style="background-image: url('<?php bloginfo('template_url');?>/static/images/images/img_2.png')"></div>
                <div class="our-objects__text">Частный интерьер г.Новосибирск. Штучный паркет дуб натур. Укладка
                    английская ёлочка. Размер паркетной планки 420х70х15мм. На объекте сделана фаска, финишное покрытие
                    масло воск с тонировкой "табак". Дизайнер Елена Пудж.
                </div>
                <a href="#" class="button button--tr button--with-grey-arrow"><span>Описание</span></a>
            </div>
        </div>
    </div>
</section>


<?php get_template_part('./template-parts/dialog') ?>

<?php

get_footer();

?>

