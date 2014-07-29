<?php

namespace Foodtrucker\Trucks\AddTruck;


class AddTruckCommand {


	public $nome;
	public $logo;
	public $description;
	public $pagamento;
	public $facebook;
	public $instagram;
	public $maisPedido;
	public $extras;

	function __construct($nome, $logo, $description, $pagamento, $facebook, $instagram , $maisPedido, $extras) {

		$this->nome = $nome;
		$this->logo = $logo;
		$this->description = $description;
		$this->pagamento = $pagamento;
		$this->facebook = $facebook;
		$this->instagram = $instagram;
		$this->maisPedido = $maisPedido;
		$this->extras = $extras;
	}
}