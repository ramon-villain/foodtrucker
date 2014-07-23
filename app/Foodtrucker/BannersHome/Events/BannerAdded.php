<?php
namespace Foodtrucker\BannersHome\Events;
use Foodtrucker\BannersHome\Banner;

class BannerAdded {

	private $banner;

	function __construct(Banner $banner) {
		$this->banner = $banner;
	}
} 