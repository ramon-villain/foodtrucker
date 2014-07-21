<?php
namespace Foodtrucker\Tags;

class TagRepository{

	private $tag;

	function __construct(Tag $tag) {
		$this->tag = $tag;
	}

	public function save(Tag $tags){
		return $tags->save();
	}

	public function getTags(){
		return $this->tag->getTags();
	}

	public function getTagsPaginatated() {
		return $this->tag->getTags('tag', 'ASC', 7);
	}

	public function getTagsListingTag(){
		return $this->getTags()->lists('tag');
	}


}