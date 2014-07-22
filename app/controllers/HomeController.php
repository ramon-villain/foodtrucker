<?php

use Illuminate\Support\Facades\Session;

class HomeController extends BaseController {

	public function index()
	{
		return View::make('front.pages.home');
	}

}
