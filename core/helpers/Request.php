<?php
namespace core\helpers;

class Request
{
    public static function getMethod():string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}