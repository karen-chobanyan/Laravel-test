# Laravel Test Project

## Installation

1. Clone the repository
2. Run `composer install` to install dependencies
3. Run `npm install` to install JS libraries
4. Create .env file from .env.example and enter correct DB crendetials ( database name, user, password)
5. Run `php artisan key:generate` to generate private key 
6. Run `php artisan migrate` to create the tables
7. Run `php artisan db:seed` to insert the sample data - 126 users and ratings for theme
7. Run `php artisan serve` to start the dev server
8. Click `Login` from top menu and login using - Username: `the.first` Password: `secret`
9. Run `./vendor/bin/phpunit` to run the test which will check all ratings based on partners count


To signup as a partner of the one of registered user, please,  navigate to /register?referer= followed by base64 encode uesername.
For example to register as a partner of the use with username the.first navigate to /register?referer=dGhlLmZpcnN0 and sign up
