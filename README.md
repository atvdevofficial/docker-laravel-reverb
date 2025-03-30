# Laravel Docker Setup

This is a sample project to demonstrate the use of the laravel-reverb package using docker.

## Containers

-   Laravel, `php-fpm`
-   Nginx
-   MySQL
-   Reverb, `php-cli`
-   Redis

## Commands / Scripts

-   Laravel queue processor, `docker exec -it laravel_app php artisan queue:work`.
-   Build assets,
    -   `yarn build`, for production build,
    -   or `yarn dev`, for dev build with hot reload capabilities.

## Use in an existing project

All that is needed to be done, is to copy the `docker` folder and the `docker-compose.yaml` into an existing project, based on testing. &#128513;
