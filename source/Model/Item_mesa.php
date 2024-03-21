<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Item_mesa extends DataLayer
{
	public function __construct()
	{
		parent::__construct("itens_mesa", ["id_mesa", "id_cardapio"], "id", false);
	}

}
?>