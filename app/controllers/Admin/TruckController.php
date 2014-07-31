<?php

use Foodtrucker\Forms\newTruckForm;
use Foodtrucker\Spots\Spot;
use Foodtrucker\Trucks\AddTruck\AddTruckCommand;
use Foodtrucker\Trucks\TruckRepository;

class Admin_TruckController extends BaseController {

	private $truckRepository;
	private $spot;
	private $newTruckForm;

	function __construct( NewTruckForm $newTruckForm, TruckRepository $truckRepository, Spot $spot) {
		$this->truckRepository = $truckRepository;
		$this->spot = $spot;
		$this->newTruckForm = $newTruckForm;
	}

	public function index(){
		$data['title']  = 'Trucks';
		$data['trucks'] = $this->truckRepository->getTrucks();
		return View::make('back.pages.trucks', compact('data'));
	}

	public function store()
	{
		$this->newTruckForm->validate(Input::all());
		extract(Input::only('nome', 'logo','description','pagamento','facebook','instagram', 'maisPedido', 'extras'));
		$logo = $this->extractLogo(Input::file('logo'));
		$this->execute( new AddTruckCommand($nome, $logo, $description, $pagamento, $facebook, $instagram , $maisPedido, $extras));
		return Redirect::back();
	}

	private function extractLogo( $image ) {
		$path = 'images/trucks/logos';
		$image->move($path, $image->getClientOriginalName());
		return $final_image = $path."/".$image->getClientOriginalName();
	}

}
