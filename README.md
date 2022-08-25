# Setup Lift4You Backend

* Install [git](https://git-scm.com/downloads) and [Docker Desktop](https://www.docker.com/products/docker-desktop).
* Start the Docker Desktop application
* Run from your terminal/cmd
```shell
git clone https://gitlab.com/ikdoeict/ruben.vanderkelen/2122wmfs-laravel-herexamen.git
```
* When Docker is up and running, run from your terminal/cmd
```shell
cd 2122wmfs-laravel-herexamen
docker-compose up
```
* When the containers are up and running, run from a new terminal/cmd
```shell
cd 2122wmfs-laravel-herexamen
docker-compose exec php-web bash
```
From the Bash terminal in the php-web container, run the following commands:
```shell
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
```
* Browse to [http://localhost:8080](http://localhost:8080)
* Stop the environment in your terminal/cmd by pressing <code>Ctrl+C</code>
* In order to avoid conflicts with your lab environment, run from your terminal/cmd
```shell
docker-compose down
```