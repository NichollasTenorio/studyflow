<?php

use core\Route;
use app\middlewares\AuthMiddleware;

Route::get('/', 'HomeController@index');

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@enter');

Route::get('/signup', 'AuthController@signup');
Route::post('/signup', 'AuthController@store');
Route::post('/storeNote', 'DashboardController@store');

// rotas protegidas por middleware
Route::get('/logout',  'AuthController@logout', [AuthMiddleware::class]);
Route::get('/dashboard', 'DashboardController@index', [AuthMiddleware::class]);
Route::post('/completeNote/{id}', 'DashboardController@completeNote', [AuthMiddleware::class]);
Route::post('/revertNote/{id}', 'DashboardController@revertNote', [AuthMiddleware::class]);
Route::post('/deleteNote/{id}', 'DashboardController@deleteNote', [AuthMiddleware::class]);