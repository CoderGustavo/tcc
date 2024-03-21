<?php

namespace Source\Model;

use CoffeeCode\DataLayer\DataLayer;

class Reserva extends DataLayer
{
	public function __construct()
	{
		parent::__construct("reservas", [], "id", false);
	}

	public function usuario(){
		return (new Usuario())->find("id=:userid","userid={$this->id_usuario}")->fetch();
	}
}
?>