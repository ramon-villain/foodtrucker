<?php

use Foodtrucker\BannersHome\AddBannerCommand;
use Foodtrucker\BannersHome\BannerRepository;
use Foodtrucker\Configs\ConfigRepository;
use Foodtrucker\Configs\SetFeatured\SetFeaturedCommand;
use Foodtrucker\Eventos\EventosRepository;
use Foodtrucker\Forms\EventoForm;
use Foodtrucker\Forms\FeaturedHomeForm;
use Foodtrucker\Forms\BannerHomeForm;

class Admin_EventoController extends BaseController {


	private $eventosRepository;
	/**
	 * @var EventoForm
	 */
	private $eventoForm;

	function __construct( EventosRepository $eventosRepository, EventoForm $eventoForm
	) {
		$this->eventosRepository = $eventosRepository;
		$this->eventoForm = $eventoForm;
	}

	public function index()
	{
		$data['title'] = 'Eventos';
		$data['eventos'] = $this->eventosRepository->getEventos();
		return View::make('back.pages.eventos', compact('data'));
	}

	public function store(){
		$this->eventoForm->validate(Input::all());
		extract(Input::only('nome', 'local', 'imagem', 'data', 'description'));
		$img = $this->extractLogo($imagem);
		$this->eventosRepository->save($nome, $local, $img, $data, $description);
		return Redirect::back();
	}

	private function extractLogo( $image ) {
		$path = 'images/eventos';
		$nome = md5(time()).'.'.$image->getClientOriginalExtension();
		$image->move($path, $nome);
		return $final_image = $path."/".$nome;
	}
}
