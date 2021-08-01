<?php
	#Model/produto.php
    
	class Reserva{
		//declaração dos atributos
		public $idReserva, $idUsuario, $datahora, $numeropessoas, $obs;
		
		public function __construct($idReserva = false)
	{
		if (isset($idReserva)){
			$this->idReserva = $idReserva;
		}
	}

		public function listar(){
			$sql = "SELECT reserva.id, reserva.numero_pessoas, reserva.observacao, reserva.datahora, reserva.status, usuario.nome, usuario.telefone FROM reserva INNER JOIN usuario ON reserva.id_usuario = usuario.id ORDER BY id";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		}

		public function listarPendentes(){
			$sql = "SELECT reserva.id, reserva.numero_pessoas, reserva.observacao, reserva.datahora, reserva.status, usuario.nome, usuario.telefone FROM reserva INNER JOIN usuario ON reserva.id_usuario = usuario.id where reserva.status = 'Pendente'";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		}

		public function listarConcluida(){
			$sql = "SELECT reserva.id, reserva.numero_pessoas, reserva.observacao, reserva.datahora, reserva.status, usuario.nome, usuario.telefone FROM reserva INNER JOIN usuario ON reserva.id_usuario = usuario.id where reserva.status = 'Aprovado'";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		}


		public function inserir(){
			$sql = "INSERT INTO reserva (id_usuario, datahora, numero_pessoas, observacao, status) VALUES ('".$this->idUsuario."' , '".$this->datahora."' , '".$this->numeropessoas."' , '".$this->obs."', 'Pendente')"; 
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$conexao->exec($sql); 
		}

		public function excluir(){
			$sql = "DELETE FROM reserva WHERE idReserva=".$this->idReserva;
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2','root','');
			$conexao->exec($sql);
		}
		

		public function atualizar(){
        $sql = "UPDATE reserva SET 
                    nome = '$this->nome' ,
                    telefone =  '$this->telefone' ,
                    email = '$this->email' ,
                    data = '$this->data' ,
                    horario = '$this->horario' ,
                    numeropessoas = '$this->numeropessoas' ,
                    obs = '$this->obs'
                WHERE idReserva = $this->idReserva ";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $conexao->exec($sql);
    }

    	public function aprovar(){
		$sql = "UPDATE reserva SET 
                    status = 'Aprovado'
                WHERE idReserva = $this->idReserva";
		$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
		$conexao->exec($sql);
		}
		
	}