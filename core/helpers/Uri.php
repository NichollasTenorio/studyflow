<?php
namespace core\helpers;

class Uri
{
    public static function getUri($type):string
    {
        return parse_url($_SERVER['REQUEST_URI'])[$type];
    }
}