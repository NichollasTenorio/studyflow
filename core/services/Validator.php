<?php
namespace core\services;

class Validator
{
    public static function required($field)
    {
        if(empty($field)){
            die("Todos os campos são obrigatório!");
        }
    }

    public static function email($email)
    {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
    }

    public static function min($password, $min = 8)
    {
        if(strlen($password) < $min){
            die("Mínimo de {$min} caráctereres!");
        }
    }
}
