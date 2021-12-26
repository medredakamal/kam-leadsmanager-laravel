## Leads Manager v1.00 - Built-in Laravel/AJAX

You can manage your leads, add, update, or even delete without refreshing , using jQuery & AJAX
This is a project I've made years ago (and updated it now)...


## App Preview
![LeadsManager Preview](https://github.com/medredakamal/kam-leadsmanager-laravel/raw/main/leadsmanager_preview.gif)

## Setup

If you don't have composer, install it first :

```bash
composer install
```

## Configure database

# Use .env file to setup your database
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= HERE DATABASE NAME
DB_USERNAME= HERE DATABASE USER
DB_PASSWORD= HERE DATABASE PASSWORD
```
# Migrate to database
```bash
php artisan migrate
```
# Seed the data (Generate fake data)
```bash
php artisan db:seed
```
# Launch the app
```bash
php artisan serve
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.
