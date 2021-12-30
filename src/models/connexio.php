<?php

class Connexio
{
    private $sql;

    public function __construct($config)
    {
        $dsn = "mysql:dbname={$config['dbname']};host={$config['host']}";
        $usuari = $config['user'];
        $password = $config['pass'];

        try {
            $this->sql = new \PDO($dsn, $usuari, $password);
        } catch (\PDOException $e) {
            die("Ha fallat la connexió: " . $e->getMessage() . " $usuari");
        }
    }

    public function getConnexio()
    {
        return $this->sql;
    }
}
