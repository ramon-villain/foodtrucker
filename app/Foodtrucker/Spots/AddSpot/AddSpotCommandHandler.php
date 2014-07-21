<?php

namespace Foodtrucker\Spots\AddSpot;

use Foodtrucker\Spots\Spot;
use Foodtrucker\Spots\SpotRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class AddSpotCommandHandler implements CommandHandler{
	use DispatchableTrait;
	private $spotRepository;

	function __construct(SpotRepository $spotRepository) {
		$this->spotRepository = $spotRepository;
	}

	public function handle( $command ) {
		$data = $this->getDayAndBegin($command);
		$spot = Spot::register(
			$command->truck, $data['inicioDay'], $data['fimDay'], $data['inicioTime'], $data['fimTime'], $command->endereco, $command->description
		);
		$this->spotRepository->save($spot);
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
}