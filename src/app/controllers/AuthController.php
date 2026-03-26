<?php
namespace app\controllers;

class AuthController
{
    public function signup()
    {
        require_once __DIR__ . "/../views/signup.php";
    }

    public function login()
    {
        require_once __DIR__ . "/../views/login.php";
    }
}