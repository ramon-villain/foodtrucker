<?php
namespace Foodtrucker\Tags\Events;

use Foodtrucker\Tags\TagTruck;

class TagTruckGenerated {

	public  $tagTruck;

	function __construct(TagTruck $tagTruck) {
		$this->tagTruck = $tagTruck;
	}
}