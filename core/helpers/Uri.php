<?php
namespace core\helpers;

class Uri
{
    public static function getUri($type = 'path')
    {
        $uri = parse_url($_SERVER['REQUEST_URI']);
        return $uri[$type] ?? '/';
    }
}