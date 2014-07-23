<?php

namespace Foodtrucker\BannersHome;

use Eloquent;

class BannerRepository{

	public function save(Banner $banner){
		$banner->save();
	}

	public function getBanners($qt = 5) {
		return Banner::orderBy('id','desc')->take($qt)->get();
	}

}