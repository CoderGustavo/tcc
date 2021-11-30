<?php

require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->namespace("Source\Controller");

$router->group(null);

$router->get("/teste", "Web:teste");

$router->get("/", "Web:home");
$router->get("/eng", "Web:english");
$router->get("/pt", "Web:portuguese");
$router->get("/login", "Web:login");
$router->get("/cadastro", "Web:register");
$router->get("/naologado", "Web:naologado");

$router->post("/acessar", "Usuario:login");
$router->post("/cadastrar", "Usuario:create");
$router->get("/sair", "Usuario:logout");
$router->get("/teste", "Web:teste");

$router->get("/cardapio", "Web:cardapio");
$router->get("/delivery", "Web:delivery");
$router->get("/delivery/excluir/{id}", "Pedido:destroyItem");
$router->post("/delivery/adicionar", "Pedido:adicionar");
$router->get("/mesa/{numero}", "Web:mesalocal");
$router->get("/mesa/{numero}/{senha}", "Web:mesalocal");
$router->get("/mesa/{numero}/excluir/{id}", "Reserva:destroyItem");
$router->post("/mesa/{numero}/adicionar", "Reserva:adicionar");
$router->get("/mesa/{numero}/preparar", "Reserva:adicionarAguardo");
$router->post("/mesa/verificar", "Reserva:verificarSenha");

$router->group("/checkout"); //grupo checkout
$router->get("/endereco", "Web:endereco");
$router->post("/pagamento", "Web:pagamento");
$router->post("/pagamento/pix", "Pagamento:pagarPix");
$router->post("/pagamento/credito", "Pagamento:pagarCredito");
$router->post("/pagamento/balcao", "Pagamento:pagarBalcao");
$router->post("/pagamento/entrega", "Pagamento:pagarEntrega");
$router->post("/pagamento/checkPagamento", "Pagamento:checkPagamento");
$router->get("/pagamento/aprovado/{idpedido}", "Pagamento:aprovado");
$router->get("/pagamento/cancelado/{idpedido}", "Pagamento:cancelado");

$router->group("/salvar"); //grupo salvar
$router->post("/reserva", "Reserva:update");
$router->post("/avaliacao", "Avaliacao:create");

$router->group("/conta"); //grupo conta
$router->get("/minhaconta", "Usuario:myAccount");
$router->post("/atualizar", "Usuario:update");
$router->get("/meuspedidos", "Usuario:myOrders");
$router->get("/meuspedidos/{idpedido}", "Usuario:showOrder");
$router->get("/minhasreservas", "Usuario:myBooks");
$router->get("/minhasreservas/{idreserva}", "Usuario:showBook");

$router->group("/admin"); //grupo admin
$router->get("/", "Admin:home");

$router->get("/listar/clientes", "Usuario:read");
$router->post("/deletar/clientes", "Usuario:delete");
$router->post("/transformar/clientes/admins", "Usuario:transformarAdmin");
$router->get("/cadastrar/cliente", "Usuario:add");
$router->post("/cadastrar/cliente/cadastrar", "Usuario:createClient");

$router->get("/listar/admins", "Admin:read");
$router->post("/deletar/admins", "Admin:delete");
$router->get("/cadastrar/admin", "Admin:add");
$router->post("/cadastrar/admin/cadastrar", "Admin:create");

$router->get("/criar/mesa", "Reserva:create");
$router->get("/deletar/mesa/{idmesa}", "Reserva:destroy");
$router->get("/listar/reservas", "Reserva:read");
$router->get("/listar/reservas/{status}", "Reserva:readStatus");
$router->post("/reserva/reservar/", "Reserva:reservar");
$router->get("/reserva/ocupar/{id}", "Reserva:ocupar");
$router->get("/reserva/ocupar/{id}/{status}", "Reserva:ocupar");
$router->get("/reserva/livrar/{id}", "Reserva:livrar");
$router->get("/reserva/livrar/{id}/{status}", "Reserva:livrar");

$router->get("/listar/avaliacoes", "Avaliacao:read");
$router->get("/listar/avaliacoes/{status}", "Avaliacao:readStatus");
$router->get("/avaliacao/aprovar/{id}/", "Avaliacao:aprovar");
$router->get("/avaliacao/aprovar/{id}/{status}", "Avaliacao:aprovar");
$router->get("/avaliacao/apagar/{id}/", "Avaliacao:destroy");
$router->get("/avaliacao/apagar/{id}/{status}", "Avaliacao:destroy");

$router->get("/listar/pedidos", "Pedido:read");
$router->get("/listar/pedidos/{status}", "Pedido:readStatus");
$router->get("/pedido/atualizar/{id}/", "Pedido:update");
$router->get("/pedido/atualizar/{id}/{status}", "Pedido:update");
$router->get("/pedido/editar/{id}", "Pedido:edit");
$router->get("/pedido/editar/{id}/{status}", "Pedido:edit");
$router->get("/pedido/informacoes/{id}", "Pedido:show");
$router->get("/pedido/informacoes/{id}/{status}", "Pedido:show");

$router->get("/listar/cardapio", "Cardapio:read");
$router->get("/cadastrar/cardapio", "Cardapio:add");
$router->post("/cadastrar/cardapio/cadastrar", "Cardapio:create");
$router->get("/ver/cardapio/{id}", "Cardapio:show");
$router->get("/edit/cardapio/{id}", "Cardapio:showEdit");
$router->post("/editar/cardapio", "Cardapio:edit");
$router->post("/deletar/cardapio", "Cardapio:delete");

$router->get("/listar/categorias", "Categoria:read");
$router->get("/cadastrar/categoria", "Categoria:add");
$router->post("/cadastrar/categoria/cadastrar", "Categoria:create");
$router->get("/edit/categoria/{id}", "Categoria:showEdit");
$router->post("/editar/categoria", "Categoria:edit");
$router->post("/deletar/categoria", "Categoria:delete");

$router->get("/listar/ingredientes", "Ingrediente:read");
$router->get("/cadastrar/ingrediente", "Ingrediente:add");
$router->post("/cadastrar/ingrediente/cadastrar", "Ingrediente:create");
$router->get("/edit/ingrediente/{id}", "Ingrediente:show");
$router->post("/editar/ingrediente", "Ingrediente:edit");
$router->post("/deletar/ingredientes", "Ingrediente:delete");

$router->get("/teste", "Web:teste");



$router->group("/ooops");
$router->get("/{errcode}", "Web:error");

$router->dispatch();

if($router->error()){
    $router->redirect("/ooops/{$router->error()}");
}
