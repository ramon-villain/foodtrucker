<?php
namespace Foodtrucker\Tags\Events;

use Foodtrucker\Tags\Tag;

class TagGenerated {

	public  $tag;

	function __construct(Tag $tag) {
		$this->tag = $tag;
	}
}