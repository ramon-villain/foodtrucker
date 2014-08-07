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

	public function saveTagTrucks( $tags, $truck_id ) {
		$arrTags = $this->parseTags($tags);
		foreach($arrTags as $tag){
			$tagId = Tag::where('tag', $tag)->pluck('id');
			TagTruck::insert([
				'truck_id'  => $truck_id,
				'tag_id'    => $tagId
			]);
		}
	}

	public function getTagsTruck( $id ) {
		$tags = [];
		$tags_id = TagTruck::where('truck_id', $id)->lists('tag_id');
		foreach ($tags_id as $tag){
			$tags[] = Tag::where('id', $tag)->pluck('tag');
		}
		$tags = implode(",", $tags);
		return $tags;
	}

	public function updateTagTrucks( $tags, $id ) {
		$tagsTruck = TagTruck::where('truck_id', $id)->lists('tag_id');
		$arrTags = $this->parseTags($tags);
		$tags_id = [];
		foreach($arrTags as $tag){
			$tagId = Tag::where('tag', $tag)->pluck('id');
			$tags_id[] = $tagId;
			if(count(TagTruck::where('tag_id', $tagId)->where('truck_id',$id)->get()) == 0) {
				TagTruck::insert([
					'truck_id'  => $id,
					'tag_id'    => $tagId
				]);
			}
		}
		for($i=0;$i< count($tagsTruck); $i++){
			if(!in_array($tagsTruck[$i],$tags_id)){
				TagTruck::where('truck_id',$id)->where('tag_id', $tagsTruck[$i])->delete();
			}
		}
	}
} 