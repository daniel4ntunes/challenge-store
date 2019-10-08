<h1 align="center">:video_game: Store GamersXYZ :computer:</h1>

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/DanielAntunes97/loja/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/DanielAntunes97/challenge-store/?branch=master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/DanielAntunes97/challenge-store/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)

## Installation

- Clone the project:
```console
foo@bar:~$ git clone git@github.com:DanielAntunes97/loja.git
```
- Access the project folder:
```console
foo@bar:~$ cd loja
```
- Install composer packages:
```console
foo@bar:~$ docker run --rm -v $(pwd):/app composer:latest install
```
- Copy .env file:
```bash
foo@bar:~$ cp .env.example .env
```
- Upload containers with docker-compose:
```console
foo@bar:~$ docker-compose up -d
```
- Make Laravel key;
```console
foo@bar:~$ docker exec -it loja-app php artisan key:generate
```
- Install database:
```console
foo@bar:~$ docker exec -it loja-app php artisan migrate
```
- Generate fake data:
```console
foo@bar:~$ docker exec -it loja-app php artisan db:seed
```
- Run unit tests:
```console
foo@bar:~$ docker run --rm -it -v $(pwd):/app phpunit/phpunit:latest --testsuit=Unit
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

## Author

👤 **Daniel Antunes**

* E-mail: <daniel.antunes1697@gmail.com>
