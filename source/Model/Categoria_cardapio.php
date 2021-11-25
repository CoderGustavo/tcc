<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Categoria_cardapio extends DataLayer
{
	public function __construct()
	{
		parent::__construct("categorias_cardapio", ["nome"], "id", false);
	}
}

?>