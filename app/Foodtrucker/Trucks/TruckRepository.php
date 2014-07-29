<?php
namespace Foodtrucker\Trucks;

class TruckRepository {

	private $truck;

	function __construct(Truck $truck) {
		$this->truck = $truck;
	}

	public function save(Truck $truck){
		return $truck->save();
	}

	public function getThisId(Truck $truck) {
		return $truck->orderBy('id','desc')->pluck('id');
	}

	public function getTrucks() {
		return $this->truck->orderBy('created_at', 'desc')->get();
	}

	public function getTrucksId(){
		return $this->getTrucks()->lists('id');
	}

	public function getTrucksName(){
		return Truck::lists('nome');
	}

} 