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

	public function searchThis( $query, $trucks ) {
//		dd($trucks);
		$ids = Tag::where('tag','like', "%$query%")->lists('id');
		$trucks = [];
		foreach($ids as $id){
			$trucks[] = TagTruck::where('tag_id', $id)->lists('truck_id');
		}

		return $trucks;
	}



}