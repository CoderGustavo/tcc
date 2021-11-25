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
        return $this->router->redirect("/teste");
        require_once 'vendor/autoload.php';

        SDK::setAccessToken(PRIVATE_TOKEN_MP);

        $payment = new Payment();
        $payment->transaction_amount = (float)$data['transactionAmount'];
        $payment->token = $data['token'];
        $payment->description = $data['description'];
        $payment->installments = (int)$data['installments'];
        $payment->payment_method_id = $data['paymentMethodId'];
        $payment->issuer_id = (int)$data['issuer'];

        $payer = new Payer();
        $payer->email = $data['email'];
        $payer->identification = array(
            "type" => $data['docType'],
            "number" => $data['docNumber']
        );
        $payment->payer = $payer;

        $payment->save();

        $response = array(
            'status' => $payment->status,
            'status_detail' => $payment->status_detail,
            'id' => $payment->id
        );
    }

    public function pagarPix($data){
        require_once 'vendor/autoload.php';

        session_start();
        
        if(isset($_SESSION["usuario"])){
            $usuario = $_SESSION["usuario"];
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
                        $first_name = explode(" ", $usuario->nome)[0];
                        $last_name = explode(" ", $usuario->nome)[count(explode(" ", $usuario->nome)) - 1];
                
                        SDK::setAccessToken(PRIVATE_TOKEN_MP);
                       
                        $payment = new Payment();
                        $payment->transaction_amount = $somaprecos;
                        $payment->description = "Título do produto";
                        $payment->payment_method_id = "pix";
                        $payment->payer = array(
                            "email" => $usuario->email,
                            "first_name" => $first_name,
                            "last_name" => $last_name,
                            "identification" => array(
                                "type" => "CPF",
                                "number" => "04176269677"
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
                    }

                }else{
                    $_SESSION["erro"] = "Selecione um endereço";
                    return $this->router->redirect("checkout/endereco");
                }



            }else{
                return $this->router->redirect("delivery");
            }

            

            echo $this->view->render("pagamento", [
                "logado" => $logado,
                "usuario" => $usuario,
                "pedido" => $pedido,
                "endereco" => $endereco,
                "soma" => $somaprecos,
                "response" => $response
            ]);
        }else{
            return $this->router->redirect(" ");
        }
    }
}
