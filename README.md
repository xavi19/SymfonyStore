# Symfony 4 Store with Docker [![symfony 4 docker](https://img.shields.io/badge/dev-symfony%204-F7CA18.svg?style=flat)](https://github.com/tulik/symfony-4-docker-runtime-env)

<p align="center">
  <img src="https://www.franciscougalde.com/wp-content/uploads/2018/01/symfony-4-a.png">
</p>

## How to start

```
$ git clone https://github.com/xavi19/SymfonyStore.git
$ cd SymfonyStore
$ docker-compose up -d
```
## Docker commands:
**Note:** you need to cd first to where your docker-compose.yml file lives.
```
$ docker-compose up -d //Run dockers in background
$ docker-compose down //Stop dockers
$ docker rm --force docker_name //Delete docker
$ docker-compose exec docker_name bash //Run docker bash
```

## Configure Doctrine for MySQL database:

**Note:** Configure your envairoment parameters in .env.dist file.
* Shell into the PHP container, `docker-compose exec php-fpm bash`
* Run symfony console and create db, `docker-compose exec php-fpm bin/console doc:sch:crea`
* Make entities, `docker-compose exec php-fpm bin/console make:entity`
* Make migration files, `docker-compose exec php-fpm bin/console make:migration`
* Make entities IMPORTANT: This can delete data from database, `docker-compose exec php-fpm bin/console make:migrations:migrate`
* Execute query, `docker-compose exec php-fpm bin/console doctrine:query:sql 'SQL QUERY'`


## &nbsp;

**Copyright Note:** Project in development by [Xavi Querol](https://github.com/xavi19).
