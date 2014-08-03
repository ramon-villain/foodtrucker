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
		$nome = md5(time()).'.'.$image->getClientOriginalExtension();
		$image->move($path, $nome);
		return $final_image = $path."/".$nome;
	}

	public function edit($id){
		$data['truck'] = $this->truckRepository->getTruckById($id);
		$data['title'] = 'Editando '. $data['truck']->nome;
		return View::make('back.pages.truck_edit', compact('data'));
	}

	public function update($id){
		extract(Input::only('nome', 'logo', 'description', 'pagamento', 'facebook', 'instagram', 'maisPedido', 'extras'));
		if(Input::hasFile('logo')){
			$logo = $this->extractImagem(Input::file('logo'));
		}else{
			$logo = $this->truckRepository->getActualImage($id);
		}
		$this->truckRepository->updateTruck($id, $nome, $logo, $description,$pagamento, $facebook, $instagram, $maisPedido, $extras);
		return Redirect::back();
	}

}
