<?php
namespace Foodtrucker\Spots;

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
		return $this->spot->getSpots();
	}

	public function getSpotsId(){
		return $this->getSpots()->lists('id');
	}

} 