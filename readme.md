# Library

Basic book management system using laravel

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

```
PHP: 7.1.3 or higher.
Mysql
Composer
```

### Installing

1 . Clone the this repository
```
git clone https://github.com/Vishnuak/library.git
```
2. Inside the cloned folder run composer install
```
composer install
```
3. Create a .env file for laravel or just rename .env.example to .env and update environment values
```
APP_URL
DB_CONNECTION
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```

4. Migrate database

```
php artisan migrate
```
That's it installation completed !

## Running the app

On server
```
point the domain to public directory
```
On local
```
php artisan serve
```


## Built With

* [Laravel](https://laravel.com/docs/5.5/) - The PHP Framework For Web Artisans
* [Composer](https://getcomposer.org/doc/) - Dependency Management
* [Bootstrap](https://getbootstrap.com/docs/4.3/getting-started/introduction/) - Front-end component library

## Authors

* **Vishnu A K** - [Account](https://github.com/vishnuak)


## License

The Laravel framework is open-sourced software licensed under the MIT license.


