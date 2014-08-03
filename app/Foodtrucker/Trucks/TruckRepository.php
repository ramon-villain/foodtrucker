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
	public function getTruckById($id){
		return Truck::where('id', $id)->first();
	}

	public function updateTruck($id, $nome, $logo, $description,$pagamento, $facebook, $instagram, $maisPedido, $extras) {
		return Truck::where('id', $id)->update([
			'nome' => $nome,
			'logo' => $logo,
			'description' => $description,
			'pagamento' => $pagamento,
			'facebook' => $facebook,
			'instagram' => $instagram,
			'maisPedido' => $maisPedido,
			'extras' => $extras
		]);
	}

	public function getActualImage( $id ) {
		return Truck::where('id', $id)->pluck('logo');
	}

} 