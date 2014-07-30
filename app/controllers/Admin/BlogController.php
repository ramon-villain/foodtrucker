<?php

class Admin_BlogController extends BaseController {

	public function index(){
		$data['title'] = 'Blog';
		$data['posts'] = null;
		return View::make('back.pages.blog', compact('data'));
	}

	public function store(){
		return Redirect::back();
	}

}
