<?php

namespace Foodtrucker\Configs;


class SetFeaturedCommand {
	public $image;
	public $image_bckp;
	public $body;
	public $title;

	function __construct($image = null, $image_bckp = null, $body, $title) {
		$this->image = $image;
		$this->image_bckp = $image_bckp;
		$this->body = $body;
		$this->title = $title;
	}

} 