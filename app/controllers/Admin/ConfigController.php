<?php

use Foodtrucker\Configs\ConfigRepository;
use Foodtrucker\Configs\SetFeaturedCommand;
use Foodtrucker\Forms\FeaturedHomeForm;

class Admin_ConfigController extends BaseController {

	use \Foodtrucker\Core\CommandBus;
	/**
	 * @var ConfigRepository
	 */
	private $configRepository;
	/**
	 * @var FeaturedHomeForm
	 */
	private $featuredHomeForm;

	function __construct( ConfigRepository $configRepository, FeaturedHomeForm $featuredHomeForm) {
		$this->configRepository = $configRepository;
		$this->featuredHomeForm = $featuredHomeForm;
	}

	public function index()
	{
		$data['title'] = 'Configurações';
		$featured = $this->configRepository->getFeatured();
		if($featured == null){
			$featured = new \Foodtrucker\Configs\SetFeaturedCommand('','','','');
			Session::forget('modal');
		}
		$data['modal'] = (Session::get('modal') == null ? 'false' : 'true');
		$data['imagemDestaque'] = Session::get('img');
		return View::make('back.pages.config', compact('data', 'featured'));
	}

	public function featuredPost(){
		$this->featuredHomeForm->validate(Input::all());
		if(Input::hasFile('image')){
			$image = Input::file('image');
			$path = 'images/upload';
			$image->move($path, $image->getClientOriginalName());
			$final_image = $path."/".$image->getClientOriginalName();
			$img = Image::make($final_image);
			$img->resize(568, null, function ($constraint) {
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
		$img->fit(300);
		$img->save($imageFinal);
		return Redirect::route('config_admin_path');
	}

}
