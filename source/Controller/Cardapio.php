<?php

namespace Source\Controller;

use CoffeeCode\DataLayer\Connect;
use League\Plates\Engine;
use CoffeeCode\Router\Router;
use Exception;
use Source\Model\Avaliacao as modelAvaliacao;
use Source\Model\Cardapio as modelCardapio;
use Source\Model\Ingrediente;
use Source\Model\Ingrediente_cardapio;
use Source\Model\Item_pedido;

class Cardapio
{

    public function __construct()
    {
        $this->router = new Router(URL_BASE);
        $this->view = Engine::create(__DIR__."/../../View", "php");
    }


    public function create($data){
        session_start();
        
        $conn = Connect::getInstance();
		$error = Connect::getError();

        $cardapio = new modelCardapio();

        $nome = strtolower($data["nome"]);
        $preco = $data["preco"];
        $ingredientes = $data["ingredientes"];

        $existe= $cardapio->find("nome=:nome","nome=$nome")->fetch();

        if(empty($existe)){
            if(isset($_FILES['imagem']['name']) && $_FILES["imagem"]["error"] == 0){
    
                $arquivo_tmp = $_FILES['imagem']['tmp_name'];
                $nomeImagem = $_FILES['imagem']['name'];
    
                $extensao = strrchr($nomeImagem, '.'); //pega extensao
                $extensao = strtolower($extensao); // coloca em minusculo
    
                if(strstr('.jpg;.jpeg;.gif;.png', $extensao)){
                    $novoNome = md5(microtime()) .$extensao; ; //coloca um nome aleatório para a imagem
                    $destino = "View/assets/img/cardapio/" . $novoNome; 
                    @move_uploaded_file($arquivo_tmp, $destino);
                }else{
                    $_SESSION["erro"] = "Extensão ( $extensao ) de imagem nao aceita pelo sistema.";
                }
    
                if($nome && $preco && $ingredientes){
                    $cardapio->nome = $nome;
                    $cardapio->preco = $preco;
                    $cardapio->imagem = $novoNome;
                    $cardapio->save();
    
                    $cardapioid = $cardapio->find("nome=:nome","nome=$nome")->fetch();
    
                    
                    foreach ($ingredientes as $key => $value) {
                        $stmt = $conn->prepare("INSERT INTO ingredientes_cardapio (id_cardapio, id_ingrediente) VALUES (:idcardapio, :idingrediente)");
                        $stmt->bindValue(":idcardapio",$cardapioid->id);
                        $stmt->bindValue(":idingrediente",$value);
                        $stmt->execute();
                    }
    
                    $_SESSION["sucesso"] = "Item cadastrado com sucesso!";
                }else{
                    $_SESSION["erro"] = "Preencha todos os campos.";
                }
            }else{
                $_SESSION["erro"] = "Preencha todos os campos.";
            }
        }else{
            $_SESSION["erro"] = "Este item já existe.";
        }

        return $this->router->redirect("admin/cadastrar/cardapio");
    }

    public function read($data){
        session_start();
        $cardapio = new modelCardapio();
        $cardapio = $cardapio->find()->fetch(true);
        $usuario = $_SESSION["usuario"];
        echo $this->view->render("admin/cardapio/listar", ["cardapio" => $cardapio, "usuario" => $usuario]);
    }

    public function add($data){
        session_start();
        $usuario = $_SESSION["usuario"];
        $ingredientes = new Ingrediente();
        $ingredientes = $ingredientes->find()->fetch(true);
        echo $this->view->render("admin/cardapio/cadastrar", ["usuario" => $usuario, "ingredientes" => $ingredientes]);
    }
    public function show($data){
        session_start();
        $id = $data["id"];
        $cardapio = new modelCardapio();
        $cardapio = $cardapio->findById($id);
        $usuario = $_SESSION["usuario"];

        $conn = Connect::getInstance();
		$error = Connect::getError();

		if($error){
			echo $error->getMessage();
			die();
		}

		$stmt = $conn->prepare("SELECT * FROM ingredientes INNER JOIN ingredientes_cardapio ON ingredientes.id = ingredientes_cardapio.id_ingrediente WHERE ingredientes_cardapio.id_cardapio = :s");
		$stmt->bindValue(":s", $cardapio->id);
		$stmt->execute();
		$ingredientes = $stmt->fetchAll();

        echo $this->view->render("admin/cardapio/ver", ["cardapio" => $cardapio, "usuario" => $usuario, "ingredientes" => $ingredientes]);
    }

    public function showEdit($data){
        session_start();
        $id = $data["id"];
        $cardapio = new modelCardapio();
        $cardapio = $cardapio->findById($id);
        $ingredientes = new Ingrediente();
        $ingredientes = $ingredientes->find()->fetch(true);
        $usuario = $_SESSION["usuario"];
        echo $this->view->render("admin/cardapio/edit", ["cardapio" => $cardapio, "usuario" => $usuario, "ingredientes" => $ingredientes]);
    }

    public function edit($data){
        session_start();
        $id = $data["id"];
        $nome = $data["nome"];
        $preco = $data["preco"];
        $cardapio = new modelCardapio();
        if($id && $nome && $preco){
            $cardapio = $cardapio->findById($id);

            $cardapio->nome = $nome;
            $cardapio->preco = $preco;
            $cardapio->save();

            $_SESSION["sucesso"] = "Ingrediente editado com sucesso!";
            return $this->router->redirect("admin/listar/cardapio");
        }else{
            $_SESSION["erro"] = "Preencha todos os campos!";
            return $this->router->redirect("admin/edit/cardapio/$id");
        }
    }

    public function delete($data){
        session_start();
        $id = $data["id"];
        $cardapio = new modelCardapio();
        $ingredientes_cardapio = new Ingrediente_cardapio();
        $itens_pedido = new Item_pedido();
        if($id){

            $ingrediente_cardapio = $ingredientes_cardapio->find("id_cardapio=:cardid","cardid=$id")->fetch(true);
            $item_pedido = $itens_pedido->find("id_cardapio=:cardid","cardid=$id")->fetch(true);
            foreach ($ingrediente_cardapio as $key => $ingredientes) {
                $ingrediente = $ingredientes_cardapio->findById($ingredientes->id);
                $ingrediente->destroy();
                if($ingrediente->fail()){
                    $_SESSION["erro"] = "Algo de errado com o banco de dados, contate um superior";
                    return $this->router->redirect("admin/listar/cardapio");
                }
            }
            foreach ($item_pedido as $key => $item) {
                $itens = $itens_pedido->findById($item->id);
                $itens->destroy();
                if($itens->fail()){
                    $_SESSION["erro"] = "Algo de errado com o banco de dados, contate um superior";
                    return $this->router->redirect("admin/listar/cardapio");
                }
            }
            $cardapio = $cardapio->findById($id);
            $cardapio->destroy();

            if($cardapio->fail()){
                $_SESSION["erro"] = $cardapio->fail()->getMessage();
            }else{
                $_SESSION["sucesso"] = "Deletado com sucesso";
            }
        }else{
            $_SESSION["erro"] = "Algo de errado!";
        }
        return $this->router->redirect("admin/listar/cardapio");
    }

}
