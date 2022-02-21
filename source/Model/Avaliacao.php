<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Avaliacao extends DataLayer
{
	public function __construct()
	{
		parent::__construct("avaliacoes", ["id_usuario", "avaliacao", "status", "datahora","estrela"], "id", false);
	}

	public function usuario(){
		return (new Usuario())->find("id=:userid","userid={$this->id_usuario}")->fetch();
	}
}

?>