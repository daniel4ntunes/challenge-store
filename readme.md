<p align="center"><img src="https://reli.sh/wp-content/themes/relish/assets/img/services/icon-games.png" width="100" height="100" alt="Logo"> GamersXYZ</p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

### Installation

- Clone the project:
```bash
git clone git@github.com:DanielAntunes97/loja.git
```
- Install composer packages:
```bash
docker run --rm -v $(pwd)/loja:/app composer:latest install
```
- Copy .env file:
```bash
cp loja/.env.example loja/.env
```
- Make Laravel key;
```bash
docker run --rm -v $(pwd)/loja:/app -it php:alpine php app/artisan key:generate
```
- Upload containers with docker-compose (this process may take up to 35 seconds after the images download):
```bash
docker-compose -f loja/docker-compose.yml up -d
```
<!-- - Install database (after MySQL container started):
```bash
docker exec -it loja-app php artisan migrate
```
- Generate fake data:
```bash
docker exec -it loja-app php artisan db:seed
```
- Run unit tests:
```bash
docker run --rm -it -v $(pwd)/loja:/app phpunit/phpunit:latest --testsuit=Unit -->
```
- Access your local environment: http://172.11.0.2
