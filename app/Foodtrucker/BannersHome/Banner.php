<?php

namespace Foodtrucker\BannersHome;

use Eloquent;
use Foodtrucker\BannersHome\Events\BannerAdded;
use Laracasts\Commander\Events\EventGenerator;

class Banner extends Eloquent{
	protected $fillable = ['imagem', 'url', 'body', 'status'];
	protected $table = 'banners_home';

	use EventGenerator;

	public static function register($imagem, $url, $body, $status) {
		$dataObj = new static(compact('imagem', 'url', 'body', 'status'));
		$dataObj->raise(new BannerAdded($dataObj));
		return $dataObj;
	}
}