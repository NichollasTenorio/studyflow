<?php
namespace core\helpers;

class Request
{
    public static function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}