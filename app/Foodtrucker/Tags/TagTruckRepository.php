<?php
namespace Foodtrucker\Tags;

class TagTruckRepository {
	public function save(TagTruck $tagsTruck){
//		dd($tagsTruck);
		return $tagsTruck->save();
	}
} 