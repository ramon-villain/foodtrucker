<?php

use Foodtrucker\Configs\ConfigRepository;

class HomeController extends BaseController {

	protected $configRepository;

	function __construct( ConfigRepository $configRepository ) {
		$this->configRepository = $configRepository;
	}

	public function index()
	{
		$data = $this->configRepository->getFeatured();
		return View::make('front.pages.home', compact('data'));
	}

}
