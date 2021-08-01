<?php
	#Model/produto.php
	date_default_timezone_set("Etc/GMT+3");

	class Avaliacao{
		//declaração dos atributos
		public $idComentario, $nome, $profissao, $comentario, $estrela, $idUsuario;
		
		public function __construct($idComentario = false){
			if (isset($idComentario)){
				$this->idComentario = $idComentario;
			}
		}

		public function listar(){
			$sql = "SELECT comentario.id, comentario.status, comentario.data, usuario.nome, comentario.comentario, comentario.estrela 
			FROM comentario INNER JOIN usuario ON usuario.id = comentario.id_usuario";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		}
		
		public function listarPendentes(){
			$sql = "SELECT comentario.id, comentario.status, comentario.data, usuario.nome, comentario.comentario, comentario.estrela 
			FROM comentario INNER JOIN usuario ON usuario.id = comentario.id_usuario WHERE comentario.status LIKE 'Pendente'";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;

		}

		public function listarAprovados(){
			$sql = "SELECT comentario.id, comentario.status, comentario.data, usuario.nome, comentario.comentario, comentario.estrela 
			FROM comentario INNER JOIN usuario ON usuario.id = comentario.id_usuario WHERE comentario.status LIKE 'Aprovado'";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$resultado = $conexao->query($sql);
			$lista = $resultado->fetchAll();
			return $lista;
		
		}

		public function inserir(){
			$data = date('d/m/Y H:i');
			$sql = "INSERT INTO comentario (id_usuario, comentario, datahora, qtd_estrela, status) VALUES (
			  '".$this->idUsuario."' , '".$this->comentario."' , '".$data."' , '".$this->estrela."', 'Pendente')"; 
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$conexao->exec($sql);

		}
		
		public function aprovar(){
			$sql = "UPDATE comentario SET 
                    status = 'Aprovado'
                WHERE id = $this->idComentario";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$conexao->exec($sql);
		}

		public function excluir(){
			$sql = "DELETE FROM comentario WHERE id = $this->idComentario";
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$conexao->exec($sql);
		}

	}