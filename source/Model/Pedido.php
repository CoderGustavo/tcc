<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Pedido extends DataLayer
{
	public function __construct()
	{
		parent::__construct("pedidos", ["id_endereco", "id_usuario", "total", "status", "forma_pagamento", "obs", "entrega"], "id", false);
	}

}
?>