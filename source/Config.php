<?php

define("URL_BASE", "http://localhost/tcc");

define("PUBLIC_KEY_MP", "TEST-125cbe39-df33-4469-893e-50877df0061d");

define("PRIVATE_TOKEN_MP", "TEST-86727251271039-120523-5a98db143751c65c852a8f0ecd8ca2a8-231232494");

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