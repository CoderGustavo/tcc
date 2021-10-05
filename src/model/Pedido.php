<?php
	#Model/produto.php
	class Pedido{
		//declaração dos atributos
		public $id, $idEndereco, $idUsuario, $rua, $bairro, $numero, $pedido, $total, $status, $obs, $formaPagamento;
		
		public function __construct($idDelivery = false)
	{
		if (isset($idDelivery)){
			$this->idDelivery = $idDelivery;
		}
	}
		public function show($usuario){
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$sql = "SELECT pedido.id, pedido.total, pedido.status FROM pedido INNER JOIN usuario ON pedido.id_usuario = usuario.id WHERE :id_usuario";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(":id_usuario", $usuario["id"]);
			$stmt->execute();
			$lista = $stmt->fetchAll();
			return $lista;
		}

		public function listar(){
			$sql = "SELECT pedido.id, pedido.total, pedido.status, pedido.forma_pagamento, pedido.entrega, usuario.nome FROM pedido INNER JOIN usuario ON pedido.id_usuario = usuario.id WHERE STATUS <> 'Cancelado'";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		}

		public function listarCancelado(){
			$sql = "SELECT pedido.id, pedido.total, pedido.status, pedido.forma_pagamento, pedido.entrega, usuario.nome FROM pedido INNER JOIN usuario ON pedido.id_usuario = usuario.id WHERE STATUS = 'Cancelado'";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		}

	
		public function listarPendente(){
			$sql = "SELECT pedido.id, pedido.total, pedido.status, pedido.forma_pagamento, pedido.entrega, usuario.nome FROM pedido INNER JOIN usuario ON pedido.id_usuario = usuario.id WHERE STATUS = 'Pendente'";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		}

		public function listarPreparo(){
			$sql = "SELECT pedido.id, pedido.total, pedido.status, pedido.forma_pagamento, pedido.entrega, usuario.nome FROM pedido INNER JOIN usuario ON pedido.id_usuario = usuario.id WHERE STATUS = 'Em Preparo'";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		}

		public function listarEntregue(){
			$sql = "SELECT pedido.id, pedido.total, pedido.status, pedido.forma_pagamento, pedido.entrega, usuario.nome FROM pedido INNER JOIN usuario ON pedido.id_usuario = usuario.id WHERE STATUS = 'Entregue'";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		}

		public function inserir(){
			$sql = "INSERT INTO pedido (id_endereco, id_usuario, status, forma_pagamento, total, obs) VALUES (
			  '".$this->idEndereco."' , '".$this->idUsuario."' , 'pendente' , '".$this->formaPagamento."' , '".$this->total."' , '".$this->obs."')";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$conexao->exec($sql); 
		}

		public function atualizar(){
			$pdo = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$stmt = $pdo->prepare("UPDATE pedido SET status = :param1 WHERE id = :id");
			if($this->status == 'Pendente'){
				$stmt->bindValue(':param1', 'Em Preparo');
			}else if($this->status == 'Em Preparo'){
				$stmt->bindValue(':param1', 'Entregue');
			}
			$stmt->bindValue(':id', $this->id);
			$stmt->execute();
		}
	}