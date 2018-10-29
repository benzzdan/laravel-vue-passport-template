# laravel-vue-passport-template
This is a Laravel backend with passport authentication set with Vue JS front end Login and Register views


Steps to install: 

1. composer install 
2. npm install 
3. php artisan key:generate
4. Update .env file 
      4.1 APP_KEY=base64:UPw8x/KWa/2iY9104aQ9tv/Wi4mJl2BFQzuG8daxxK4= (update key)
      4.2 DB_DATABASE=<databasename>
      4.3 DB_USERNAME=<username>
      4.4 DB_PASSWORD=<password if any>
      4.5 CLIENT_SECRET=<client secret>
      4.6 CLIENT_ID=<clientID>
      4.7 GRANT_TYPE=password
5. php artisan migrate
6. php artisan passport:install
7. Update .env file with clien ID and secret from last command or from the entries on db
