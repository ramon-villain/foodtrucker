<?php

namespace Foodtrucker\Tags;


use Laracasts\Commander\CommandHandler;

class AddTagTruckCommandHandler implements CommandHandler {

	private $tagTruckRepository;

	function __construct(TagTruckRepository $tagTruckRepository) {
		$this->tagTruckRepository = $tagTruckRepository;
	}

	/**
	 * Handle the command
	 *
	 * @param $command
	 *
	 * @return mixed
	 */
	public function handle( $command ) {
		$arrTags = $this->parseTags($command->tags);
		dd($command);
		foreach($arrTags as $tag){
			$tagId = Tag::where('tag', $tag)->pluck('id');
			$tagTruck = TagTruck::register($command->truckId,$tagId,$command->spotId);
			$this->tagTruckRepository->save($tagTruck);
		}
	}

		private function parseTags( $tags ) {
			return explode(',', $tags);
		}
	}