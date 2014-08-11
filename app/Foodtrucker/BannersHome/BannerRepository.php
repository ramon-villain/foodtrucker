<?php

namespace Foodtrucker\BannersHome;

use Eloquent;

class BannerRepository{

	public function save(Banner $banner){
		$banner->save();
	}

	public function getBanners($qt = 5, $status = 'on') {
		if($status == 'off'){
			return Banner::orderBy('id','desc')->take($qt)->get();
		}else{
			return Banner::orderBy('id','desc')->where('status', 1)->take($qt)->get();
		}
	}

	public function getBanner( $id ) {
		return Banner::where('id', $id)->first();
	}

	public function editBanner( $id, $body, $status, $url ) {
		return Banner::where('id', $id)->update([
			'body'      => $body,
			'status'    => $status,
			'url'       => $url
		]);
	}

}