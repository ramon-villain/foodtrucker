<?php

namespace Foodtrucker\Tags;


use Laracasts\Commander\CommandHandler;

class AddTagTruckCommandHandler implements CommandHandler {

	private $tagTruckRepository;

	function __construct(TagTruckRepository $tagTruckRepository) {
		$this->tagTruckRepository = $tagTruckRepository;
	}

	public function handle( $command ) {
		$arrTags = $this->tagTruckRepository->parseTags($command->tags);
		foreach($arrTags as $tag){
			$tagId = Tag::where('tag', $tag)->pluck('id');
			$tagTruck = TagTruck::register($command->truckId,$tagId,$command->spotId);
			$this->tagTruckRepository->save($tagTruck);
		}
	}
}