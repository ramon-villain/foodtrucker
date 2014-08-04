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
		$data['title'] = 'Contato';
		$spots = $this->spotRepository->getSpotsActive();
		return View::make('front.pages.contato', compact('data', 'spots'));
	}

	public function truck($slug){

		$truck = $this->truckRepository->getTruckBySlug($slug);
		$data['title'] = $truck->nome;
		$spots = $this->spotRepository->getSpotsActiveTruck($truck->id);
		$truck->cat_id = $this->truckRepository->getCategoriaNameById($truck->cat_id);
		$truck->site = ($truck->site ? $truck->site : null);
		$imagens = unserialize($truck->imagens);
		return View::make('front.pages.truck', compact('data', 'truck', 'imagens', 'spots'));
	}

}
