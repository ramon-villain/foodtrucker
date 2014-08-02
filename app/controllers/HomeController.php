<?php

use Foodtrucker\BannersHome\BannerRepository;
use Foodtrucker\Configs\ConfigRepository;
use Foodtrucker\Configs\SetFeatured\SetFeaturedCommand;
use Foodtrucker\Forms\NewsletterForm;
use Foodtrucker\Spots\SpotRepository;

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

	function __construct( ConfigRepository $configRepository, BannerRepository $bannerRepository, NewsletterForm $newsletterForm, SpotRepository $spotRepository) {
		$this->configRepository = $configRepository;
		$this->bannerRepository = $bannerRepository;
		$this->newsletterForm = $newsletterForm;
		$this->spotRepository = $spotRepository;
	}

	public function index()
	{
		$spots = $this->spotRepository->getSpotsActive();
		$featured = $this->configRepository->getFeatured();
		$banners = $this->bannerRepository->getBanners(5);
		if($featured == null){
			$featured = new SetFeaturedCommand('https://res.cloudinary.com/enjoei/image/upload/c_fill,h_330,w_276/avvdeqvbnj0omkxnvuub','https://res.cloudinary.com/enjoei/image/upload/c_fill,h_330,w_276/avvdeqvbnj0omkxnvuub        ','Food Trucker','Em Destaque');
			Session::forget('modal');
		}
		$mensagem = (Session::get('message') ? Session::get('message') : null);
		return View::make('front.pages.home', compact('featured', 'banners', 'spots', 'mensagem'));
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
