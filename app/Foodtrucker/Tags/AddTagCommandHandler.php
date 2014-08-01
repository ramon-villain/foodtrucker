<?php

namespace Foodtrucker\Tags;


use Laracasts\Commander\CommandHandler;

class AddTagCommandHandler implements CommandHandler {

	private $tagRepository;
	/**
	 * @var TagTruckRepository
	 */
	private $tagTruckRepository;

	function __construct(TagRepository $tagRepository, TagTruckRepository $tagTruckRepository) {
		$this->tagRepository = $tagRepository;
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
		$arrTags = $this->tagTruckRepository->parseTags($command->tags);
		foreach($arrTags as $tag){
			if(count(Tag::where('tag', $tag)->get()) == 0){
				$tags = Tag::register($tag);
				$this->tagRepository->save($tags);
			}
		}
	}

}