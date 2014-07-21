<?php

use Foodtrucker\Core\CommandBus;
use Foodtrucker\Forms\NewSpotForm;
use Foodtrucker\Spots\AddSpot\AddSpotCommand;
use Foodtrucker\Spots\Spot;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Tags\AddTagCommand;
use Foodtrucker\Tags\AddTagTruckCommand;

class Admin_SpotController extends BaseController {

	use CommandBus;
	private $newSpotForm;
	private $spotRepository;
	private $spot;

	function __construct( NewSpotForm $newSpotForm, SpotRepository $spotRepository, Spot $spot) {
		$this->newSpotForm = $newSpotForm;
		$this->spotRepository = $spotRepository;
		$this->spot = $spot;
	}

	public function index(){
		$data['spots'] = $this->spotRepository->getSpots();
		return View::make('back.pages.spots', compact('data'));
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
