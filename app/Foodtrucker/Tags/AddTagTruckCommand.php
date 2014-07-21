<?php

namespace Foodtrucker\Tags;


class AddTagTruckCommand {

	public $tags;
	public $spotId;
	public $truckId;

	function __construct($tags, $spotId = null, $truckId) {
		$this->tags = $tags;
		$this->spotId = $spotId;
		$this->truckId = $truckId;
	}
}