# Wordpress test

## Enviroment

To load the dev enviroment of this project you need to have Docker installed on your computer, then run

```bash
  cd infrastructure
  docker-compose up --build -d
```
You can access through your browser at:
* https://wordpress.lvh.me

I upload with the repository the database.

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


# Project Development Documentation
## Introduction
This documentation outlines the development process of the project, detailing each step taken to achieve the desired solution. The project involves automating Pokemon insertions into a custom post type, utilizing Docker, Composer, PHPUnit, GuzzlePHP, and adhering to SOLID principles for code design.

## Development Steps
1. Infrastructure Setup with Docker Compose
The project's foundation was established using Docker Compose, ensuring a consistent and reproducible development environment.
2. Composer Integration
Composer was added to manage PHP dependencies efficiently. This simplifies package management and ensures the project's libraries are up-to-date.
3. PHPUnit Integration
PHPUnit was integrated to facilitate the development of test cases, ensuring code quality and robustness.
4. Initial Tests for PokeAPI Connection
PHPUnit tests were implemented to verify the connectivity with the PokeAPI, laying the groundwork for future testing.
5. GuzzlePHP Integration
GuzzlePHP was added to the project to simplify HTTP requests and interactions with external APIs, enhancing the application's flexibility.
6. Repository and Interface Base Class
A base class for repositories and interfaces was introduced, following SOLID principles. This facilitates the extension for various API connections.
7. PokeAPI Repository
The repository for the PokeAPI was added, allowing seamless communication with Pokemon data.
8. Services for Pokemon Retrieval
Services were created to retrieve Pokemon information based on ID or name. Also Randomly.
9. Custom Post Type Pokemon Setup
The custom post type "Pokemon" was established, complete with custom fields, ensuring a structured and organized storage of Pokemon data.
10. Single Pokemon Display
A template file, single-pokemon.php, was created to display individual Pokemon details within the WordPress theme.
11. Manual Pokemon Database Insertion
For debugging and initial development, manual insertion of Pokemon data into the database was performed.

Challenges Encountered
1. PHPUnit Sandbox for WordPress
Difficulties were encountered in setting up a custom PHPUnit sandbox for WordPress. Due to time constraints, the decision was made to proceed with basic PHPUnit testing.
