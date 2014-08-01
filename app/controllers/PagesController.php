<?php

use Foodtrucker\Forms\ContatoForm;

class PagesController extends BaseController {


	/**
	 * @var ContatoForm
	 */
	private $contatoForm;

	function __construct( ContatoForm $contatoForm) {
		$this->contatoForm = $contatoForm;
	}

	public function contato_index()
	{
		$data['title'] = 'Contato';
		return View::make('front.pages.contato', compact('data'));
	}

	public function contato_post(){
		$this->contatoForm->validate(Input::all());
		dd(Input::all());
	}

	public function sobre_index(){
		$data['title'] = 'Sobre Nós';
		return View::make('front.pages.sobre', compact('data'));
	}


}
