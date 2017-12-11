# Laravel Test Project

## Installation

1. Clone the repository
2. Run `composer install` to install dependencies
3. Run `npm install` to install JS libraries
4. Create .env file from .env.example and enter correct DB crendetials ( database name, user, password)
5. Run `php artisan key:generate` to generate private key 
6. Run `php artisan migrate` to create the tables
7. Run `php artisan serve` to start the dev server
8. Click `Login` from top menu and login using Login: `thefirst@gmail.com` Password: `secret`
9. Run `./vendor/bin/phpunit` to run the test which will check all ratings based on partners count


To signup as a partner of one of registered user navigate to /register?referer= followed by base64 encode ueser email.
For example to register as a partner of thefirst@gmail.com navigate to /register?referer=dGhlZmlyc3RAZ21haWwuY29t and sign up
