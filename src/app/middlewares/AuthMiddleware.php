<?php
namespace app\middlewares;

class AuthMiddleware
{
    public function handle()
    {
        if (empty($_SESSION['user'])) {
            header("Location: /teste/login");
            exit;
        }
    }
}