<?php
namespace Foodtrucker\Spots;

use DateTime;
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
		$data['inicioDay'] = gmdate("Y-m-d", strtotime(trim($inicio[0])));
		$data['inicioTime']    = trim($inicio[1]);

		$fim    = explode( ' ', $command_fim );
		$data['fimDay'] = trim($fim[0]);
		$data['fimTime']    = trim( $fim[1] );
		return $data;
	}

	public function getSpotsActiveHoje() {
		$trucks = Truck::lists('id');
		$spots = [];
		for($i=0; $i < count($trucks); $i++){
			$get = $this->spot->where('active', 1)->where('abertura', '=', new DateTime('today'))->where('truck_id', $trucks[$i])->orderBy('abertura', 'asc')->get()->toArray();
			if($get){
				array_push($get, Truck::where('id', $trucks[$i])->pluck('nome'));
				$spots[] = $get;
			}
		}
		return $spots;
	}

	public function getSpotsActive() {
		return Truck::with(['spots' => function($query){
			$query->where('abertura', '>=', new DateTime('today'))->where('active', 1);
		}])->get()->toArray();
	}

	public function getSpotsActiveTruck($id){
		return Truck::where('id', $id)->with(['spots' => function($query) use ($id){
			$query->where('abertura', '>=', new DateTime('today'))->where('active', 1)->where('truck_id', $id);
		}])->get()->toArray();
	}

	public function getLastId() {
		return Spot::orderBy('id', 'desc')->pluck('id');
	}

	public function addLatLong( $endereco, $lat, $long, $spot ) {
		return \DB::table('spot_details')->insert([
				'address' => $endereco,
				'lat'   => $lat,
				'long'  => $long,
				'spot_id'   =>$spot
		]);
	}

	public function getFutureSpotsActive() {
		$trucks = Truck::lists('id');
		$spots = [];
		for($i=0; $i < count($trucks); $i++){
			$get = $this->spot->where('active', 1)->where('abertura', '>', new DateTime('today'))->where('truck_id', $trucks[$i])->orderBy('abertura', 'asc')->get()->toArray();
			if($get){
				array_push($get, Truck::where('id', $trucks[$i])->pluck('nome'));
				$spots[] = $get;
			}
		}
		return $spots;
	}

} 