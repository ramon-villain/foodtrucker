<?php

class Admin_AdminController extends BaseController {

	public function dashboard()
	{
		return View::make('back.pages.dashboard');
	}

}
