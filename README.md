# Laravel Sample

> Laravel sample website with content retrieving from [prismic.io](https://prismic.io)

This project runs with Laravel version 9.2.

## Getting started

Assuming you've already installed on your machine: PHP (^9.0.2), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and [Node.js](https://nodejs.org).

``` bash
# install dependencies
composer install

# create .env file and generate the application key
cp .env.example .env
php artisan key:generate 

#DB Migration
php artisan migrate

#DB Seeder
php artisan db:seed

#returns cheapest 5 pharmacies
php artisan products:search-cheapest 22
```

Then launch the server:

``` bash
php artisan serve
```

The Laravel sample project is now up and running! Access it at http://localhost:8000.
 
