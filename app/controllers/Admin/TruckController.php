<?php

use Foodtrucker\Forms\newTruckForm;
use Foodtrucker\Spots\Spot;
use Foodtrucker\Trucks\AddTruck\AddTruckCommand;
use Foodtrucker\Trucks\TruckRepository;

class Admin_TruckController extends BaseController {

	private $truckRepository;
	private $spot;
	private $newTruckForm;

	function __construct( NewTruckForm $newTruckForm, TruckRepository $truckRepository, Spot $spot) {
		$this->truckRepository = $truckRepository;
		$this->spot = $spot;
		$this->newTruckForm = $newTruckForm;
	}

	public function index(){
		$data['title']  = 'Trucks';
		$data['categorias']  = $this->truckRepository->getCategorias();
		$data['trucks'] = $this->truckRepository->getTrucks();
		return View::make('back.pages.trucks', compact('data'));
	}

	public function store()
	{
		$this->newTruckForm->validate(Input::all());
		extract(Input::only('nome', 'logo','especialidade','cat_id','mais_pedido','site','facebook','instagram','preco','pagamento','description','imagens', 'extras'));
		$servicos = serialize([Input::get('servicos_0'),Input::get('servicos_1'),Input::get('servicos_2'),Input::get('servicos_3'),Input::get('servicos_4'),Input::get('servicos_5')]);
		$logo = $this->extractLogo(Input::file('logo'));
		$imagens_1 = $this->extractLogo(Input::file('imagens_1'));
		$imagens_2 = $this->extractLogo(Input::file('imagens_2'));
		$imagens_3 = $this->extractLogo(Input::file('imagens_3'));
		$imagens = serialize([$imagens_1, $imagens_2, $imagens_3]);
		$slug = Str::slug($nome);
		$cat_id = $cat_id + 1;
		$this->truckRepository->saveNewTruck($nome, $slug, $logo, $especialidade, $cat_id, $mais_pedido, $site, $facebook, $instagram, $preco, $servicos, $description, $imagens, $extras);
		return Redirect::back();
	}

	private function extractLogo( $image ) {
		$path = 'images/trucks';
		$nome = Str::random(35).'-'.md5(time()).'.'.$image->getClientOriginalExtension();
		$image->move($path, $nome);
		return $final_image = $path."/".$nome;
	}

	public function edit($id){
		$data['categorias']  = $this->truckRepository->getCategorias();
		$data['truck'] = $this->truckRepository->getTruckById($id);
		$data['truck']->cat_id = $data['truck']->cat_id - 1;
		$data['title'] = 'Editando '. $data['truck']->nome;
		$imagens = unserialize($data['truck']->imagens);
		$servicos = unserialize($data['truck']->pagamento);
		return View::make('back.pages.truck_edit', compact('data', 'imagens', 'servicos'));
	}

	public function update($id){
		$data['truck'] = $this->truckRepository->getTruckById($id);
		$imagens = unserialize($data['truck']->imagens);
		$imagens_bckp = $imagens;
		extract(Input::only('nome', 'logo','especialidade','cat_id','mais_pedido','site','facebook','instagram','preco','pagamento','description','imagens', 'extras'));
		$servicos = serialize([Input::get('servicos_0'),Input::get('servicos_1'),Input::get('servicos_2'),Input::get('servicos_3'),Input::get('servicos_4'),Input::get('servicos_5')]);
		$cat_id = $cat_id + 1;
		if(Input::hasFile('logo')){
			$logo = $this->extractLogo(Input::file('logo'));
		}else{
			$logo = $this->truckRepository->getActualImage($id);
		}
		for($i=1; $i <= 3; $i++){
			if(Input::hasFile('imagens_'.$i)){
				${'imagens_'.$i} = $this->extractLogo(Input::file('imagens_'.$i));
				$imagens[$i-1] = ${'imagens_'.$i};
			}else{
				$imagens[$i-1] = $imagens_bckp[$i-1];
			}
		}
		$imagens = serialize($imagens);
		$this->truckRepository->updateTruck($id, $nome, $logo, $especialidade, $cat_id, $mais_pedido, $site, $facebook, $instagram, $preco, $servicos, $description, $imagens, $extras);
		return Redirect::back();
	}

}
