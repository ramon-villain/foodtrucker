<?php

use Foodtrucker\BannersHome\BannerRepository;
use Foodtrucker\Configs\ConfigRepository;
use Foodtrucker\Configs\SetFeatured\SetFeaturedCommand;
use Foodtrucker\Forms\NewsletterForm;

class HomeController extends BaseController {

	protected $configRepository;
	/**
	 * @var BannerRepository
	 */
	private $bannerRepository;
	/**
	 * @var NewsletterForm
	 */
	private $newsletterForm;

	function __construct( ConfigRepository $configRepository, BannerRepository $bannerRepository, NewsletterForm $newsletterForm) {
		$this->configRepository = $configRepository;
		$this->bannerRepository = $bannerRepository;
		$this->newsletterForm = $newsletterForm;
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

	public function newsletter(){
		dd(Input::all());
		$newsletter = $this->newsletterForm->validate(Input::all());
	}

}
