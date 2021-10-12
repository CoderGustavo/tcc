<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->namespace("Source\Controller");

$router->group(null);

$router->get("/teste", "Web:teste");

$router->get("/", "Web:home");
$router->get("/login", "Web:login");
$router->get("/cadastro", "Web:register");

$router->post("/acessar", "Usuario:login");
$router->post("/cadastrar", "Usuario:create");
$router->get("/sair", "Usuario:logout");

$router->group("/salvar");
$router->post("/reserva", "Reserva:create");
$router->post("/avaliacao", "Avaliacao:create");



$router->group("/admin");
$router->get("/", "Admin:home");


$router->get("/listar/clientes", "Usuario:read");
$router->get("/listar/admins", "Admin:read");
$router->get("/listar/reservas", "Reserva:read");
$router->get("/listar/reservas/{status}", "Reserva:readStatus");
$router->get("/listar/avaliacoes", "Avaliacao:read");
$router->get("/listar/avaliacoes/{status}", "Avaliacao:readStatus");
$router->get("/listar/pedidos", "Pedido:read");
$router->get("/listar/pedidos/{status}", "Pedido:readStatus");
$router->get("/listar/cardapio", "Cardapio:read");

$router->get("/cadastrar/cliente", "Usuario:add");
$router->get("/cadastrar/admin", "Admin:add");
$router->get("/cadastrar/cardapio", "Cardapio:add");



$router->group("/ooops");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()){
    $router->redirect("/ooops/{$router->error()}");
}
