<?php

Class Db {

    public function PdoConnection() {
        $host = DB_HOST;
        $user = DB_USER;
        $name = DB_NAME;
        $password = DB_PASSWORD;
        $charset = 'utf8';
        
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES => true,
        ];

        $dsn = "mysql:host=$host;dbname=$name;charset=$charset";

        try {
            $conn = new \PDO($dsn, $user, $password, $options);
            return $conn;
        }
        catch(\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
