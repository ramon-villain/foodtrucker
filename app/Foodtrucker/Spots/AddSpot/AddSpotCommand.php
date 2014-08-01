<?php

namespace Foodtrucker\Spots\AddSpot;


class AddSpotCommand {

	public $truck_id;
	public $endereco;
	public $inicio;
	public $fim;
	public $description;

	function __construct($truck_id,$endereco,$inicio,$fim,$description) {
		$this->truck_id = $truck_id;
		$this->endereco = $endereco;
		$this->inicio = $inicio;
		$this->fim = $fim;
		$this->description = $description;
	}
}