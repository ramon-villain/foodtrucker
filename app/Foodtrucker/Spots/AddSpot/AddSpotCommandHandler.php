<?php

namespace Foodtrucker\Spots\AddSpot;


use Carbon\Carbon;
use Foodtrucker\Spots\Spot;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Tags\Tag;
use Foodtrucker\Tags\TagRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class AddSpotCommandHandler implements CommandHandler{
	use DispatchableTrait;
	private $spotRepository;
	private $tagRepository;

	function __construct(SpotRepository $spotRepository, TagRepository $tagRepository) {
		$this->spotRepository = $spotRepository;
		$this->tagRepository = $tagRepository;
	}

	public function handle( $command ) {
		($command->tags ? $this->saveTags($command->tags) : null);
		$data = $this->getDayAndBegin($command);
		$spot = Spot::register(
			$command->truck, $data['startDay'], $data['endDay'], $data['startTime'], $data['endTime'], $command->address, $command->description
		);
		$this->spotRepository->save($spot);
		$this->dispatchEventsFor($spot);

		return $spot;
	}

	private function getDayAndBegin( $command ) {
		$start    = explode( '-', $command->start );
		$abertura = explode('/', trim($start[0]));
		$abertura = $abertura[2].'-'.$abertura[1].'-'.$abertura[0];
		$data['startDay'] = gmdate("Y-m-d", strtotime($abertura));
		$data['startTime']    = trim( $start[1] );

		$end    = explode( '-', $command->end );
		$encerramento = explode('/', trim($end[0]));
		$encerramento = $encerramento[2].'-'.$encerramento[1].'-'.$encerramento[0];
		$data['endDay'] = gmdate("Y-m-d", strtotime($encerramento));
		$data['endTime']    = trim( $end[1] );
		return $data;
	}

	private function saveTags($parsedTags) {
		$arrTags = $this->parseTags($parsedTags);
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