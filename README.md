
## О проекте

Данный проект разработан с использованием Laravel 10 и PHP 8.3. Его исполнение основано на https://dummyjson.com/docs/products: реализация API с добавлением, получением и сохранением в базе данных всех продуктов iPhone.

## Установка и запуск

Для запуска проекта использовался Docker (Docker-compose) - прописаны файлы конфигурации для nginx, docker-compose.yml, и Dockerfile, которые обеспечивают подключение к базе данных, работу веб-сервера и обработку запросов через php-fpm. 

Необходимо выполнить в терминале следующие команды для запуска проекта в контейнерах:

- cd docker - войти в директорию докера,
- docker-compose up -d - поднять контейнеры. 

Все необходимые зависимости, конфигурации и подключения прописаны в Dockerfile, nginx.conf и docker-compose.yml.

Подключение осуществляется через localhost:8089.

Доступ ко всем продуктам iPhone осуществляется через GET http://localhost:8089/api/products, добавление - через POST http://localhost:8089/api/add-products.

## Остановка Docker

Чтобы остановить контейнеры, используйте команду:

- docker-compose down

## Структура проекта

- База данных: PostgreSQL, для взаимодействия базой данных использовался Eloquent, создана модель Product с соответствующими свойствами и выполнена миграция таблицы.
- Маршруты: В routes/api.php подключен роут ProductController, реализующий методы getProducts и addNewProducts.
- Поодключение: реализовано подключение к специальному файлу от dummy, все json responces указаны с кодами и сообщениями/ошибками.
- Валидация: для проверки входных данных используется валидация.
- Другое: для дальнейшей быстрой реализации кода с recipes, posts, users были созданы свои модели (и миграции) с контроллерами. В них прописана примерная структура и логика.

## Тестирование API

Результаты работы тестировались в Postman.

## Инструменты и документация

Для достижения высокой эффективности и качества работы с Laravel были задействованы следующие инструменты:

- Artisan (инструмент командной строки) - Laravel Artisan Documentation,
- Eloquent (ORM для работы с базой данных) - Laravel Eloquent ORM Documentation,
- Routing (маршрутизация) - Laravel Routing Documentation,
- Migrations (управление схемами базы данных) - Laravel Migrations Documentation,
- Validation (проверка входящих данных на соответствие заданным правилам) - Laravel Validation Documentation.

## Контроль версий кода

Для управления версиями кода применяется GitHub.
Все коммиты распределены по логике структуры работы над проектом - основная ветка master, ветка разработки develop и features для разделения версий. 
