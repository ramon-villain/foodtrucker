<?php

use Foodtrucker\BannersHome\BannerRepository;
use Foodtrucker\Configs\ConfigRepository;
use Foodtrucker\Configs\SetFeatured\SetFeaturedCommand;
use Foodtrucker\Forms\NewsletterForm;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Trucks\TruckRepository;

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
	/**
	 * @var SpotRepository
	 */
	private $spotRepository;
	/**
	 * @var TruckRepository
	 */
	private $truckRepository;

	function __construct( ConfigRepository $configRepository, BannerRepository $bannerRepository, NewsletterForm $newsletterForm, SpotRepository $spotRepository, TruckRepository $truckRepository) {
		$this->configRepository = $configRepository;
		$this->bannerRepository = $bannerRepository;
		$this->newsletterForm = $newsletterForm;
		$this->spotRepository = $spotRepository;
		$this->truckRepository = $truckRepository;
	}

	public function index()
	{
		$spots = $this->spotRepository->getSpotsActive();
		$featured = $this->configRepository->getFeatured();
		$banners = $this->bannerRepository->getBanners(5);
		$last_truck = $this->truckRepository->getTruckById('last');
		$imagens = unserialize($last_truck->imagens);
		if($featured == null){
			$featured = new SetFeaturedCommand('https://res.cloudinary.com/enjoei/image/upload/c_fill,h_330,w_276/avvdeqvbnj0omkxnvuub','https://res.cloudinary.com/enjoei/image/upload/c_fill,h_330,w_276/avvdeqvbnj0omkxnvuub        ','Food Trucker','Em Destaque');
			Session::forget('modal');
		}
		return View::make('front.pages.home', compact('featured', 'banners', 'spots', 'last_truck', 'imagens'));
	}

	public function newsletter(){
		$email = Input::get('email');
		DB::table('newsletter_users')->insert([
			'email'         => $email,
			'created_at'    => new DateTime,
			'updated_at'    => new DateTime
		]);
		return Redirect::back()->with('message','Email Cadastrado com Sucesso!');
	}


}
