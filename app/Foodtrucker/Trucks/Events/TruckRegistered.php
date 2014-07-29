<?php

namespace Foodtrucker\Trucks\Events;


use Foodtrucker\Trucks\Truck;

class TruckRegistered {

	public $truck;

	function __construct(Truck $truck) {
		$this->truck = $truck;
	}
}