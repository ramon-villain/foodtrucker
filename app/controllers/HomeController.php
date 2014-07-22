<?php

use Foodtrucker\Configs\ConfigRepository;

class HomeController extends BaseController {

	protected $configRepository;

	function __construct( ConfigRepository $configRepository ) {
		$this->configRepository = $configRepository;
	}

	public function index()
	{
		$featured = $this->configRepository->getFeatured();
		if($featured == null){
			$featured = new \Foodtrucker\Configs\SetFeaturedCommand('https://res.cloudinary.com/enjoei/image/upload/c_fill,h_330,w_276/avvdeqvbnj0omkxnvuub','https://res.cloudinary.com/enjoei/image/upload/c_fill,h_330,w_276/avvdeqvbnj0omkxnvuub        ','Food Trucker','Em Destaque');
			Session::forget('modal');
		}
		return View::make('front.pages.home', compact('featured'));
	}

}
