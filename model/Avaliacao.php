<?php
	#Model/produto.php
	date_default_timezone_set("Etc/GMT+3");

	class Avaliacao{
		//declaração dos atributos
		public $idAvaliacao, $nome, $profissao, $avaliacao, $estrela, $idUsuario;
		
		public function __construct($idAvaliacao = false){
			if (isset($idAvaliacao)){
				$this->idAvaliacao = $idAvaliacao;
			}
		}

		public function listar(){
			$sql = "SELECT avaliacao.id, avaliacao.status, avaliacao.data, usuario.nome, avaliacao.comentario, avaliacao.estrela 
			FROM avaliacao INNER JOIN usuario ON usuario.id = avaliacao.id_usuario";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		}
		
		public function listarPendentes(){
			$sql = "SELECT avaliacao.id, avaliacao.status, avaliacao.data, usuario.nome, avaliacao.comentario, avaliacao.estrela 
			FROM avaliacao INNER JOIN usuario ON usuario.id = avaliacao.id_usuario WHERE avaliacao.status LIKE 'Pendente'";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;

		}

		public function listarAprovados(){
			$sql = "SELECT avaliacao.id, avaliacao.status, avaliacao.data, usuario.nome, avaliacao.comentario, avaliacao.estrela 
			FROM avaliacao INNER JOIN usuario ON usuario.id = avaliacao.id_usuario WHERE avaliacao.status LIKE 'Aprovado'";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		
		}

		public function inserir(){
			$data = date('d/m/Y H:i');
			$sql = "INSERT INTO avaliacao (id_usuario, comentario, datahora, qtd_estrela, status) VALUES (
			  '".$this->idUsuario."' , '".$this->avaliacao."' , '".$data."' , '".$this->estrela."', 'Pendente')"; 
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$conexao->exec($sql);

		}
		
		public function aprovar(){
			$sql = "UPDATE avaliacao SET 
                    status = 'Aprovado'
                WHERE id = $this->idAvaliacao";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$conexao->exec($sql);
		}

		public function excluir(){
			$sql = "DELETE FROM avaliacao WHERE id = $this->idAvaliacao";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$conexao->exec($sql);
		}

	}