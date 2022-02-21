<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Item_pedido extends DataLayer
{
	public function __construct()
	{
		parent::__construct("itens_pedido", ["id_pedido", "id_cardapio"], "id", false);
	}

}
?>