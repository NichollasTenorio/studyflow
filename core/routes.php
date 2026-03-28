<?php

use core\Route;
use app\middlewares\AuthMiddleware;

Route::get('/', 'HomeController@index');

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@enter');

Route::get('/signup', 'AuthController@signup');
Route::post('/signup', 'AuthController@store');

// rota protegida por middleware
Route::get('/logout',  'AuthController@logout', [AuthMiddleware::class]);
Route::get('/dashboard', 'DashboardController@index', [AuthMiddleware::class]);