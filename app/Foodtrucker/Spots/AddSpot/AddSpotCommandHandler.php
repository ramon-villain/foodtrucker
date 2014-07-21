<?php

namespace Foodtrucker\Spots\AddSpot;


use Carbon\Carbon;
use Foodtrucker\Spots\Spot;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Tags\Tag;
use Foodtrucker\Tags\TagRepository;
use Foodtrucker\Tags\TagTruck;
use Foodtrucker\Tags\TagTruckRepository;
use Illuminate\Support\Facades\DB;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class AddSpotCommandHandler implements CommandHandler{
	use DispatchableTrait;
	private $spotRepository;
	private $tagRepository;
	private $tagTruckRepository;

	function __construct(SpotRepository $spotRepository, TagRepository $tagRepository, TagTruckRepository $tagTruckRepository) {
		$this->spotRepository = $spotRepository;
		$this->tagRepository = $tagRepository;
		$this->tagTruckRepository = $tagTruckRepository;
	}

	public function handle( $command ) {
		$data = $this->getDayAndBegin($command);
		$spot = Spot::register(
			$command->truck, $data['inicioDay'], $data['fimDay'], $data['inicioTime'], $data['fimTime'], $command->endereco, $command->description
		);
		$this->spotRepository->save($spot);
		($command->tags ? $this->saveTags($command->tags, $this->spotRepository->getThisId($spot), $command->truck) : null);
		$this->dispatchEventsFor($spot);

		return $spot;
	}

	private function getDayAndBegin( $command ) {
		$inicio    = explode( '-', $command->inicio );
		$abertura = explode('/', trim($inicio[0]));
		$abertura = $abertura[2].'-'.$abertura[1].'-'.$abertura[0];
		$data['inicioDay'] = gmdate("Y-m-d", strtotime($abertura));
		$data['inicioTime']    = trim( $inicio[1] );

		$fim    = explode( '-', $command->fim );
		$encerramento = explode('/', trim($fim[0]));
		$encerramento = $encerramento[2].'-'.$encerramento[1].'-'.$encerramento[0];
		$data['fimDay'] = gmdate("Y-m-d", strtotime($encerramento));
		$data['fimTime']    = trim( $fim[1] );
		return $data;
	}

	private function saveTags($parsedTags, $spotId = null, $truckId) {
		$arrTags = $this->parseTags($parsedTags);
		foreach($arrTags as $tag){
			if(count(Tag::where('tag', $tag)->get()) == 0){
				$tags = Tag::register($tag);
				$this->tagRepository->save($tags);
			}
			$tagId = Tag::where('tag', $tag)->pluck('id');
			$tagTruck = TagTruck::register($truckId,$tagId,$spotId);

			$this->tagTruckRepository->save($tagTruck);
		}

	}

	private function parseTags( $tags ) {
		return explode(',', $tags);
	}

}