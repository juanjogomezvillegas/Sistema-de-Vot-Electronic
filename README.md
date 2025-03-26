# Sistema-de-Vot-Electronic-Laravel

## Author and License

![GPL-3.0 License](https://github.com/juanjogomezvillegas/Sistema-de-Vot-Electronic/blob/main/LICENSE)

Copyright (c) 2022,2025 Juan José Gómez Villegas

## Deployment of Application

The following commands must be run to Deploy the Application.

```sh
$ git clone https://github.com/juanjogomezvillegas/Sistema-de-Vot-Electronic-Laravel.git o git@github.com:juanjogomezvillegas/Sistema-de-Vot-Electronic-Laravel.git
$ composer install
$ npm install && npm run dev
```

After, need to create the database.

```sql
CREATE DATABASE election;
```

And configure the .env file to access the database.

```sh
$ cp .env.example .env
```

The following lines must be configured in the .env file:

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=election
DB_USERNAME=userDB
DB_PASSWORD=passwordDB
```

And finally.

```sh
$ php artisan migrate o php artisan migrate:fresh
$ php artisan db:seed
```

To start the Server you need to run.

```sh
$ php artisan serve
```

And to access the application, in your browser we access the address ({SERVER_IP}:8000).

{SERVER_IP} => The IP address of your Server.

![imatge](https://user-images.githubusercontent.com/83291394/170352142-0b91c481-f8d6-41cf-8abd-df00580f5106.png)
