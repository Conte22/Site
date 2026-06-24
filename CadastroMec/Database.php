<?php

class Database {
    public $connection;

    public function __construct() {

        $host = "127.0.0.1";
        $port = "5432";
        $dbname = "futebol";
        $user = "app";
        $password = "secret";

        try {
            $this->connection = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Erro de conexão: " . $e->getMessage());
        }
    }
}