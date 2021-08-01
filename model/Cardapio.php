<?php

class Cardapio
{
	public $id, $nome, $desc, $preco, $imagem, $idCategoria;


	


 	public function listarCardapio(){
		$sql = "SELECT * FROM cardapio";
		$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
		$resultado = $conexao->query($sql);
		$lista = $resultado->fetchAll();
		return $lista;
	}






}

?>