<?php

use Foodtrucker\Forms\RegistrationForm;
use Foodtrucker\Users\Registration\RegisterUserCommand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Foodtrucker\Core\CommandBus;

class RegistrationController extends BaseController {

	use CommandBus;
	private $registrationForm;

	function __construct( RegistrationForm $registrationForm){
		$this->beforeFilter('guest');
		$this->registrationForm = $registrationForm;

	}

	public function index()
	{
		return View::make('front.pages.register');
	}

	public function store()
	{
		$this->registrationForm->validate(Input::all());
		extract(Input::only('nome','sobrenome','email', 'password'));
		$user = $this->execute( new RegisterUserCommand($nome, $sobrenome, $email,  $password) );
		Auth::login($user);

		return Redirect::home();
	}
}
