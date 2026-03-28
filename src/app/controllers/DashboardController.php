<?php
namespace app\controllers;

class DashboardController
{
    public function index()
    {
        require_once __DIR__ . "/../views/dashboard.php";
    }
}