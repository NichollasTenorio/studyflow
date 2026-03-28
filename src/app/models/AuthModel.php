<?php

namespace app\models;

use app\entities\UserEntity;
use core\database\Database;

class AuthModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::run();
    }

    public function store(string $email, string $password): bool
    {
        try {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->db->prepare(
                "INSERT INTO users (userEmail, userPassword) VALUES (:email, :password)"
            );

            return $stmt->execute([
                ':email' => $email,
                ':password' => $hashed_password
            ]);
        } catch (\Exception $e) {
            die('ERRO: ' . $e->getMessage());
        }
    }

    public function enter(string $email, string $password)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM users WHERE userEmail = :email"
        );

        $stmt->execute([
            ':email' => $email
        ]);

        $user = $stmt->fetch();

        if (!$user) {
            return false;
        }

        $verified_password = password_verify($password, $user['userPassword']);

        if (!$verified_password) {
            return false;
        }

        return new UserEntity($user['ID_user'], $user['userEmail']);
    }
}
