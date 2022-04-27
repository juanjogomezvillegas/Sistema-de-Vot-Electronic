# Sistema-de-Vot-Electronic-Laravel

## Author

- Juan José Gómez Villegas

## Deployment of Application

```sh
$ git clone https://github.com/juanjogomezvillegas/Sistema-de-Vot-Electronic-Laravel.git o git@github.com:juanjogomezvillegas/Sistema-de-Vot-Electronic-Laravel.git
$ composer install
$ npm install && npm run dev
```

Després, Només cal crear la base de dades

```sql
CREATE DATABASE election;
```

I configurar el fitxer .env per accedir a la base de dades

```sh
$ cp .env.example .env
```

Al Fitxer .env s'han de configurar les linies següents:

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=election
DB_USERNAME=userDB
DB_PASSWORD=passwordDB
```

I Finalment

```sh
$ php artisan migrate o php artisan migrate:fresh
$ php artisan db:seed
```

I es pot comprovar com funciona executant.

```sh
$ php artisan serve
```

I posant la barra d'adreces del navegador (http://127.0.0.1:8000).
