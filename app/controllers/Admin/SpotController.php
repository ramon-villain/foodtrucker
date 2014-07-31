<?php

use Foodtrucker\Forms\NewSpotForm;
use Foodtrucker\Spots\AddSpot\AddSpotCommand;
use Foodtrucker\Spots\Spot;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Tags\AddTagCommand;
use Foodtrucker\Tags\AddTagTruckCommand;
use Foodtrucker\Trucks\TruckRepository;

class Admin_SpotController extends BaseController {

	private $newSpotForm;
	private $spotRepository;
	private $spot;
	/**
	 * @var TruckRepository
	 */
	private $truckRepository;

	function __construct( NewSpotForm $newSpotForm, SpotRepository $spotRepository, Spot $spot, TruckRepository $truckRepository) {
		$this->newSpotForm = $newSpotForm;
		$this->spotRepository = $spotRepository;
		$this->spot = $spot;
		$this->truckRepository = $truckRepository;
	}

	public function index(){
		$data['spots'] = $this->spotRepository->getSpots();
		$data['trucks'] = $this->truckRepository->getTrucksName();
		return View::make('back.pages.spots', compact('data'));
	}

	public function store()
	{
		$this->newSpotForm->validate(Input::all());
		extract(Input::only('truck','endereco','inicio', 'fim', 'description', 'tags'));
		$truck = $this->getTruckIDfromName($truck);
		$this->execute( new AddSpotCommand($truck,$endereco,$inicio,$fim,$description));
		$this->execute( new AddTagCommand($tags));
		$this->execute( new AddTagTruckCommand($tags,$this->spotRepository->getThisId($this->spot),$truck));
		return Redirect::back();
	}

	private function getTruckIDfromName( $truck ) {
		return $truck + 1;
	}

}
