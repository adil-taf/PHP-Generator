<?php

declare(strict_types=1);

namespace App;

use PDO;

class DB
{
    private PDO $pdo;
    public function __construct()
    {
        $config = [
          'driver' => 'mysql',
          'host' => 'db',
          'database' => 'my_db',
          'user' => 'root',
          'pass' => 'root',
        ];
        $defaultOptions = [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        try {
            $this->pdo = new PDO(
                $config['driver'] . ':host=' . $config['host'] . ';dbname=' . $config['database'],
                $config['user'],
                $config['pass'],
                $defaultOptions
            );
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->pdo,$name], $arguments);
    }
}
