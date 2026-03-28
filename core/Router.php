<?php
namespace core;

use Exception;
use core\helpers\Request;
use core\helpers\Uri;

class Router
{
    public static function run()
    {
        try {
            $routes = Route::all();
            $method = Request::getMethod();
            $uri    = Uri::getUri('path');

            // ajuste caso use /teste como base
            $basePath = '/teste';
            $uri = str_replace($basePath, '', $uri);

            if (!isset($routes[$method])) {
                throw new Exception("Método HTTP {$method} não encontrado.");
            }

            $matchedRoute = null;
            $params = [];

            // procurar rota exata ou com parâmetro
            foreach ($routes[$method] as $route) {
                if (preg_match($route['pattern'], $uri, $matches)) {
                    array_shift($matches); // remove URL inteira
                    $params = $matches;
                    $matchedRoute = $route;
                    break;
                }
            }

            if (!$matchedRoute) {
                throw new Exception("Rota não encontrada: {$uri}");
            }

            // executar middlewares
            foreach ($matchedRoute['middlewares'] as $middleware) {
                (new $middleware)->handle();
            }

            self::executeAction($matchedRoute['action'], $params);

        } catch (\Throwable $th) {
            echo "ERRO: " . $th->getMessage();
        }
    }

    private static function executeAction(string $action, array $params = [])
    {
        list($controller, $method) = explode('@', $action);

        $controller = "app\\controllers\\{$controller}";

        if (!class_exists($controller)) {
            throw new Exception("Controller {$controller} não existe.");
        }

        $instance = new $controller;

        if (!method_exists($instance, $method)) {
            throw new Exception("Método {$method} não existe em {$controller}.");
        }

        // executa com parâmetros da rota
        $instance->$method(...$params);
    }
}