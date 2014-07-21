<?php

namespace Foodtrucker\Tags;


use Laracasts\Commander\CommandHandler;

class AddTagCommandHandler implements CommandHandler {

	private $tagRepository;

	function __construct(TagRepository $tagRepository) {
		$this->tagRepository = $tagRepository;
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
		foreach($arrTags as $tag){
			if(count(Tag::where('tag', $tag)->get()) == 0){
				$tags = Tag::register($tag);
				$this->tagRepository->save($tags);
			}
		}
	}

		private function parseTags( $tags ) {
			return explode(',', $tags);
		}
	}