<?php

namespace Foodtrucker\Tags;
use Foodtrucker\Tags\Events\TagTruckGenerated;
use Laracasts\Commander\Events\EventGenerator;

class TagTruck extends \Eloquent{
	protected $fillable = ['truck', 'tag', 'spot'];
	protected $table = 'tags_trucks';

	use EventGenerator;

	public static function register($truck, $tag, $spot) {

		$dataObj = new static(compact('truck','tag', 'spot'));
		$dataObj->raise(new TagTruckGenerated($dataObj));
		return $dataObj;
	}

} 