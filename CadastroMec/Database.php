<?php

class Database
{
    public $connection;

    public function __construct()
    {
        $envPath = __DIR__ . '/.env';

        if (file_exists($envPath)) {
            $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            foreach ($lines as $line) {
                $line = trim($line);

                if ($line === '' || strpos($line, '#') === 0 || strpos($line, '=') === false) {
                    continue;
                }

                [$name, $value] = explode('=', $line, 2);
                $_ENV[trim($name)] = trim($value);
            }
        }

        $host = $_ENV['DB_HOST'] ?? 'db';
        $port = $_ENV['DB_PORT'] ?? '5432';
        $db = $_ENV['DB_NAME'] ?? 'oficina';
        $user = $_ENV['DB_USER'] ?? 'app';
        $pass = $_ENV['DB_PASS'] ?? 'secret';

        $this->connection = new PDO("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
