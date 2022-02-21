<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Ingrediente extends DataLayer
{
	public function __construct()
	{
		parent::__construct("ingredientes", ["nome", "retirar"], "id", false);
	}
}

?>