### Тестовое задание

#### Требования к http-серверу
1. Установленный `composer`
2. PHP версии 8.1 и выше
3. Apache http-сервер - т.к. используется `mod_rewrite` 

#### Деплой на http-сервер

1. Клонировать проект - `git clone https://github.com/jigius/klara.git`
2. Перейти в папку проекта - `cd klara/`
3. Установить зависимости проекта - `composer i`
4. Создать конфигурационный файл проекта - `cp .env-dist .env`
5. Заполнить параметры соединения к БД в файле `.env`
6. Запустить, из корневой папки проекта, команду `php artisan migrate` для создания схемы БД. 
7. Сделать настройки, чтобы корневой папкой у http-сервера стала папка проекта `public/`
8. Запустить диспетчер очереди заданий `php artisan queue:work` 
9. Готово!
