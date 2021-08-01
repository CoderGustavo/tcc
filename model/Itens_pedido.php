<?php
	#Model/produto.php
	class Itens_pedido{
		//declaração dos atributos
		public $id, $idEndereco, $idUsuario, $rua, $bairro, $numero, $pedido, $total, $status, $obs, $formaPagamento;
		
		public function __construct($idDelivery = false)
	{
		if (isset($idDelivery)){
			$this->idDelivery = $idDelivery;
		}
	}

		public function listar(){
			$sql = "SELECT * FROM delivery ORDER BY id";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		}

		public function inserir(){
			$sql = "INSERT INTO itens_pedido ('id_pedido, quantidade') VALUES ()";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$conexao->exec($sql); 
			echo "Pedido realizado com sucesso, cheque seu pedido na sua área de cliente.";
		}

		public function atualizar(){
			$pdo = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$stmt = $pdo->prepare("UPDATE delivery SET status = :param1 WHERE id = :id");
			if($this->status == 'Pendente'){
				$stmt->bindValue(':param1', 'Em Preparo');
			}else if($this->status == 'Em Preparo'){
				$stmt->bindValue(':param1', 'Entregue');
			}
			$stmt->bindValue(':id', $this->id);
			$run = $stmt->execute();
		}
	}