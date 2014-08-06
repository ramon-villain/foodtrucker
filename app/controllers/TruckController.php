<?php

//use Foodtrucker\Eventos\EventosRepository;
//use Foodtrucker\Forms\ContatoForm;
//use Foodtrucker\Spots\SpotRepository;

use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Trucks\TruckRepository;

class TrucksController extends BaseController {

//	private $contatoForm;
	private $spotRepository;
//	private $eventosRepository;
//
	/**
	 * @var TruckRepository
	 */
	private $truckRepository;

	function __construct( TruckRepository $truckRepository, SpotRepository $spotRepository) {
//		$this->contatoForm = $contatoForm;
		$this->spotRepository = $spotRepository;
//		$this->eventosRepository = $eventosRepository;
		$this->truckRepository = $truckRepository;
	}

	public function index()
	{
		$data['title'] = 'Trucks';
		$spots = $this->spotRepository->getSpotsActive();
		$trucks = $this->truckRepository->getTrucks();
		$cats = $this->truckRepository->getCategorias();
		$data['trucks'] = $this->truckRepository->getTrucksName();
		return View::make('front.pages.trucks', compact('data', 'spots', 'cats', 'trucks'));
	}

	public function truck($slug){
		$cats = $this->truckRepository->getCategorias();
		$truck = $this->truckRepository->getTruckBySlug($slug);
		$data['title'] = $truck->nome;
		$spots = $this->spotRepository->getSpotsActiveTruck($truck->id);
		$truck->cat_id = $this->truckRepository->getCategoriaNameById($truck->cat_id);
		$truck->site = ($truck->site ? $truck->site : null);
		$imagens = unserialize($truck->imagens);
		$servico = unserialize($truck->pagamento);
		return View::make('front.pages.truck', compact('data', 'truck', 'imagens', 'spots', 'servico', 'cats'));
	}

}
