<?php

namespace Foodtrucker\Spots\AddSpot;

use Foodtrucker\Spots\Spot;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Trucks\TruckRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class AddSpotCommandHandler implements CommandHandler{
	use DispatchableTrait;
	private $spotRepository;
	/**
	 * @var TruckRepository
	 */
	private $truckRepository;

	function __construct(SpotRepository $spotRepository, TruckRepository $truckRepository) {
		$this->spotRepository = $spotRepository;
		$this->truckRepository = $truckRepository;
	}

	public function handle( $command ) {
		$data = $this->spotRepository->getDayAndBegin($command->inicio, $command->fim);

		$spot = Spot::register(
			$command->truck_id, $data['inicioDay'], $data['fimDay'], $data['inicioTime'], $data['fimTime'], $command->endereco, $command->description
		);
		$this->spotRepository->save($spot);
		$this->dispatchEventsFor($spot);
		return $spot;
	}

}