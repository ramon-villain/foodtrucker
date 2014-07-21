<?php
namespace Foodtrucker\Tags;

class TagTruckRepository {
	public function save(TagTruck $tagsTruck){
		return $tagsTruck->save();
	}
} 