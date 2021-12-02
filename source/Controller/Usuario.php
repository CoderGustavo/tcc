<?php

namespace Source\Controller;

use CoffeeCode\DataLayer\Connect;
use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Source\Model\Admin;
use Source\Model\Pedido;
use Source\Model\Reserva;
use Source\Model\Usuario as modelUsuario;

class Usuario
{

    public function __construct()
    {
        $this->router = new Router(URL_BASE);
        $this->view = Engine::create(__DIR__."/../../View", "php");
    }

    public function login($data){
        session_start();

        $email = strtolower($data["email"]);
        $senha = $data["senha"];
        $senha = sha1(md5(sha1($senha)));

        $usuario = new modelUsuario();
        $admin = new Admin();
        $usuario = $usuario->find("email = :email AND senha = :senha", "email=$email&senha=$senha")->fetch(true);

        
        if(isset($usuario)){
            foreach ($usuario as $key => $value) {
                $usuario = $value;
            }
            $admin = $admin->find("id_usuario=:iduser", "iduser={$usuario->id}")->fetch(true);
            $usuario->admin = $admin;
            $_SESSION["usuario"] = $usuario;
            return $this->router->redirect('/');
        }else{
            $_SESSION["erro"] = "Algumas de suas credenciais estão incorretas!";
            $_SESSION["valores"] = $data;
            return $this->router->redirect('/login');
        }
    }

    public function create($data){
        session_start();
        $usuario = new modelUsuario();

        $nome = strtolower($data["nome"]);
        if(strstr($data["email"], "@") != false){
            if(count(explode("@",$data["email"])) == 2){
                if(strlen(explode("@",$data["email"])[0]) >= 3 && strlen(explode("@", $data["email"])[1]) >= 3 ){
                    $email = strtolower($data["email"]);
                }else{
                    $_SESSION["valores"] = $data;
                    $_SESSION["erro"] = "Insira um e-mail corretooo!";
                    $this->router->redirect("cadastro");
                }
            }else{
                $_SESSION["erro"] = "Insira um e-mail correto!";
                $_SESSION["valores"] = $data;
                $this->router->redirect("cadastro");
            }
        }else{
            $_SESSION["erro"] = "Você deve inserir um e-mail!";
            $this->router->redirect("cadastro");
        }
        $telefone = $data["telefone"];
        $senha = $data["senha"];
        $confirmasenha = $data["confirmasenha"];
        $senha = sha1(md5(sha1($senha)));
        $confirmasenha = sha1(md5(sha1($confirmasenha)));
        $usuariosCadastrados = $usuario->find()->fetch(true);
        $emailexiste = 0;
        $telefoneexiste = 0;
        foreach ($usuariosCadastrados as $key => $value) {
            if($value->email == $email){
                $emailexiste = 1;
            }
            if($value->telefone == $telefone){
                $telefoneexiste = 1;
            }
        }
        if($nome && $email && $telefone && $senha && $confirmasenha){
            if($emailexiste == 0 && $telefoneexiste == 0){
                if($senha == $confirmasenha){
                    $usuario->nome = $nome;
                    $usuario->email = $email;
                    $usuario->telefone = $telefone;
                    $usuario->senha = $senha;
                    $userId = $usuario->save();
                    $_SESSION["valores"] = $data;
                    $_SESSION["sucesso"] = "Você acaba de se cadastrar com sucesso!";
                    $this->router->redirect("login");
                }else{
                    $_SESSION["valores"] = $data;
                    $_SESSION["erro"] = "As senhas não se correspondem!";
                    $this->router->redirect("cadastro",);
                }
            }else{
                if($emailexiste == 1 && $telefoneexiste == 0){
                    $_SESSION["erro"] = "Já existe uma conta com este email!";
                }else if($emailexiste == 0 && $telefoneexiste == 1){
                    $_SESSION["erro"] = "Já existe uma conta com este telefone!";
                }else{
                    $_SESSION["erro"] = "Já existe uma conta com este email e telefone!";
                }
                $_SESSION["valores"] = $data;
                $this->router->redirect("cadastro");
            }
        }else{
            $_SESSION["valores"] = $data;
            $_SESSION["erro"] = "Preencha todos os campos!";
            $this->router->redirect("cadastro");
        }

    }


    public function logout($data){
        session_start();
        unset($_SESSION["usuario"]);
        return $this->router->redirect("/");
    }

    public function read($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso <= 2){
            $usuarios = new modelUsuario();
            $usuarios = $usuarios->find()->fetch(true);
            $usuario = $_SESSION["usuario"];
            echo $this->view->render("admin/clientes/listar",["usuarios" => $usuarios, "usuario" => $usuario, "admin" => $admin]);
        }else{
            return $this->router->redirect("naologado");
        }
    }


    public function myAccount($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        if(isset($_SESSION["traduzir"])){
            $traduzir = $_SESSION["traduzir"];
        }else{
            $traduzir = NULL;
        }
        echo $this->view->render("usuario/minhaconta",["usuario" => $usuario, "traduzir" => $traduzir]);
    }

    public function myOrders($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $pedidos = new Pedido();
        $pedidos = $pedidos->find("id_usuario=:userid AND status <> :status AND status <> :status2","userid={$usuario->id}&status=sacola&status2=cancelado")->fetch(true);
        if(isset($_SESSION["traduzir"])){
            $traduzir = $_SESSION["traduzir"];
        }else{
            $traduzir = NULL;
        }
        echo $this->view->render("usuario/meuspedidos",["usuario" => $usuario, "pedidos" => $pedidos, "traduzir" => $traduzir]);
    }
    
    public function myReservations($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $reservas = new Reserva();
        $reservas = $reservas->find("id_usuario=:userid AND status<>:status","userid={$usuario->id}&status=Livre")->fetch(true);
        if(isset($_SESSION["traduzir"])){
            $traduzir = $_SESSION["traduzir"];
        }else{
            $traduzir = NULL;
        }
        echo $this->view->render("usuario/minhasreservas",["usuario" => $usuario, "reservas" => $reservas, "traduzir" => $traduzir]);
    }

    public function showOrder($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $id = $data["idpedido"];
        if($usuario){
            if($id){
                $pedidos = new Pedido();
                $pedido = $pedidos->findById($id);
                if($pedido){
                    if($pedido->id_usuario == $usuario->id){
                        $conn = Connect::getInstance();
                        $error = Connect::getError();
                
                        if($error){
                            echo $error->getMessage();
                            die();
                        }
                
                        $stmt = $conn->prepare("SELECT itens_pedido.id, itens_pedido.obs, itens_pedido.qtd, cardapio.nome, cardapio.preco FROM pedidos INNER JOIN itens_pedido ON pedidos.id = itens_pedido.id_pedido INNER JOIN cardapio ON cardapio.id = itens_pedido.id_cardapio WHERE pedidos.id = :id");
                        $stmt->bindValue(":id", $id);
                        $stmt->execute();
                        $ingredientes = $stmt->fetchAll();
            
                        $stmt = $conn->prepare("SELECT usuarios.nome, pedidos.total FROM pedidos INNER JOIN usuarios ON pedidos.id_usuario = usuarios.id WHERE pedidos.id = :id AND usuarios.id = :userid");
                        $stmt->bindValue(":id", $id);
                        $stmt->bindValue(":userid", $id);
                        $stmt->execute();
                        $usuario_show = $stmt->fetch();
                        echo $this->view->render("usuario/verpedido", ["pedido" => $pedido, "usuario" => $usuario, "ingredientes" => $ingredientes, "usuario_show" => $usuario_show]);
                    }else{
                        $_SESSION["erro"] = "Este pedido não te pertence!";
                        return $this->router->redirect("conta/meuspedidos");
                    }
                }else{
                    $_SESSION["erro"] = "Este pedido não existe!";
                    return $this->router->redirect("conta/meuspedidos");
                }
            }else{
                $_SESSION["erro"] = "id informado incorreto!";
                return $this->router->redirect("conta/meuspedidos");
            }
        }else{
            return $this->router->redirect("login");
        }
    }

    public function update($data){
        session_start();
        $email = $data["email"]; 
        $telefone = $data["telefone"];
        $senha = $data["senha"];

        $usuariologado = $_SESSION["usuario"];
        $usuario = new modelUsuario();
        $usuario = $usuario->findById($usuariologado->id);

        if($email && $telefone && $senha){
            if($senha == $usuario->senha){
                $usuario->email = $email;
                $usuario->telefone = $telefone;
                $usuario->save();

                if($usuario->fail()){
                    $_SESSION["erro"] = $usuario->fail()->getMessage();
                }else{
                    $admin = $usuariologado->admin;
                    $usuario->admin = $admin;
                    $_SESSION["usuario"] = $usuario;
                    $_SESSION["sucesso"] = "Conta atualizada!";
                }

            }else{
                $_SESSION["erro"] = "Senha incorreta.";
            }
        }else{
            $_SESSION["erro"] = "Preencha todos os campos.";
        }

        return $this->router->redirect("conta/minhaconta");
    }

    public function transformarAdmin($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso == 1){
            $id = $data["id"];
            $nivel_acesso = $data["nivel_acesso"];
            $admins = new Admin();
            if($id && $nivel_acesso){
                //$usuario = $usuarios->findById($id);
                $admin = $admins->find("id_usuario=:iduser","iduser=$id")->fetch();
                if($admin){
                    switch ($admin->nivel_acesso) {
                        case 1:
                            $_SESSION["erro"] = "Este Cliente já é um(a) Admin!";
                        break;
                        case 2:
                            $_SESSION["erro"] = "Este Cliente já é um(a) Caixa!";
                        break;
                        case 3:
                            $_SESSION["erro"] = "Este Cliente já é um(a) Chapeiro!";
                        break;
                        case 4:
                            $_SESSION["erro"] = "Este Cliente já é um(a) Garçom!";
                        break;
                        
                        default:
                            $_SESSION["erro"] = "Algo de errado está com este cliente! Procure um superior!";
                        break;
                    }
                }else{
                    $admins->id_usuario = $id;
                    $admins->nivel_acesso = $nivel_acesso;
                    $admins->save();
                    $_SESSION["sucesso"] = "Cliente atualizado com sucesso!";
                }
            }else{
                $_SESSION["erro"] = "Algo errado aconteceu com as informações, tente novamente!";
            }
            return $this->router->redirect("admin/listar/clientes");
        }else{
            return $this->router->redirect("naologado");
        }
        
    }
    
    public function delete($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $admins = new Admin();
        $admin = $admins->find("id_usuario=:iduser","iduser={$usuario->id}")->fetch();

        if($admin && $admin->nivel_acesso >= 4){
            $id = $data["id"];
            $usuarios = new modelUsuario();
            if($id){
                $admin = $admins->find("id_usuario=:iduser","iduser=$id")->fetch();
                if($admin){
                    $admin->destroy();
                }
                $usuario = $usuarios->findById($id);
                $usuario->destroy();
    
                $_SESSION["sucesso"] = "Cliente deletado com sucesso!";
            }else{
                $_SESSION["erro"] = "Algo de errado ocorreu!";
            }
            return $this->router->redirect("admin/listar/clientes");
        }else{
            return $this->router->redirect("naologado");
        }
    }
}
