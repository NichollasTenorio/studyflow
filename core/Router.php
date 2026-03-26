<?php
namespace core;
use Exception;
use core\helpers\Request;
use core\helpers\Uri;

class Router
{
    const CONTROLLER_NAMESPACE = "app\\controllers\\";
    
    public static function load(string $controller, string $method)
    {
        $controllerNamespace = self::CONTROLLER_NAMESPACE.$controller;
        if(!class_exists($controllerNamespace)){
            throw new Exception("O controlador {$controller} não existe!");
        }

        $controllerInstance = new $controllerNamespace;

        if(!method_exists($controllerInstance, $method)){
            throw new Exception ("O método {$method} não existe!");
        }

        $controllerInstance->$method();
    }

    public static function routes():array
    {
        return [
            'get' => [
                '/' => fn() => self::load('HomeController','index'),
                '/login' => fn() => self::load('AuthController', 'login')
            ],

            'post' => [
                '/login' => fn() => self::load('AuthController', 'store')
            ]
        ];
    }

    public static function run()
    {
        try
        {
            $routes  = self::routes();
            $request = Request::getMethod();
            $uri     = Uri::getUri('path');

            $basePath = '/routes';
            $uri = str_replace($basePath, '', $uri);

            if(!isset($routes[$request])){
                throw new \Exception('A rota não existe!');
            }

            if(!array_key_exists($uri, $routes[$request])){
                throw new \Exception('A rota não existe!'); 
            }

            $routes = $routes[$request][$uri];

            if(!is_callable($routes)){
                throw new \Exception("A rota {$uri} não é chamável");
            }

            $routes();
            
        }
        catch(\Throwable $th)
        {
            echo 'ERRO: ' . $th->getMessage();
        }
    }
}
