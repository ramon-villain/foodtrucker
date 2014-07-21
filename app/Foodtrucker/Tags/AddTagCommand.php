<?php

namespace Foodtrucker\Tags;


class AddTagCommand {

	public $tags;

	function __construct($tags) {
		$this->tags = $tags;
	}
}