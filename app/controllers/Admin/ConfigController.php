<?php

use Foodtrucker\Configs\ConfigRepository;

class Admin_ConfigController extends BaseController {

	/**
	 * @var ConfigRepository
	 */
	private $configRepository;

	function __construct( ConfigRepository $configRepository) {
		$this->configRepository = $configRepository;
	}

	public function index()
	{
		$data = $this->configRepository->getFeatured();
		if(!$data){
			$data['titulo'] = $data['body'] =  $data['image'] = '';
		}
		return View::make('back.pages.config', compact('data'));
	}

	public function featuredPost(){
		dd(Input::all());
	}

}
