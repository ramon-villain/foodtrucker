<?php

namespace Foodtrucker\Spots\AddSpot;


class AddSpotCommand {

	public $truck;
	public $endereco;
	public $inicio;
	public $fim;
	public $description;
	public $tags;

	function __construct($truck,$endereco,$inicio,$fim,$description, $tags) {
		$this->truck = $truck;
		$this->endereco = $endereco;
		$this->inicio = $inicio;
		$this->fim = $fim;
		$this->description = $description;
		$this->tags = $tags;
	}
}