<?php

use Foodtrucker\Eventos\EventosRepository;
use Foodtrucker\Forms\ContatoForm;
use Foodtrucker\Spots\SpotRepository;

class PagesController extends BaseController {

	private $contatoForm;
	private $spotRepository;
	private $eventosRepository;

	function __construct( ContatoForm $contatoForm, SpotRepository $spotRepository, EventosRepository $eventosRepository) {
		$this->contatoForm = $contatoForm;
		$this->spotRepository = $spotRepository;
		$this->eventosRepository = $eventosRepository;
	}

	public function contato_index()
	{
		$data['title'] = 'Contato';
		$spots = $this->spotRepository->getSpotsActive();
		return View::make('front.pages.contato', compact('data', 'spots'));
	}

	public function contato_post(){
		$this->contatoForm->validate(Input::all());
//		$data = ['name'=>Input::get('nome'),'sender'=>Input::get('email_contato'),'notes'=>Input::get('mensagem'), 'telefone' => Input::get('telefone')];
//		$user = array(
//			'email'=>'ramon.villain@gmail.com',
//			'name'=>'Ramon Villain'
//		);
		$data = Input::all();
		Mail::send('emails.contato',$data, function($message)
		{
			$message->to('ramon.villain@gmail.com')->subject('Welcome!');
		});


		return Redirect::back()->with('message', 'Email enviado com sucesso!');
	}

	public function sobre_index(){
		$data['title'] = 'Sobre Nós';
		$spots = $this->spotRepository->getSpotsActive();
		return View::make('front.pages.sobre', compact('data', 'spots'));
	}

	public function eventos_index(){
		$data['title'] = 'Eventos';
		$spots = $this->spotRepository->getSpotsActive();
		$eventos = $this->eventosRepository->getEventosActive();
		return View::make('front.pages.eventos', compact('data', 'spots', 'eventos'));
	}

	public function cadastro_index(){
		$data['title'] = 'Cadastre seu truck';
		return View::make('front.pages.cadastre_truck', compact('data', 'spots', 'eventos'));
	}


}
