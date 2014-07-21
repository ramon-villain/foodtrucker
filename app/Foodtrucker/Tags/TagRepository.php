<?php
namespace Foodtrucker\Tags;

class TagRepository {

	private $tag;

	function __construct(Tag $tag) {
		$this->tag = $tag;
	}

	public function save(Tag $tags){
//		dd($tags);
		return $tags->save();
	}

	public function getTags() {
		return $this->tag->getTags();
	}


} 