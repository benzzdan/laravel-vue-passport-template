# laravel-vue-passport-template
This is a Laravel backend with passport authentication set with Vue JS front end Login and Register views




Steps to install: 

1. composer install 
2. npm install 
3. php artisan key:generate
4. Update .env file
5. php artisan migrate
6. php artisan passport:install
7. Update .env file with clien ID and secret from last command or from the entries on db


Create a couple of users:

➜  laravel-vue-passport-template git:(master) ✗ php artisan tinker <br>

factory('App\User')->create()
