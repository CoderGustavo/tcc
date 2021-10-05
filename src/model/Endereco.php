<?php

class Endereco
{
	public $id;
	public $id_Usuario;
	public $logradouro;
	public $numero;
	public $referencia;
	public $bairro;

 	public function listar($usuario){
		$sql = "SELECT * FROM endereco WHERE id_Usuario = ".$usuario['id']."";
		$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
		$resultado = $conexao->query($sql);
		$lista = $resultado->fetchAll();

		return $lista;
	}

	public function inserir(){
		try{
			$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
			$sql = "INSERT INTO endereco (id_Usuario, logradouro, bairro, numero, referencia) VALUE (:id_Usuario, :logradouro, :bairro, :numero, :referencia);";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(':id_Usuario', $this->id_Usuario);
			$stmt->bindValue(':logradouro', $this->logradouro);
			$stmt->bindValue(':bairro', $this->bairro);
			$stmt->bindValue(':numero', $this->numero);
			$stmt->bindValue(':referencia', $this->referencia);
			$stmt->execute();
			return "aquii";
		}
		catch(Exception $e){
			return $e;
		}
	}

}

?>