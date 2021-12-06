<?php

namespace Source\Controller;

use CoffeeCode\DataLayer\Connect;
use CoffeeCode\Router\Router;
use League\Plates\Engine;
use MercadoPago\SDK as SDK;
use MercadoPago\Payment as Payment;
use MercadoPago\Payer as Payer;
use Source\Model\Endereco;
use Source\Model\Pedido;

class Pagamento
{
    private $view;

    public function __construct()
    {
        $this->router = new Router(URL_BASE);
        $this->view = Engine::create(__DIR__."/../../View", "php");
    }

    public function pagarCredito($data){
        require_once 'vendor/autoload.php';

        session_start();
        
        if(isset($_SESSION["usuario"])){
            $conn = Connect::getInstance();
            $error = Connect::getError();

            $pedido = new Pedido();

            $usuario = 0;
            $status = "sacola";
            $endereco = null;
            $somaprecos = 0;


            $logado = 1;
            $usuario = $_SESSION["usuario"];

            $pedidoMesa = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();

            $enderecos = new Endereco();
            if($pedidoMesa){
                $endereco = $enderecos->findById($pedidoMesa->id_endereco);
                if($endereco){
                    $pedidoMesa = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();
                    
                    $stmt = $conn->prepare("SELECT cardapio.nome,cardapio.preco,itens_pedido.obs,itens_pedido.qtd FROM itens_pedido INNER JOIN cardapio ON itens_pedido.id_cardapio=cardapio.id INNER JOIN pedidos ON itens_pedido.id_pedido=pedidos.id WHERE pedidos.id = :id");
                    $stmt->bindValue(":id", $pedidoMesa->id);
                    $stmt->execute();
                    $pedido = $stmt->fetchAll();

                    if($pedido){
                        foreach($pedido as $key => $ped){
                            $somaprecos = $somaprecos+($ped->preco*$ped->qtd);
                        }
                       
                        SDK::setAccessToken(PRIVATE_TOKEN_MP);

                        $payment = new Payment();
                        $payment->transaction_amount = $somaprecos;
                        $payment->token = $data['MPHiddenInputToken'];
                        $payment->description = "Pedido nºX";
                        $payment->installments = (int)$data['installments'];
                        $payment->payment_method_id = $data['MPHiddenInputPaymentMethod'];
                        $payment->issuer_id = (int)$data['MPHiddenInputPaymentMethod'];

                        $payer = new Payer();
                        $payer->email = $usuario->email;
                        $payer->identification = array(
                            "type" => "CPF",
                            "number" => $data['identificationNumber']
                        );
                        $payment->payer = $payer;

                        $payment->save();

                        $response = array(
                            'status' => $payment->status,
                            'status_detail' => $payment->status_detail,
                            'id' => $payment->id
                        );

                        $pedidoMesa->id_pagamento = $payment->id;
                        $pedidoMesa->total = $somaprecos;
                        $pedidoMesa->save();

                        
                        if($response["status"] == "approved"){
                            $pedidoMesa->status = "Aguardo";
                            $pedidoMesa->save();
                            return $this->router->redirect("checkout/pagamento/aprovado/$pedidoMesa->id");
                        }else if($response["status"] == "rejected"){
                            $pedidoMesa->status = "Cancelado";
                            $pedidoMesa->save();
                            return $this->router->redirect("checkout/pagamento/cancelado/$pedidoMesa->id");
                        }

                    }

                }else{
                    $_SESSION["erro"] = "Selecione um endereço";
                    return $this->router->redirect("checkout/endereco");
                }

            }else{
                return $this->router->redirect("delivery");
            }

            
        }else{
            return $this->router->redirect(" ");
        }
    }

    public function pagarPix($data){
        require_once 'vendor/autoload.php';

        session_start();
        
        if(isset($_SESSION["usuario"])){
            $usuario = $_SESSION["usuario"];
            $cpf = $data["cpf"];
            if($cpf){
                $conn = Connect::getInstance();
                $error = Connect::getError();
    
                $pedido = new Pedido();
                $status = "sacola";
                $endereco = null;
                $somaprecos = 0;
    
    
                $logado = 1;
    
                $pedidoMesa = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();
    
                $enderecos = new Endereco();
                if($pedidoMesa){
                    $endereco = $enderecos->findById($pedidoMesa->id_endereco);
                    if($endereco){
                        $pedidoMesa = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();
                        
                        $stmt = $conn->prepare("SELECT cardapio.nome,cardapio.preco,itens_pedido.obs,itens_pedido.qtd FROM itens_pedido INNER JOIN cardapio ON itens_pedido.id_cardapio=cardapio.id INNER JOIN pedidos ON itens_pedido.id_pedido=pedidos.id WHERE pedidos.id = :id");
                        $stmt->bindValue(":id", $pedidoMesa->id);
                        $stmt->execute();
                        $pedido = $stmt->fetchAll();
    
                        if($pedido){
                            foreach($pedido as $key => $ped){
                                $somaprecos = $somaprecos+($ped->preco*$ped->qtd);
                            }
                            $first_name = explode(" ", $usuario->nome)[0];
                            $last_name = explode(" ", $usuario->nome)[count(explode(" ", $usuario->nome)) - 1];
                    
                            SDK::setAccessToken(PRIVATE_TOKEN_MP);
                           
                            $payment = new Payment();
                            $payment->transaction_amount = $somaprecos;
                            $payment->description = "Pedido nºX";
                            $payment->payment_method_id = "pix";
                            $payment->payer = array(
                                "email" => $usuario->email,
                                "first_name" => $first_name,
                                "last_name" => $last_name,
                                "identification" => array(
                                    "type" => "CPF",
                                    "number" => $cpf
                                 )
                              );
                           
                            $payment->save();
                    
                            $response = array(
                                'status' => $payment->status,
                                'status_detail' => $payment->status_detail,
                                'id' => $payment->id,
                                'pixcode' => $payment->point_of_interaction->transaction_data->qr_code,
                                'qrcode' => $payment->point_of_interaction->transaction_data->qr_code_base64
                            );

                            if($response["id"] != NULL){
                                $pedidoMesa->id_pagamento = $response["id"];
                                $pedidoMesa->save();
                            }      
                            
                            var_dump($payment);

                            // echo $this->view->render("pagamento", [
                            //     "logado" => $logado,
                            //     "usuario" => $usuario,
                            //     "pedido" => $pedido,
                            //     "idpedido" => $pedidoMesa->id,
                            //     "endereco" => $endereco,
                            //     "soma" => $somaprecos,
                            //     "response" => $response
                            // ]);
                        }
    
                    }else{
                        $_SESSION["erro"] = "Selecione um endereço";
                        return $this->router->redirect("checkout/endereco");
                    }
    
    
    
                }else{
                    return $this->router->redirect("delivery");
                }
            }else{
                $_SESSION["erro"] = "Selecione o endereo novamente e lembre-se de informar seu cpf!";
                return $this->router->redirect("checkout/endereco");
            }
        }else{
            return $this->router->redirect(" ");
        }
    }

    public function pagarBalcao($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        if(isset($usuario)){
            $pedidos = new Pedido();
            $status = "sacola";
            $pedido = $pedidos->find("id_usuario = :uid AND status = :st", "uid={$usuario->id}&st={$status}")->fetch();
            $pedido->entrega = "Retirada";
            $pedido->forma_pagamento = "Balcao";
            $pedido->status = "Aguardo";
            $pedido->save();
            if($pedido->fail()){
                echo $pedido->fail()->getMessage();
            }else{
                $this->router->redirect("conta/meuspedidos");
            }
        }else{
            $this->router->redirect("login");
        }
    }

    public function pagarEntrega($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        if(isset($usuario)){
            $pedidos = new Pedido();
            $status = "sacola";
            $pedido = $pedidos->find("id_usuario = :uid AND status = :st", "uid={$usuario->id}&st={$status}")->fetch();
            $pedido->entrega = "Entrega";
            $pedido->forma_pagamento = "dinheiro";
            $pedido->status = "Aguardo";
            $pedido->save();
            if($pedido->fail()){
                echo $pedido->fail()->getMessage();
            }else{
                $this->router->redirect("conta/meuspedidos");
            }
        }else{
            $this->router->redirect("login");
        }
    }

    public function checkPagamento($data){
        require_once 'vendor/autoload.php';

        session_start();
        if(isset($_SESSION["usuario"])){
            $usuario = $_SESSION["usuario"];
            $pedido = new Pedido();
            $status = "sacola";

            $pedido = $pedido->find("id_usuario=:uid AND status=:status","uid=$usuario->id&status=$status")->fetch();

            if($pedido){
                SDK::setAccessToken(PRIVATE_TOKEN_MP);
                $payment = Payment::find_by_id($pedido->id_pagamento);
                $payment->capture = true;
                $payment->update();
                echo $payment->status;
                if($payment->status == "approved"){
                    $pedido->status = "Aguardo";
                    $pedido->save();
                }
            }else{
                return $this->router->redirect("delivery");
            }
        }else{
            return $this->router->redirect(" ");
        }
    }

    public function aprovado($data){
        session_start();
        $usuario = 0;
        $admin = 0;
        $logado = 0;
        if(isset($_SESSION["usuario"])){
            $id = $data["idpedido"];
            $logado = 1;
            $usuario = $_SESSION["usuario"];
            if(isset($usuario->admin)){
                $admin = 1;
            }
            echo $this->view->render("pagamentoAprovado", [
                "logado" => $logado,
                "usuario" => $usuario,
                "admin" => $admin,
                "idpedido" => $id
            ]);
        }else{
            return $this->router->redirect(" ");
        }

    }

    public function cancelado($data){
        session_start();
        $usuario = 0;
        $admin = 0;
        $logado = 0;
        if(isset($_SESSION["usuario"])){
            $id = $data["idpedido"];
            $logado = 1;
            $usuario = $_SESSION["usuario"];
            if(isset($usuario->admin)){
                $admin = 1;
            }
            echo $this->view->render("pagamentoCancelado", [
                "logado" => $logado,
                "usuario" => $usuario,
                "admin" => $admin,
                "idpedido" => $id
            ]);
        }else{
            return $this->router->redirect(" ");
        }

    }
}
