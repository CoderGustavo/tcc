<?php

class Endereco
{
	public $id;
	public $id_Usuario;
	public $logradouro;
	public $numero;
	public $referencia;
	public $bairro;

 	public function listar(){
		$sql = "SELECT * FROM endereco WHERE id_Usuario = ".$this->id_Usuario.";";
		$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
		$resultado = $conexao->query($sql);
		$lista = $resultado->fetchAll();

		return $lista;
	}

}

?>