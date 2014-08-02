<?php

use Foodtrucker\Forms\ContatoForm;
use Foodtrucker\Spots\SpotRepository;

class PagesController extends BaseController {

	private $contatoForm;
	private $spotRepository;

	function __construct( ContatoForm $contatoForm, SpotRepository $spotRepository) {
		$this->contatoForm = $contatoForm;
		$this->spotRepository = $spotRepository;
	}

	public function contato_index()
	{
		$data['title'] = 'Contato';
		$spots = $this->spotRepository->getSpotsActive();
		return View::make('front.pages.contato', compact('data', 'spots'));
	}

	public function contato_post(){
		$this->contatoForm->validate(Input::all());
		dd(Input::all());
	}

	public function sobre_index(){
		$data['title'] = 'Sobre Nós';
		$spots = $this->spotRepository->getSpotsActive();
		return View::make('front.pages.sobre', compact('data', 'spots'));
	}


}
