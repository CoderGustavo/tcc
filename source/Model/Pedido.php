<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Pedido extends DataLayer
{
	public function __construct()
	{
		parent::__construct("pedidos", ["id_usuario", "status", "entrega"], "id", false);
	}

}
?>