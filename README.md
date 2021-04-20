<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<h1 align="center"> PSEUDO-DISCORD </h1>

## About:
This is a backend project which tries to emulate a discord text channel. You can generate "parties" for and expecific game and users can join and they have a text chat.

## Get started  🚀
Write the following commands line to start onces you get download the project:

- compose install

If you want to have the DB in docker:
- docker run -e MYSQL_ROOT_PASSWORD=my-secret-pw -p 3306:3306 mysql

You will need a file in the project's root and you must name it .env and delete the file called .envexample</br>

Copy and paste this into .env file and configure with your DB name, port, username, password... : </br> </br>
APP_NAME=Laravel</br>
APP_ENV=local </br>
APP_KEY=base64:nzdeTIRxmxZS+TGRBJE3SFb0Ihc+PFFu/sK3heP/j6M= </br>
APP_DEBUG=true </br>
APP_URL=http://localhost </br>
LOG_CHANNEL=stack </br>
LOG_LEVEL=debug </br>
DB_CONNECTION=mysql </br>
DB_HOST=127.0.0.1 </br>
DB_PORT=3308 </br>
DB_DATABASE=laravel-crud </br>
DB_USERNAME=root </br>
DB_PASSWORD=1234 </br>
BROADCAST_DRIVER=log </br>
CACHE_DRIVER=file </br>
QUEUE_CONNECTION=sync </br>
SESSION_DRIVER=file </br>
SESSION_LIFETIME=120 </br>
MEMCACHED_HOST=127.0.0.1 </br>
REDIS_HOST=127.0.0.1 </br>
REDIS_PASSWORD=null </br>
REDIS_PORT=6379 </br>
MAIL_MAILER=smtp </br>
MAIL_HOST=mailhog </br>
MAIL_PORT=1025 </br>
MAIL_USERNAME=null </br>
MAIL_PASSWORD=null </br>
MAIL_ENCRYPTION=null </br>
MAIL_FROM_ADDRESS=null </br>
MAIL_FROM_NAME="${APP_NAME}" </br>
AWS_ACCESS_KEY_ID= </br>
AWS_SECRET_ACCESS_KEY= </br>
AWS_DEFAULT_REGION=us-east-1 </br>
AWS_BUCKET= </br>
PUSHER_APP_ID= </br>
PUSHER_APP_KEY= </br>
PUSHER_APP_SECRET= </br>
PUSHER_APP_CLUSTER=mt1 </br>
MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}" </br>
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}" </br>
</br>
</br>
Remember you will need to run the server with: </br>
- php artisan serve

For run the migrations: </br>
- php artisan migrate

If you need to delete the tables and re-run the migrations:
- php artisan migrate:fresh
- php artisan config:chache

Remember if you need help with commands:
- php artisan list

## DB diagram 🗃️

![DB](https://i.imgur.com/PWD8QFs.png)

## CRUD with Postman ![postman](https://i.imgur.com/cXur21z.png)
https://documenter.getpostman.com/view/14551941/TzJuAdMJ </br>
[![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/6fa5f7fa3147855632a6?action=collection%2Fimport)

## Technologies used 🛠️
![PHP](https://i.imgur.com/fbPjBdz.png) </br>
![Laravel](https://i.imgur.com/93BNYUW.png) </br>
![docker](https://i.imgur.com/QuJ9kSb.png) </br>
![mysql](https://i.imgur.com/RNewBCi.png) </br>

## authors 🧐
<a href="https://github.com/Roo-Git">@Roo-Git</a> </br>
<a href="https://github.com/Kronapsys">@Kronapsys</a> </br>
