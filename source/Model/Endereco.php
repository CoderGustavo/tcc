<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Endereco extends DataLayer
{
	public function __construct()
	{
		parent::__construct("enderecos", ["id_usuario", "logradouro", "numero", "referencia", "bairro"], "id", false);
	}
}

?>