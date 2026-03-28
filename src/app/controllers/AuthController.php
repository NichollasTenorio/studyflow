<?php
namespace app\controllers;

use app\models\AuthModel;
use core\services\Validator;

class AuthController
{
    private AuthModel $model;

    public function __construct()
    {
        $this->model = new AuthModel();
    }

    public function signup()
    {
        require_once __DIR__ . "/../views/signup.php";
    }

    public function login()
    {
        require_once __DIR__ . "/../views/login.php";
    }

    public function store()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email    = $_POST['email'];
            $password = $_POST['password'];
        }

        Validator::required($email);
        Validator::required($password);
        Validator::email($email);
        Validator::min($password, 8);

        if($this->model->store($email, $password)){
            header('Location: /teste/login');
            exit;
        }
    }

    public function enter()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email    = $_POST['email'];
            $password = $_POST['password'];
        }

        Validator::required($email);
        Validator::required($password);
        Validator::email($email);

        $user = $this->model->enter($email, $password);

        if($user){
            $_SESSION['user'] = [
                'userID' => $user->getUserID(),
                'userEmail' => $user->getUserEmail(),
                'isLogged' => true
            ];

            header('Location: /teste/dashboard');
            exit;
        }else{
            header('Location: /teste/signup');
            exit;
        }
    }

    public function logout()
    {
        if(!empty($_SESSION['user'])){
            unset($_SESSION['user']);
        }

        session_regenerate_id(true);

        header('Location: /teste/login');
        exit;
    }
}