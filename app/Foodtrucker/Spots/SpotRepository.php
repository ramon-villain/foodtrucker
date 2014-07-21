<?php
namespace Foodtrucker\Spots;

class SpotRepository {

	public function save(Spot $spot){
		return $spot->save();
	}

} 