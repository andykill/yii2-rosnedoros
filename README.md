Росреестр парсинг
=================
Парсинг Росреестровых планов)

Установка
------------

```
php composer.phar require --prefer-dist andykill/yii2-rosnedoros "*"
```

или добавьте

```
"andykill/yii2-rosnedoros": "*"

```
в секцию "require" в вашем файле `composer.json`


Выполнить миграцию для создания нужной таблицы в базе данных (консоль):
```
yii migrate --migrationPath=@andykill/rosnedoros/migrations --interactive=0


Использование
-----
Как модуль
http://ваш_сайт/rosnedoros