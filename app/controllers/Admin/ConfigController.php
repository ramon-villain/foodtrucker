<?php

use Foodtrucker\BannersHome\AddBannerCommand;
use Foodtrucker\BannersHome\BannerRepository;
use Foodtrucker\Configs\ConfigRepository;
use Foodtrucker\Configs\SetFeatured\SetFeaturedCommand;
use Foodtrucker\Forms\FeaturedHomeForm;
use Foodtrucker\Forms\BannerHomeForm;

class Admin_ConfigController extends BaseController {
	/**
	 * @var ConfigRepository
	 */
	private $configRepository;
	/**
	 * @var FeaturedHomeForm
	 */
	private $featuredHomeForm;
	/**
	 * @var BannerHomeForm
	 */
	private $bannerHomeForm;
	/**
	 * @var BannerRepository
	 */
	private $bannerRepository;

	function __construct( ConfigRepository $configRepository, FeaturedHomeForm $featuredHomeForm, BannerHomeForm $bannerHomeForm, BannerRepository $bannerRepository) {
		$this->configRepository = $configRepository;
		$this->featuredHomeForm = $featuredHomeForm;
		$this->bannerHomeForm = $bannerHomeForm;
		$this->bannerRepository = $bannerRepository;
	}

	public function index()
	{
		$data['title'] = 'Configurações';
		$featured = $this->configRepository->getFeatured();
		if($featured == null){
			$featured = new SetFeaturedCommand('','','','');
			Session::forget('modal');
		}
		$banners = $this->bannerRepository->getBanners();
		$data['modal'] = (Session::get('modal') == null ? 'false' : 'true');
		$data['imagemDestaque'] = Session::get('img');
		return View::make('back.pages.config', compact('data', 'featured', 'banners'));
	}

	public function featuredPost(){
		$this->featuredHomeForm->validate(Input::all());
		if(Input::hasFile('image')){
			$image = Input::file('image');
			$path = 'images/featured';
			$image->move($path, $image->getClientOriginalName());
			$final_image = $path."/".$image->getClientOriginalName();
			$img = Image::make($final_image);
			$img->resize(768, null, function ($constraint) {
				$constraint->aspectRatio();
			});
			$img->save($final_image);
			Session::put( 'modal', 'true' );
		}else{
			$final_image = Input::get('image_bckp');
		}
		Session::put('img', $final_image);
		extract(Input::only('image','image_bckp','body','title'));
		$this->execute(new SetFeaturedCommand($final_image, $image_bckp, $body, $title));
		return Redirect::route('config_admin_path');
	}

	public function cropImage(){
		Session::forget( 'modal' );
		$imageFinal = Session::get('img');
		$img = Image::make($imageFinal);

		$img->crop(intval(Input::get('w')), intval(Input::get('h')), intval(Input::get('x')), intval(Input::get('y')));
		$img->fit(250);
		$img->save($imageFinal);
		return Redirect::route('config_admin_path');
	}

	public function addBanner(){
		$data['imagemBanner'] = Session::get('img');
		$data['modal'] = (Session::get('modal') == null ? 'false' : 'true');
		return View::make('back.pages.banner', compact('data'));
	}

	public function bannerPost(){
		$this->bannerHomeForm->validate(Input::all());
		if(Input::hasFile('image')){
			$image = Input::file('image');
			$path = 'images/banners';
			$image->move($path, $image->getClientOriginalName());
			$final_image = $path."/".$image->getClientOriginalName();
			$img = Image::make($final_image);
			$img->resize(768, null, function ($constraint) {
				$constraint->aspectRatio();
			});
			$img->save($final_image);
			Session::put( 'modal', 'true' );
		}else{
			$final_image = Input::get('image_bckp');
		}
		Session::put('img', $final_image);
		extract(Input::only('image','image_bckp','body','url'));
		$this->execute(new AddBannerCommand($final_image, $url, $body));
		return Redirect::back();
	}
	public function cropBanner(){
		Session::forget( 'modal' );
		$imageFinal = Session::get('img');
		$img = Image::make($imageFinal);

		$img->crop(intval(Input::get('w')), intval(Input::get('h')), intval(Input::get('x')), intval(Input::get('y')));
		$img->fit(404, 245);
		$img->save($imageFinal);
		return Redirect::route('config_admin_path');
	}

//	public function bannerPost(){
//		Session::forget( 'img_featured' );
//		$this->bannerHomeForm->validate(Input::all());
//		if(Input::hasFile('image')){
//			$image = Input::file('image');
//			$path = 'images/banner';
//			$image->move($path, $image->getClientOriginalName());
//			$final_image = $path."/".$image->getClientOriginalName();
//			$img = Image::make($final_image);
//			$img->resize(768, null, function ($constraint) {
//				$constraint->aspectRatio();
//			});
//			$img->save($final_image);
//			Session::put( 'modal', 'true' );
//		}else{
//			$final_image = Input::get('image_bckp');
//		}
//		Session::put('img_banner', $final_image);
//		extract(Input::only('image','image_bckp','body','title'));
//		$this->execute(new SetFeaturedCommand($final_image, $image_bckp, $body, $title));
//		return Redirect::route('config_admin_path');
//	}

}
