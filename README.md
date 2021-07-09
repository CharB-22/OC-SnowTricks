# Bienvenue sur le site Communautaire SnowTricks

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/7528ea2e702546bfb2cb53cc6bfdfb9e)](https://app.codacy.com/gh/CharB-22/OC-SnowTricks?utm_source=github.com&utm_medium=referral&utm_content=CharB-22/OC-SnowTricks&utm_campaign=Badge_Grade_Settings)

Collaborating website using Symfony to build the entire application. For more information go to : https://openclassrooms.com/fr/paths/59/projects/42/assignment

## Tables of Contents
  * [Repository Content](#repository-content)
  * [Technologies](#technologies)
  * [Set Up](#set-up)

## Repository content
  * The application pages and folders needed to run the application
  * The composer.json needed to install the libraries used for this project
  * UML diagrams

## Technologies
  * PHP 7.4.1
  * Symfony 5.2.9
  * Bootstrap v5.0.0
  * FontAwesome v5.15.3

## Set Up
  * Clone or download the github project
  ```
  git clone https://github.com/CharB-22/OC-SnowTricks.git
  ```
  * Install the needed libraries via composer
  ```
  composer install
  ```
  * Create an .env.local file if you run the website locally in order to update the database url. Add this link to the file :
  ```
  DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name?serverVersion=5.7"
  ```
  Update db_user, db_password and db_name with your own credentials and a name for the database for this project.
  An alternative is to just update this link directly into the .env file - however, make sure to remove # in front of the link, and update only the mysql one.

  * Create the database via your command line :
  ```
  php bin/console doctrine:database:create
  ```
  * Import the structure of the database thanks to the migrations in the project :
  ```
  php bin/console doctrine:database:create
  ```
  * Populate the database with the datas used to test
  ```
  php bin/console doctrine:fixtures:load
  ```
  * Start your server to go to the website demo:
  ```
  php -S localhost:8000 -t public
  ```

In order to test the application and all its features, a super user has been created in the fixtures. In order to connect using this credentials:
  * Username : SuperAdmin
  * Password : SuperAdmin
