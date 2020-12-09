# Docker + Lumen with Nginx and MySQL

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)


This setup is great for writing quick apps in PHP using Lumen from an any Docker client. It uses docker-compose to setup the application services.

## Clone this repo

```bash
git clone https://github.com/dikhimartin/receipt_api_lumen.git
cd docker-lumen
```

### Configuration

There are two configurations using `.env` files. One `.env` file for docker-compose.yaml and another for the php application.

```sh
# copy both files and make changes to them if needed
cp .env.docker.example .env
cp .env.app.example app/.env
```

To change configuration values, look in the `docker-compose.yml` file and change the `php` container's environment variables. These directly correlate to the Lumen environment variables.

## Docker Setup

### [Docker for Mac](https://docs.docker.com/docker-for-mac/)

### [Docker for Windows](https://docs.docker.com/docker-for-windows/)

### [Docker for Linux](https://docs.docker.com/engine/installation/linux/)

### Build & Run

```bash
docker-compose up --build -d
```

Navigate to [http://localhost:8001](http://localhost:8001) and you should see something like this

Success! You can now start developing your Lumen app on your host machine and you should see your changes on refresh! Classic PHP development cycle. A good place to start is `images/php/app/routes/web.php`.

Feel free to configure the default port 8001 in `docker-compose.yml` to whatever you like.

### Stop Everything
```bash
docker-compose down
```

## Running Artisan commands
```sh
docker-compose exec php sh
# inside the container
cd ..
php artisan migrate
php artisan cache:clear
```

## Contribute
Author = Dikhi Martin
