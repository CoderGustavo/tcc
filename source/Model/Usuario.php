<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Usuario extends DataLayer
{
	public function __construct()
	{
		parent::__construct("usuarios", ["nome", "email", "senha", "telefone"], "id", false);
	}

}

?>