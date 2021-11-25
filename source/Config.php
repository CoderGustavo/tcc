<?php

define("URL_BASE", "http://localhost/tcc");

define("PUBLIC_KEY_MP", "TEST-093bef75-aeb7-4925-a272-316316ca6aa6");

define("PRIVATE_TOKEN_MP", "TEST-7097660880917671-022323-3679249aa11bfef7b56e240708921cc3__LD_LA__-231232494");

define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "lanchonete2",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

function url($uri = null): string
{
    if($uri){
        return URL_BASE."/{$uri}";
    }
    
    return URL_BASE;
}