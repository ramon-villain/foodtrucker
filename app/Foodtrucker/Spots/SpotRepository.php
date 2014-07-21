<?php
namespace Foodtrucker\Spots;

class SpotRepository {

	public function save(Spot $spot){
		return $spot->save();
	}

	public function getThisId(Spot $spot) {
		return $spot->orderBy('id','desc')->pluck('id');
	}

} 