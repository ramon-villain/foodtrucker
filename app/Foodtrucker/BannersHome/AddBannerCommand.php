<?php

namespace Foodtrucker\BannersHome;


class AddBannerCommand {

	public $image;
	public $url;
	public $body;

	function __construct($image, $url, $body) {
		$this->image = $image;
		$this->url = $url;
		$this->body = $body;
	}

} 