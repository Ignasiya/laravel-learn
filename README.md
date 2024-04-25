Учебное SPA приложение на стэке Laravel

Запуск проекта:
````
docker compose up -d --build
````
Для миграции:
````
docker compose exec php php artisan key:generate
docker compose exec php php artisan migrate
````
