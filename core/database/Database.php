<?php
namespace core\database;

class Database
{
    public static function run()
    {
        $dsn = [
            'host'    => 'localhost',
            'user'    => 'root',
            'pass'    => '',
            'dbname'  => 'studyflow',
            'charset' => 'utf8mb4'
        ];

        try
        {
            return $pdo = new \PDO("mysql:host={$dsn['host']};dbname={$dsn['dbname']};charset={$dsn['charset']};", $dsn['user'], $dsn['pass']);
        }catch(\PDOException $e)
        {
            echo 'ERRO: ' . $e->getMessage();
        }
    }
}