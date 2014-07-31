<?php


use Foodtrucker\Forms\ContatoForm;

class ContatoController extends BaseController {


	/**
	 * @var ContatoForm
	 */
	private $contatoForm;

	function __construct( ContatoForm $contatoForm) {
		$this->contatoForm = $contatoForm;
	}

	public function index()
	{
		$data['title'] = 'Contato';
		return View::make('front.pages.contato', compact('data'));
	}

	public function post(){
		$this->contatoForm->validate(Input::all());
		dd(Input::all());
	}


}
