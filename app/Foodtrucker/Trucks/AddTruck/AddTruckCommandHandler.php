<?php

namespace Foodtrucker\Trucks\AddTruck;

use Foodtrucker\Trucks\Truck;
use Foodtrucker\Trucks\TruckRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class AddTruckCommandHandler implements CommandHandler{
	use DispatchableTrait;
	private $truckRepository;

	function __construct(TruckRepository $truckRepository) {
		$this->truckRepository = $truckRepository;
	}

	public function handle( $command ) {
		$truck = Truck::register(
			$command->nome, $command->logo, $command->description, $command->pagamento, $command->facebook, $command->instagram, $command->maisPedido, $command->extras
		);
		$this->truckRepository->save($truck);
		$this->dispatchEventsFor($truck);
		return $truck;
	}

}