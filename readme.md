<p align="center"><strong>Loja Virtual GamersXYZ</strong></p>

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/DanielAntunes97/loja/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/DanielAntunes97/loja/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/DanielAntunes97/loja/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

### Installation

- Clone the project:
```bash
git clone git@github.com:DanielAntunes97/loja.git
```
- Access the project folder:
```bash
cd loja
```
- Install composer packages:
```bash
docker run --rm -v $(pwd):/app composer:latest install
```
- Copy .env file:
```bash
cp .env.example .env
```
- Upload containers with docker-compose:
```bash
docker-compose up -d
```
- Make Laravel key;
```bash
docker exec -it loja-app php artisan key:generate
```
- Install database:
```bash
docker exec -it loja-app php artisan migrate
```
- Generate fake data:
```bash
docker exec -it loja-app php artisan db:seed
```
- Run unit tests:
```bash
docker run --rm -it -v $(pwd):/app phpunit/phpunit:latest --testsuit=Unit
```
- Access your local environment: http://localhost:8081/

### About

#### Requirements

- This app works with PHP (^7.0)
- [Docker](https://docs.docker.com/install/) (^18.04.0-ce-rc1)
- [docker-compose](https://docs.docker.com/compose/install/) (^1.19.0)

#### Docker images
- [mysql:5.6](https://store.docker.com/images/mysql)
- [composer:latest](https://store.docker.com/images/composer)
- [phpunit:phpunit](https://store.docker.com/community/images/phpunit/phpunit)

### Author

Daniel Antunes - <daniel.antunes1697@gmail.com>
