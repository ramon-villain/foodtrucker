<?php

namespace Foodtrucker\Spots\Events;


use Foodtrucker\Spots\Spot;

class SpotRegistered {

	/**
	 * @var Spot
	 */
	public  $spot;

	function __construct(Spot $spot) {
		$this->spot = $spot;
	}
}