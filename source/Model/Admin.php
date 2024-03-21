<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Admin extends DataLayer
{
	public function __construct()
	{
		parent::__construct("admins", ["id_usuario", "nivel_acesso"], "id", false);
	}

	public function Usuario(){
		
	}

}

?>