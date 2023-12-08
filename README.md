# Wordpress test

## Enviroment

To load the dev enviroment of this project you need to have Docker installed on your computer, then run

```bash
  cd infrastructure
  docker-compose up --build -d
```
You can access through your browser at:
* https://wordpress.lvh.me

## Access to the instance and install dependencies in Composer
```bash
  cd infrastructure
  docker-compose exec wordpress bash
  php /var/www/html/wp-content/themes/understrap-child/composer.phar install
```

## Access to the instance and execute tests
```bash
  cd infrastructure
  docker-compose exec wordpress bash
  php /var/www/html/wp-content/themes/understrap-child/vendor/bin/phpunit 
```
