<?php

class Cardapio
{
	public $id;
	public $nome;
	public $desc;
	public $preco;
	public $imagem;

 	public function listarCardapio(){
		$sql = "SELECT * FROM cardapio";
		$conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
		$resultado = $conexao->query($sql);
		$lista = $resultado->fetchAll();

		foreach($lista as $key => $linha){
			$a = $linha['id'];
			$sql2 = "SELECT * FROM ingrediente_cardapio WHERE cardapio_id = $a";
			$resultado2 = $conexao->query($sql2);
			$result = $resultado2->fetchAll();

			$lista[$key]["ingredientes"]= $result;
		}	

		return $lista;
	}

}

?>