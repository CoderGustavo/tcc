<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Ingrediente_cardapio extends DataLayer
{
	public function __construct()
	{
		parent::__construct("ingredientes_cardapio", ["id_ingrediente", "id_cardapio"], "id", false);
	}
}

?>