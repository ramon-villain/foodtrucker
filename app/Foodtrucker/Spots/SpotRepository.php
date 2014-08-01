<?php
namespace Foodtrucker\Spots;

use Foodtrucker\Trucks\Truck;

class SpotRepository {

	private $spot;

	function __construct(Spot $spot) {
		$this->spot = $spot;
	}

	public function save(Spot $spot){
		return $spot->save();
	}

	public function getThisId(Spot $spot) {
		return $spot->orderBy('id','desc')->pluck('id');
	}

	public function getSpots() {
		return $this->spot->orderBy('created_at', 'desc')->get();
	}

	public function getSpotsId(){
		return $this->getSpots()->lists('id');
	}

	public function getSpotById($id){
		return Spot::where('id', $id)->first();
	}

	public function updateSpot($id, $truck_id, $endereco, $inicio, $fim, $description) {
		$data = $this->getDayAndBegin($inicio, $fim);
		return Spot::where('id', $id)->update([
			'truck_id' => $truck_id,
			'abertura'  => $data['inicioDay'],
			'encerramento'  => $data['fimDay'],
			'inicio'    => $data['inicioTime'],
			'fim'    => $data['fimTime'],
			'local' => $endereco,
			'description' => $description
		]);
	}

	public function getDayAndBegin( $command_inicio, $command_fim ) {
		$inicio    = explode( ' ', $command_inicio );
		$data['inicioDay'] = trim($inicio[0]);
		$data['inicioTime']    = trim($inicio[1]);

		$fim    = explode( ' ', $command_fim );
		$data['fimDay'] = trim($fim[0]);
		$data['fimTime']    = trim( $fim[1] );
		return $data;
	}

} 