<?php

namespace Foodtrucker\Spots\AddSpot;


class AddSpotCommand {

	public $truck;
	public $endereco;
	public $inicio;
	public $fim;
	public $description;

	function __construct($truck,$endereco,$inicio,$fim,$description) {
		$this->truck = $truck;
		$this->endereco = $endereco;
		$this->inicio = $inicio;
		$this->fim = $fim;
		$this->description = $description;
	}
}