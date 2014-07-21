<?php
use Foodtrucker\Forms\LoginForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class LoginController extends BaseController {

	private $form;

	function __construct( LoginForm $form) {
		$this->beforeFilter('guest', ['except' => 'logout']);
		$this->form = $form;
	}

	public function index()
	{
		return View::make('front.pages.login');
	}

	public function store()
	{
		$input =  Input::only('email', 'password');
		$this->form->validate($input);
		if(Auth::attempt($input)){
			return Redirect::to('admin/dashboard');
		}
	}

	public function logout(){
		Auth::logout();
		return Redirect::home();
	}
}
