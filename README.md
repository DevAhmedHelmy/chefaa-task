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
php artisan make:migrate

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

## Licence

This software is licensed under the Apache 2 license, quoted below.

Copyright 2018 Prismic.io (https://prismic.io).

Licensed under the Apache License, Version 2.0 (the "License"); you may not use this project except in compliance with the License. You may obtain a copy of the License at http://www.apache.org/licenses/LICENSE-2.0.

Unless required by applicable law or agreed to in writing, software distributed under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the License for the specific language governing permissions and limitations under the License.
