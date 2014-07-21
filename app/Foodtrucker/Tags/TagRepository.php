<?php
namespace Foodtrucker\Tags;

class TagRepository {
	public function save(Tag $tags){
//		dd($tags);
		return $tags->save();
	}


} 