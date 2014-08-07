<?php

use Foodtrucker\Forms\NewSpotForm;
use Foodtrucker\Spots\AddSpot\AddSpotCommand;
use Foodtrucker\Spots\Spot;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Tags\AddTagCommand;
use Foodtrucker\Tags\AddTagTruckCommand;
use Foodtrucker\Tags\TagTruckRepository;
use Foodtrucker\Trucks\Truck;
use Foodtrucker\Trucks\TruckRepository;

class Admin_SpotController extends BaseController {

	private $newSpotForm;
	private $spotRepository;
	private $spot;
	/**
	 * @var TruckRepository
	 */
	private $truckRepository;
	/**
	 * @var TagTruckRepository
	 */
	private $tagTruckRepository;

	function __construct( NewSpotForm $newSpotForm, SpotRepository $spotRepository, Spot $spot, TruckRepository $truckRepository, TagTruckRepository $tagTruckRepository) {
		$this->newSpotForm = $newSpotForm;
		$this->spotRepository = $spotRepository;
		$this->spot = $spot;
		$this->truckRepository = $truckRepository;
		$this->tagTruckRepository = $tagTruckRepository;
	}

	public function index(){
		$data['spots'] = $this->spotRepository->getSpots();
		foreach ($data['spots'] as $spot){
			$spot['truck_id'] = Truck::where('id', $spot['truck_id'])->pluck('nome');
		}
		$data['trucks'] = $this->truckRepository->getTrucksName();
		return View::make('back.pages.spots', compact('data'));
	}

	public function store()
	{
		$this->newSpotForm->validate(Input::all());
		extract(Input::only('truck_id','endereco','inicio', 'fim', 'description', 'tags'));
		$truck_id = $this->getTruckIDfromName($truck_id);
		$this->execute( new AddSpotCommand($truck_id->id,$endereco,$inicio,$fim,$description));
		$this->execute( new AddTagCommand($tags));
		$this->execute( new AddTagTruckCommand($tags,$this->spotRepository->getThisId($this->spot),$truck_id->id));
		return Redirect::back();
	}

	private function getTruckIDfromName( $truck ) {
		$trucks = $this->truckRepository->getTrucksName();
		return $this->truckRepository->getTruckByName($trucks[$truck]);
	}

	public function edit($id){
		$data['trucks'] = $this->truckRepository->getTrucksName();
		$data['tags'] = $this->tagTruckRepository->getTagsSpot($id);
		$data['spot'] = $this->spotRepository->getSpotById($id);
		$data['title'] = 'Editando Spot';
		$data['spot']['truck_id'] = $data['spot']['truck_id'] - 1;
		return View::make('back.pages.spots_edit', compact('data'));
	}

	public function update($id){
		extract(Input::only('truck_id','endereco','inicio', 'fim', 'description', 'tags'));
		$truck_id = $this->getTruckIDfromName($truck_id);
		$this->spotRepository->updateSpot($id, $truck_id, $endereco, $inicio, $fim, $description);
		$this->tagTruckRepository->updateTagsSpot($id, $tags);
		return Redirect::back();
	}

}
