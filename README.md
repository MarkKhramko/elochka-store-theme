# Установка 

## 1

Скопировать репозиторий в папку темы

`cd <wordpress_root>/wp-content/themes/`

`git clone https://github.com/MarkKhramko/elochka-store-theme elochka-store`

## 2 

Активировать тему `elochka-store` в `/wp-admin` (Внешний вид -> Темы)

## 3

Создать страницы в `/wp-admin` (Страницы -> Добавить новую)

* "Главная" с URL `/`, Шаблон `Базовый шаблон`
* "О нас" с URL `/o-nas`, Шаблон `About-us`
* "Каталог" с URL `/katalog`, Шаблон `Catalog`
* "Галерея" с URL `/galereya`, Шаблон `Gallery`

## 4

Создать пункты меню в `/wp-admin` (Внешний вид -> Меню -> создайте новое меню)

* Название: "top-navigation" страницы:
* * "Главная"
* * "О нас"
* * "Каталог"
* * "Галерея"

