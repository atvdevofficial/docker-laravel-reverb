# Laravel Docker Setup

This is a sample project to demonstrate the use of the laravel-reverb package using docker.

## Containers

-   Laravel, `php-fpm`
-   Nginx
-   MySQL
-   Reverb, `php-cli`, and
-   Redis

## Commands / Scripts

-   Build assets,
    -   `yarn build`, for production build,
    -   or `yarn dev`, for dev build with hot reload capabilities.
-   Run migration,
    -   `docker exec -it laravel_app php artisan migrate:fresh --seed`

## Use in an existing project

All that is needed to be done, is to copy the `docker` folder and the `docker-compose.yaml` into an existing project, based on testing. &#128513;

## Frequently Asked Questions

Why is the environment variables for `REVERB_HOST` and `VITE_REVERB_HOST` doesn't have the same value in Laravel?

> Because of how docker is setup, our `Redis` service doesn't have access or see our `reverb` service thru `localhost:6001`, because doing `localhost:6001` inside the `Redis` service points back directly to it. That is why for backend, `REVERB_HOST`, we set it to the name of our `Reverb` service, `reverb`, and for frontend we point it to `localhost`.

Should the queue worker be ran manually?

> No, the queue worker is being handled by `supervisor` installed in `app` container.
