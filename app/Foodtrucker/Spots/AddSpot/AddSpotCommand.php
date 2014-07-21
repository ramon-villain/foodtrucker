<?php

namespace Foodtrucker\Spots\AddSpot;


class AddSpotCommand {

	public $truck;
	public $address;
	public $start;
	public $end;
	public $description;
	public $tags;

	function __construct($truck,$address,$start,$end,$description, $tags) {
		$this->truck = $truck;
		$this->address = $address;
		$this->start = $start;
		$this->end = $end;
		$this->description = $description;
		$this->tags = $tags;
	}
}