<?php
namespace Foodtrucker\Tags;

class TagTruckRepository {
	public function save(TagTruck $tagsTruck){
		return $tagsTruck->save();
	}

	public function getTagsSpot( $id ) {
		$tags = [];
		$tags_id = TagTruck::where('spot_id', $id)->lists('tag_id');
		foreach ($tags_id as $tag){
			$tags[] = Tag::where('id', $tag)->pluck('tag');
		}
		$tags = implode(",", $tags);
		return $tags;
	}

	public function updateTagsSpot( $tags ) {
		$tags = $this->parseTags($tags);

	}

	public function parseTags( $tags ) {
		return explode(',', $tags);
	}
} 