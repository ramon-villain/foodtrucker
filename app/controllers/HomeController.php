<?php

use Illuminate\Support\Facades\Session;

class HomeController extends BaseController {

	public function index()
	{
		return View::make('front.pages.home');
	}

	public function teste(){
//
		return View::make('front.pages.teste');
	}

	public function testeUp(){
		$image = Input::file('imagem');
		$path = 'images/logos';
		$image->move($path, $image->getClientOriginalName());
		$imageFinal = $path."/".$image->getClientOriginalName();
		return View::make('front.pages.teste', compact('imageFinal'));
	}

	public function testeCrop(){
//		dd(Input::all());
		$imageFinal = Input::get('src');
		$img = Image::make($imageFinal);

		$img->crop(intval(Input::get('w')), intval(Input::get('h')), intval(Input::get('x')), intval(Input::get('y')));
		$img->fit(100);
//		$img->resize(null, 200, function ($constraint) {
//			$constraint->aspectRatio();
//		});
//		$img->fit(200);
		$img->save(Input::get('src'));
//		$imageFinal = 'images/logos/bar.jpg';
		return View::make('front.pages.teste', compact('imageFinal'));
	}
}
