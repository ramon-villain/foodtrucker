<?php

use Foodtrucker\Core\CommandBus;
use Foodtrucker\Forms\NewSpotForm;
use Foodtrucker\Spots\AddSpot\AddSpotCommand;
use Foodtrucker\Spots\Spot;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Tags\AddTagCommand;
use Foodtrucker\Tags\AddTagTruckCommand;
use Foodtrucker\Trucks\TruckRepository;

class Admin_TruckController extends BaseController {

	use CommandBus;
	private $newSpotForm;
	private $truckRepository;
	private $spot;

	function __construct( NewSpotForm $newSpotForm, TruckRepository $truckRepository, Spot $spot) {
		$this->newSpotForm = $newSpotForm;
		$this->truckRepository = $truckRepository;
		$this->spot = $spot;
	}

	public function index(){
		$data['title']  = 'Trucks';
		$data['trucks'] = $this->truckRepository->getTrucks();
		return View::make('back.pages.trucks', compact('data'));
	}

	public function store()
	{
		$this->newSpotForm->validate(Input::all());
		extract(Input::only('truck','endereco','inicio', 'fim', 'description', 'tags'));
		$this->execute( new AddSpotCommand($truck,$endereco,$inicio,$fim,$description));
		$this->execute( new AddTagCommand($tags));
		$this->execute( new AddTagTruckCommand($tags,$this->spotRepository->getThisId($this->spot),$truck));
		return Redirect::back();
	}

}
