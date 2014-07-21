<?php

namespace Foodtrucker\Tags;
use Foodtrucker\Tags\Events\TagGenerated;
use Laracasts\Commander\Events\EventGenerator;

class Tag extends \Eloquent{
	protected $fillable = ['tag'];
	protected $table = 'tags';

	use EventGenerator;

	public static function register($tag) {
		$dataObj = new static(compact('tag'));
		$dataObj->raise(new TagGenerated($dataObj));
		return $dataObj;
	}

} 