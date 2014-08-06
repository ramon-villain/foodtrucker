<?php
namespace Foodtrucker\Tags;

use Foodtrucker\Trucks\Truck;

class TagRepository{

	private $tag;

	function __construct(Tag $tag) {
		$this->tag = $tag;
	}

	public function save(Tag $tags){
		return $tags->save();
	}
	public function parseTags( $tags ) {
		return explode(',', $tags);
	}
	public function saveTags($tags){
		$tags = $this->parseTags($tags);
		foreach($tags as $tag){
			if(count(Tag::where('tag', $tag)->get()) == 0){
				$tags = Tag::register($tag);
				$this->save($tags);
			}
		}
	}

	public function getTags($filter = 'tag', $order = 'ASC', $paginate = null){
		if($paginate){
			return $this->tag->orderBy( $filter, $order )->paginate($paginate);
		}else {
			return $this->tag->orderBy( $filter, $order )->get();
		}
	}

	public function getTagsPaginatated() {
		return $this->getTags('tag', 'ASC', 7);
	}

	public function getTagsListingTag(){
		return $this->getTags()->lists('tag');
	}

	public function searchThis( $query) {
		$tag_ids = Tag::where('tag','like', "%$query%")->lists('id');
		$trucksFromTag = TagTruck::where('spot_id', null)->where('tag_id', $tag_ids)->lists('truck_id');
		$trucksFinais = [];
		foreach($trucksFromTag as $truck){
			$trucksFinais[] = Truck::where('id', $truck)->get()->toArray();
		}
		return $trucksFinais;

	}
}