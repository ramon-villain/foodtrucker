<?php
namespace Foodtrucker\Spots;

use Foodtrucker\Trucks\Truck;

class SpotRepository {

	private $spot;

	function __construct(Spot $spot) {
		$this->spot = $spot;
	}

	public function save(Spot $spot){
		return $spot->save();
	}

	public function getThisId(Spot $spot) {
		return $spot->orderBy('id','desc')->pluck('id');
	}

	public function getSpots() {
		return $this->spot->orderBy('created_at', 'desc')->get();
	}

	public function getSpotsId(){
		return $this->getSpots()->lists('id');
	}

} 