<?php

use Foodtrucker\BannersHome\BannerRepository;
use Foodtrucker\Configs\ConfigRepository;
use Foodtrucker\Configs\SetFeatured\SetFeaturedCommand;
use Foodtrucker\Forms\NewsletterForm;
use Foodtrucker\Spots\Spot;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Tags\Tag;
use Foodtrucker\Tags\TagTruck;
use Foodtrucker\Trucks\Truck;
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
		$categorias = $this->truckRepository->getCategorias();
		$trucks = $this->truckRepository->getTrucks();
		$spots = $this->spotRepository->getSpotsActive();
		$spotsFuturos = $this->spotRepository->getFutureSpotsActive();
		$featured = $this->configRepository->getFeatured();
		$banners = $this->bannerRepository->getBanners(5);
		$last_truck = $this->truckRepository->getTruckById('last');
		$imagens = unserialize($last_truck->imagens);
		if($featured == null){
			$featured = new SetFeaturedCommand('https://res.cloudinary.com/enjoei/image/upload/c_fill,h_330,w_276/avvdeqvbnj0omkxnvuub','https://res.cloudinary.com/enjoei/image/upload/c_fill,h_330,w_276/avvdeqvbnj0omkxnvuub        ','Food Trucker','Em Destaque');
			Session::forget('modal');
		}
		return View::make('front.pages.home', compact('featured', 'banners', 'spots', 'last_truck', 'imagens', 'categorias', 'trucks', 'spotsFuturos'));
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

	public function spotsJs(){
			$spotsAtivo = Spot::where('active', 1)->where('abertura', '=', new DateTime('today'))->get()->toArray();
			for($i=0; $i < count($spotsAtivo); $i++){
				$long = DB::table('spot_details')->where('spot_id',$spotsAtivo[$i]['id'])->pluck('long');
				$lat = DB::table('spot_details')->where('spot_id',$spotsAtivo[$i]['id'])->pluck('lat');
				$truck = Truck::where('id', $spotsAtivo[$i]['truck_id'])->first()->toArray();
				$tags_id = TagTruck::where('truck_id',$truck['id'])->where('spot_id', null)->lists('tag_id');
				$tags_spot = TagTruck::where('truck_id',$truck['id'])->where('spot_id', $spotsAtivo[$i]['id'])->lists('tag_id');
				$tags = [];
				for($s=0;$s < count($tags_id) ; $s++){
					$tags[] = Tag::where('id', $tags_id[$s])->pluck('tag');
				}
				for($r=0;$r < count($tags_spot); $r++){
					$t = Tag::where('id', $tags_spot[$r])->pluck('tag');
					if(!in_array($t,$tags)){
						$tags[] = $t;
					}
				}
				$servico = unserialize($truck['pagamento']);
				$serv = [];
				for($x=0; $x < count($servico); $x++){
					$serv[] = respostaServico($servico[$x]);
				}
				$spotsAtivo[$i]['dataParsed'] = dataMapFront($spotsAtivo[$i]['abertura'], $spotsAtivo[$i]['inicio'],$spotsAtivo[$i]['encerramento'], $spotsAtivo[$i]['fim']);
				array_push($spotsAtivo[$i], [$long, $lat], $truck, $serv, $tags);
			}
			return Response::json($spotsAtivo);
	}


}
