<?php

use Foodtrucker\Core\CommandBus;
use Foodtrucker\Forms\NewSpotForm;
use Foodtrucker\Spots\AddSpot\AddSpotCommand;
use Foodtrucker\Spots\SpotRepository;

class Admin_SpotController extends BaseController {

	use CommandBus;
	private $newSpotForm;
	private $spotRepository;

	function __construct( NewSpotForm $newSpotForm, SpotRepository $spotRepository) {
		$this->newSpotForm = $newSpotForm;
		$this->spotRepository = $spotRepository;
	}

	public function index(){
		$data['spots'] = $this->spotRepository->getSpots();
		return View::make('back.pages.spots', compact('data'));
	}

	public function store()
	{
		$this->newSpotForm->validate(Input::all());
		extract(Input::only('truck','endereco','inicio', 'fim', 'description', 'tags'));
		$this->execute( new AddSpotCommand($truck,$endereco,$inicio,$fim,$description, $tags));
		return Redirect::back();
	}

}
