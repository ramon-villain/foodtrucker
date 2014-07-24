<?php

use Foodtrucker\BannersHome\BannerRepository;
use Foodtrucker\Configs\ConfigRepository;
use Foodtrucker\Configs\SetFeatured\SetFeaturedCommand;

class HomeController extends BaseController {

	protected $configRepository;
	/**
	 * @var BannerRepository
	 */
	private $bannerRepository;

	function __construct( ConfigRepository $configRepository, BannerRepository $bannerRepository) {
		$this->configRepository = $configRepository;
		$this->bannerRepository = $bannerRepository;
	}

	public function index()
	{
		$featured = $this->configRepository->getFeatured();
		$banners = $this->bannerRepository->getBanners(5);
		if($featured == null){
			$featured = new SetFeaturedCommand('https://res.cloudinary.com/enjoei/image/upload/c_fill,h_330,w_276/avvdeqvbnj0omkxnvuub','https://res.cloudinary.com/enjoei/image/upload/c_fill,h_330,w_276/avvdeqvbnj0omkxnvuub        ','Food Trucker','Em Destaque');
			Session::forget('modal');
		}
		return View::make('front.pages.home', compact('featured', 'banners'));
	}

}
