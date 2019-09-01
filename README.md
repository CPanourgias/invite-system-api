# invite-system-api

A simple invitation system REST API

Done with [Symfony 4](https://symfony.com/4), testing with [PHPUnit](https://phpunit.de/), admin panel using [Sonata Admin Bundle](https://sonata-project.org/bundles/admin/3-x/doc/index.html).

## Endpoints

The api offers the following endpoints

* `/users`: Display a list of users in the database
* `/invites`: Display a list of invites on the database
* `/reciever/{id}/view`: View the invites user {id} has received
* `/reciever/{id}/accept_{inv_id}`: User {id} accepts the invite {inv_id}
* `/reciever/{id}/decline_{inv_id}`: User {id} declines the invite {inv_id}
* `/sender/{id}/view`: View the invites user {id} has sent
* `/sender/{id}/send_{usr_id}`: User {id} sends an invite to {usr_id}
* `/sender/{id}/cancel_{inv_id}`: User {id} cancels invite {inv_id}

## Running

The application requires [PHP](https://www.php.net/), [Composer](https://getcomposer.org/) and [MySQL](https://www.mysql.com/) installed.
Steps to take after cloning the repo:
* `composer install` installs the dependencies of the application.
* Modify this line `DATABASE_URL=mysql://db_user:db_password@127.0.0.1:3306/db_name` in the .env file to configure the database on your server
* Run `./bin/console doctrine:database:create` creates the database
* Run `./bin/console doctrine:migrations:migrate` updates the database schema 
* Run `./bin/console doctrine:fixtures:load` for some mock data.