<p align="center"><strong>Loja Virtual GamersXYZ</strong></p>

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/DanielAntunes97/loja/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/DanielAntunes97/loja/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/DanielAntunes97/loja/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

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
docker run --rm -v $(pwd)/loja:/app -it ambientum/php:7.2-nginx php app/artisan key:generate
```
- Upload containers with docker-compose (this process may take up to 35 seconds after the images download):
```bash
docker-compose -f loja/docker-compose.yml up -d
```
- Install database (after MySQL container started):
```bash
docker exec -it loja-app php artisan migrate
```
- Generate fake data:
```bash
docker exec -it loja-app php artisan db:seed
```
- Run unit tests:
```bash
docker run --rm -it -v $(pwd)/loja:/app phpunit/phpunit:latest --testsuit=Unit
```
- Access your local environment: http://localhost:8081/

### About

#### Requirements

- This app works with PHP (^7.0)
- [Docker](https://docs.docker.com/install/) (^18.04.0-ce-rc1)
- [docker-compose](https://docs.docker.com/compose/install/) (^1.19.0)

#### Docker images
- [mysql:latest](https://store.docker.com/images/mysql)
- [composer:latest](https://store.docker.com/images/composer)
- [phpunit:phpunit](https://store.docker.com/community/images/phpunit/phpunit)
