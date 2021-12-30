# Sistema-de-Vot-Electronic

# Autors

- Juan José Gómez Villegas

# Desplegament de l'Aplicació

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

El contingut del script server.sh es el següent:

```sh
#!/bin/sh
cd ../public
php -S 0.0.0.0:8081
```

I posant la barra d'adreces del navegador (http://{IP_del_servidor}:8081).

Nota: "IP_del_servidor" s'ha de canviar per la IP del servidor on heu clonat el repositori.

# Domini

Per accedir a l'aplicació fent servir un domini, s'ha d'executar l'script addhost.sh.

```sh
$ cd cli/
$ ./addhost.sh parametre1 parametre2
```

Nota: El primer parametre correspon al domini que usarem per accedir a l'aplicació. I el segon parametre es el password de l'usuari de la base de dades.

Per accedir a l'aplicació via web usarem l'adreça "https://www.election.daw".

Nota: www.election.daw s'ha de canviar per el domini real.

# Dades

Base de dades de l'aplicació.

```sql
CREATE DATABASE election_daw;
```

Nota: Només cal crear la base de dades si no has executat l'script addhost.sh.

Configurar el config.php per accedir a la base de dades.

Nota: Les més importants són "$config['user']" i "$config['pass']"

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

I Executem l'script initPDO.php que es a la carpeta cli/ per crear les taules que necessita l'aplicació per funcionar.

```sh
$ cd cli/
$ php initPDO.php
```
