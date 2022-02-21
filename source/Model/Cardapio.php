<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;
use CoffeeCode\DataLayer\Connect;

class Cardapio extends DataLayer
{
	public function __construct()
	{
		parent::__construct("cardapio", ["nome", "preco"], "id", false);
	}

    public function ingredientes(){
		$conn = Connect::getInstance();
		$error = Connect::getError();

		if($error){
			echo $error->getMessage();
			die();
		}

		$stmt = $conn->prepare("SELECT * FROM ingredientes INNER JOIN ingredientes_cardapio ON ingredientes.id = ingredientes_cardapio.id_ingrediente WHERE ingredientes_cardapio.id_cardapio = :s");
		$stmt->bindValue(":s", $this->id);
		$stmt->execute();
		$lista = $stmt->fetchAll();
		return $lista;
	}
	
}
?>