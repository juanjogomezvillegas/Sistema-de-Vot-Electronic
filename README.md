# Sistema-de-Vot-Electronic

## Autor

- Juan José Gómez Villegas

## Desplegament de l'Aplicació

Es pot comprovar com funciona executant.

```sh
$ cd public/
$ php -S 0.0.0.0:8081
```

O

```sh
$ cd cli/
$ ./server.sh
```

I posant la barra d'adreces del navegador (http://{IP_del_servidor}:8081).

## Dades

Base de dades de l'aplicació.

```sql
CREATE DATABASE election_daw;
```

Només cal crear la base de dades, i configurar el config.php per accedir a la base de dades.

```php
$config["user"] = "usuari";
$config["pass"] = "password";
$config["dbname"] = "election_daw";
$config["host"] = "localhost";
```

Per accedir al config.php.

```sh
$ cd src/
$ cat config.php
```

I per importar la base de dades, es pot fer executant l'script initPDO.php

```sh
$ cd cli/
$ php initPDO.php
```
