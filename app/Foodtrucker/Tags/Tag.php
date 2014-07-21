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

	public function spot(){
		return $this->belongsToMany('Foodtrucker\Spots\Spot', 'tags_trucks');
	}
	public function getTags($filter = 'tag', $order = 'ASC', $paginate = null){
		if($paginate){
			return Tag::orderBy( $filter, $order )->paginate($paginate);
		}else {
			return Tag::orderBy( $filter, $order )->get();
		}
	}


}