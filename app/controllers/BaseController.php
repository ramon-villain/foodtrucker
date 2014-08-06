<?php

use Foodtrucker\Core\CommandBus;

class BaseController extends Controller {
	use CommandBus;
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
		View::share('currentUser', Auth::user());
		$mensagem = (Session::get('message') ? Session::get('message') : null);
		View::share('message', $mensagem);
	}

}
