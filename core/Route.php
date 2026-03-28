<?php
namespace core;

class Route
{
    private static array $routes = [];

    private static function add(string $method, string $uri, string $action, array $middlewares = [])
    {
        // transforma /user/{id} → regex: ^/user/([^/]+)$
        $pattern = preg_replace('/\{([^\/]+)\}/', '([^/]+)', $uri);
        $pattern = "#^{$pattern}$#";

        self::$routes[$method][$uri] = [
            'uri'         => $uri,
            'pattern'     => $pattern,
            'action'      => $action,
            'middlewares' => $middlewares
        ];
    }

    public static function get(string $uri, string $action, array $middlewares = [])
    {
        self::add('get', $uri, $action, $middlewares);
    }

    public static function post(string $uri, string $action, array $middlewares = [])
    {
        self::add('post', $uri, $action, $middlewares);
    }

    public static function all(): array
    {
        return self::$routes;
    }
}