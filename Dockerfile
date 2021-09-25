FROM webdevops/php-nginx-dev:8.0
WORKDIR /app
EXPOSE 8080
ENTRYPOINT composer install && php artisan serve --host 0.0.0.0 --port=8080
