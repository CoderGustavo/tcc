<?php

namespace Source\Controller;

use chillerlan\QRCode\{QRCode, QROptions};
use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Source\Model\Admin;
use Source\Model\Item_mesa;
use Source\Model\Reserva as modelReserva;

class Reserva
{

    public function __construct()
    {
        $this->router = new Router(URL_BASE);
        $this->view = Engine::create(__DIR__."/../../View", "php");
    }

    public function create($data){
        var_dump($data);
        $mesas = new modelReserva();
        $mesas->total = 0;
        $mesas->save();
        return $this->router->redirect("admin/listar/reservas");
    }

    public function update($data){
        session_start();

        $reserva = new modelReserva();
        date_default_timezone_set('America/Sao_Paulo');
        $diaAtual = explode("/", date('d/m/Y'));
        $horaAtual = explode("/", date('H:i'));
        $num_pessoas = $data["numeropessoas"];
        $obs = $data["obs"];
        $usuario = $_SESSION["usuario"];

        $dia = explode("/", $data["data"]);
        $hora = explode(":", $data["hora"]);

        $diasemana = array('Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sabado');
        //0-Domingo //1-Segunda //2-Terça //3-Quarta //4-Quinta //5-Sexta //6-Sabado
        $datam = $dia[2]."/".$dia[1]."/".$dia[0];
        $diasemana_numero = date('w', strtotime($datam));
        // $diasemana[$diasemana_numero] é o nome do dia da semana

        function qtdMesa($numMesa, $numPessoa){
            if($numPessoa <= $numMesa*2+2){
            }else{
                while($numPessoa > $numMesa*2+2){
                    $numMesa +=1;
                }
            }
            return $numMesa;
        }

        if($dia[2] == $diaAtual[2]){
            if($dia[1] == $diaAtual[1]){
                if($dia[0] <= $diaAtual[0]+7 && $dia[0] >= $diaAtual[0]){
                    if($diaAtual[0]+7 <= cal_days_in_month(CAL_GREGORIAN, $diaAtual[1], $diaAtual[2])){
                        if($diasemana_numero == 0 || $diasemana_numero >= 5){
                            if($hora[0] >= 18 && $hora[0] <= 23){
                                if($hora[1]>=0 && $hora[1]<=59){
                                    //Aqui esta no ano atual, mes atual, semana atual, ve se eh final de semana(quando esta aberto), ve o horario se esta correto no horário de abertura.
                                    if($num_pessoas){
                                        $num_mesas = ceil($num_pessoas/4);
                                        $num_mesas = qtdMesa($num_mesas, $num_pessoas);
                                        $mesasLivres = $reserva->find("status=:status","status=livre")->fetch(true);
                                        if($mesasLivres){
                                            $qtdMesaLivre = count($mesasLivres);
                                        }else{
                                            $qtdMesaLivre = 0;
                                        }
                                        if($num_mesas <= $qtdMesaLivre){
                                            // pode realizar a reserva das mesas
                                            $datahora = $data["data"]." ".$data["hora"];
                                            echo "Serão necessários $num_mesas mesas para sua reserva, e possuimos essas mesas livres, entao fizemos a sua reserva!";
                                            if($usuario && $datahora && $num_pessoas){
                                                foreach ($mesasLivres as $key => $mesa) {
                                                    $mesasLivres[$key] = $reserva->findById($mesa->id);
                                                }
                                                echo "<br>Mesas reservadas: ";
                                                for($i=0; $i<$num_mesas; $i++){
                                                    $mesasLivres[$i]->id_usuario = $usuario->id;
                                                    $mesasLivres[$i]->datahora = $datahora;
                                                    $mesasLivres[$i]->status = "Realizada";
                                                    $mesasLivres[$i]->numero_pessoas = $num_pessoas;
                                                    $mesasLivres[$i]->observacao = $obs;
                                                    $mesasLivres[$i]->save();
                                                    echo "N.".$mesasLivres[$i]->id.", ";
                                                }
                                            }else{
                                                echo "Preencha todos os campos obrigatórios!";
                                            }
                                        }else{
                                            if($qtdMesaLivre == 0){
                                                echo "Serão necessários $num_mesas mesas para sua reserva, porém não possuimos nenhuma livre!";
                                            }else{
                                                echo "Serão necessários $num_mesas mesas para sua reserva, porém temos apenas $qtdMesaLivre mesas livres para reservar.";
                                            }
                                        }
                                    }else{
                                        echo "Insira a quantidade de pessoas!";
                                    }
                                }else{
                                    echo "Horário informado incorreto!";
                                }
                            }else{
                                if($hora[0]>=24){
                                    echo "Horario inexistente!";
                                }else{
                                    echo "Estaremos fechados este horario! Abrimos entre as 18hrs e 24hrs";
                                }
                            }
                        }else{
                            echo "Estamos abertos apenas nos finais de semana!";
                        }
                    }else{
                        echo "Data inserida incorreta!";
                    }
                }else{
                    echo "Aceitamos reservas apenas para a semana atual!";
                }
            }else{
                if($dia[1] < $diaAtual[1]){
                    echo "Ainda não aprendemos a voltar no tempo 😀, por favor insira uma data atual!";
                }else if($dia[1] > $diaAtual[1]){
                    echo "Aceitamos reservas apenas para o mês atual!";
                }else{
                    echo "Mês inexistente no calendário!";
                }
            }
        }else{
            if($dia[2] < $diaAtual[2]){
                echo "Ainda não aprendemos a voltar no tempo 😀, por favor insira uma data atual!";
            }else{
                echo "Só aceitamos reservas para o ano atual!";
            }
        }
        
    }

    public function read($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && ($admin->nivel_acesso <= 2 || $admin->nivel_acesso == 4)){
            $reservas = new modelReserva();
            $reservas = $reservas->find()->fetch(true);
            $usuario = $_SESSION["usuario"];
            $status = null;
    
            $options = new QROptions([
                'version' => 5,
                'imageTransparent' => false,
                'imageTransparentBG' => [255.255,255],
            ]);
            $qrcode = new QRCode($options);
            foreach ($reservas as $key => $mesa) {
                $url = URL_BASE."/mesa/$mesa->id";
                $qrcodes[$mesa->id] = $qrcode->render($url);
            }
    
            echo $this->view->render("admin/reservas/listar", ["reservas" => $reservas, "usuario" => $usuario, "status" => $status, "qrcodes" => $qrcodes, "admin" => $admin]);
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function readStatus($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && ($admin->nivel_acesso <= 2 || $admin->nivel_acesso == 4)){
            $reservas = new modelReserva();
            $reservas = $reservas->find("status=:status", "status={$data["status"]}")->fetch(true);
            $usuario = $_SESSION["usuario"];
            if($reservas){
                foreach ($reservas as $key => $reserva) {
                    $reserva->nome = $_SESSION["usuario"]->nome;
                    $reserva->telefone = $_SESSION["usuario"]->telefone;
                }
            }
            $status = $data["status"];
    
            $options = new QROptions([
                'version' => 5,
                'imageTransparent' => false,
                'imageTransparentBG' => [255.255,255],
            ]);
            $qrcode = new QRCode($options);
            foreach ($reservas as $key => $mesa) {
                $url = URL_BASE."/mesa/$mesa->id";
                $qrcodes[$mesa->id] = $qrcode->render($url);
            }
            
            echo $this->view->render("admin/reservas/listar", ["reservas" => $reservas, "usuario" => $usuario, "status" => $status, "qrcodes" => $qrcodes, "admin" => $admin]);
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function adicionar($data){
        session_start();
        $idmesa = $data["numero"];
        $id = $data["id"];
        $nome = $data["nome"];
        $qtd = $data["qtd"];
        $obs = $data["obs"];
        $status = "escolha";

        $mesa = new modelReserva();
        $itens_mesa = new Item_mesa();

        if($id && $nome && $obs){
            $pedidoMesa = $mesa->find("id=:id","id={$idmesa}")->fetch();
            $itens_pedidoMesa = $itens_mesa->find("id_mesa = :idmesa AND id_cardapio=:idcardapio AND obs =:obs AND status = :status", "idmesa=$pedidoMesa->id&idcardapio=$id&obs=$obs&status=$status")->fetch();
            if($itens_pedidoMesa){
                $itens_pedidoMesa->qtd = $itens_pedidoMesa->qtd+$qtd;
                $itens_pedidoMesa->save();
            }else{
                $itens_mesa->id_mesa = $pedidoMesa->id;
                $itens_mesa->id_cardapio = $id;
                $itens_mesa->qtd = $qtd;
                $itens_mesa->obs = $obs;
                $itens_mesa->status = $status;
                $itens_mesa->save();
            }
        }

        return $this->router->redirect("mesa/$idmesa");
    }

    public function adicionarAguardo($data){
        session_start();
        $idmesa = $data["numero"];
        $status = "escolha";

        $mesa = new modelReserva();
        $itens_mesa = new Item_mesa();

        if($idmesa){
            $pedidoMesa = $mesa->find("id=:id","id={$idmesa}")->fetch();
            $itens_pedidoMesa = $itens_mesa->find("id_mesa = :idmesa AND status = :status", "idmesa=$pedidoMesa->id&status=$status")->fetch(true);
            if($itens_pedidoMesa){
                foreach ($itens_pedidoMesa as $key => $value) {
                    $value->status = "aguardo";
                    $value->save();
                }
            }
        }

        return $this->router->redirect("mesa/$idmesa");
    }


    public function destroyItem($data){
        session_start();
        $id = $data["id"];
        $idmesa = $data["numero"];
        $itens_mesa = new Item_mesa();
        if($id){
            $itens_mesa = $itens_mesa->findById($id);
            $itens_mesa->destroy();
        }
        return $this->router->redirect("mesa/$idmesa");
    }

    public function reservar($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso <= 2){
            $id = $data["id"];
            $numeropessoas = $data["numeropessoas"];
            $reservas = new modelReserva();
            $status = $data["status"];
            $datahora = date('d/m/Y H:i');
            if($id && $numeropessoas){
                $reserva = $reservas->findById($id);
                if($reserva->status == "Livre"){
                    $reserva->status = "Realizada";
                    $reserva->numero_pessoas = $numeropessoas;
                    $reserva->nome = "Local";
                    $reserva->datahora = $datahora;
                    $reserva->save();
                    if($reserva->fail()){
                        $_SESSION["erro"] = $reserva->fail()->getMessage();
                    }else{
                        $_SESSION["sucesso"] = "Mesa reservada com sucesso!";
                    }
                }else{
                    $_SESSION["erro"] = "Esta mesa não esta livre!";
                }
            }else{
                $_SESSION["erro"] = "Id informado incorreto!";
            }
            switch ($status) {
                case 'Livre':
                    return $this->router->redirect("admin/listar/reservas/Livre");
                break;
    
                case 'Realizada':
                    return $this->router->redirect("admin/listar/reservas/Realizada");
                break;
                
                case 'Utilizada':
                    return $this->router->redirect("admin/listar/reservas/Feita");
                break;
                
                default:
                    return $this->router->redirect("admin/listar/reservas");
                break;
            }
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function ocupar($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso <= 2){
            $id = $data["id"];
            $reservas = new modelReserva();
            $status = $data["status"];
            $datahora = date('d/m/Y H:i');
            $senha = rand(1, 9999);
            if($id){
                $reserva = $reservas->findById($id);
                $reserva->status = "Utilizada";
                $reserva->nome = "Local";
                $reserva->datahora = $datahora;
                $reserva->senha = $senha;
                $reserva->save();
                if($reserva->fail()){
                    $_SESSION["erro"] = $reserva->fail()->getMessage();
                }else{
                    $_SESSION["sucesso"] = "A mesa $id foi ocupada!";
                    $_SESSION["senha"] = $senha;
                }
            }else{
                $_SESSION["erro"] = "Id informado incorreto!";
            }
            switch ($status) {
                case 'Livre':
                    return $this->router->redirect("admin/listar/reservas/Livre");
                break;
    
                case 'Realizada':
                    return $this->router->redirect("admin/listar/reservas/Realizada");
                break;
                
                case 'Utilizada':
                    return $this->router->redirect("admin/listar/reservas/Feita");
                break;
                
                default:
                    return $this->router->redirect("admin/listar/reservas");
                break;
            }
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function verificarSenha($data){
        session_cache_expire(1);
        session_start();
        $id = $data["id"];
        $senha = $data["senha"];
        $mesas = new modelReserva();
        $mesa = $mesas->findById($id);
        if($mesa->senha == $senha){
            $_SESSION["acesso_liberado$mesa->id"] = 1;
            $_SESSION["valor"] = $senha;
        }else{
            $_SESSION["erro"] = "Senha incorreta!";
            $_SESSION["valor"] = $senha;
        }
        return $this->router->redirect("mesa/$id");
    }

    public function livrar($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso <= 2){
            $id = $data["id"];
            $reservas = new modelReserva();
            $status = $data["status"];
            if($id){
                $reserva = $reservas->findById($id);
                $reserva->status = "Livre";
                $reserva->numero_pessoas = null;
                $reserva->id_usuario = null;
                $reserva->nome = " ";
                $reserva->datahora = " ";
                $reserva->observacao = " ";
                $reserva->save();
                if($reserva->fail()){
                    $_SESSION["erro"] = $reserva->fail()->getMessage();
                }else{
                    $_SESSION["sucesso"] = "A mesa $id foi desocupada!";
                }
            }else{
                $_SESSION["erro"] = "Id informado incorreto!";
            }
            switch ($status) {
                case 'Livre':
                    return $this->router->redirect("admin/listar/reservas/Livre");
                break;
    
                case 'Realizada':
                    return $this->router->redirect("admin/listar/reservas/Realizada");
                break;
                
                case 'Utilizada':
                    return $this->router->redirect("admin/listar/reservas/Utilizada");
                break;
                
                default:
                    return $this->router->redirect("admin/listar/reservas");
                break;
            }
        }else{
            return $this->router->redirect("naologado");
        }
    }

    public function destroy($data){
        $idmesa = $data["idmesa"];
        $mesas = new modelReserva();
        $mesa = $mesas->findById($idmesa);
        $mesa->destroy();
        return $this->router->redirect("admin/listar/reservas");
    }
}
