<?php

namespace Foodtrucker\Tags;
use Foodtrucker\Tags\Events\TagTruckGenerated;
use Laracasts\Commander\Events\EventGenerator;

class TagTruck extends \Eloquent{
	protected $fillable = ['truck_id', 'tag_id', 'spot_id'];
	protected $table = 'tags_trucks';

	use EventGenerator;

	public static function register($truck_id, $tag_id, $spot_id = null) {
		$dataObj = new static(compact('truck_id','tag_id', 'spot_id'));
		$dataObj->raise(new TagTruckGenerated($dataObj));
		return $dataObj;
	}

} 