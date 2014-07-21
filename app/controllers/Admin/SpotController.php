<?php

use Foodtrucker\Core\CommandBus;
use Foodtrucker\Forms\NewSpotForm;
use Foodtrucker\Spots\AddSpot\AddSpotCommand;

class Admin_SpotController extends BaseController {

	use CommandBus;
	private $newSpotForm;

	function __construct( NewSpotForm $newSpotForm) {
		$this->newSpotForm = $newSpotForm;
	}

	public function store()
	{
		$this->newSpotForm->validate(Input::all());
		extract(Input::only('truck','address','start', 'end', 'description', 'tags'));
		$this->execute( new AddSpotCommand($truck,$address,$start,$end,$description, $tags));
		return Redirect::back();
//		var_dump($spot);

	}

}
