<?php
namespace Foodtrucker\Trucks;

class TruckRepository {

	private $truck;

	function __construct(Truck $truck) {
		$this->truck = $truck;
	}

	public function save(Truck $truck){
		return $truck->save();
	}

	public function getThisId(Truck $truck) {
		return $truck->orderBy('id','desc')->pluck('id');
	}

	public function getTrucks() {
		return $this->truck->orderBy('created_at', 'desc')->get();
	}

	public function getTrucksId(){
		return $this->getTrucks()->lists('id');
	}

	public function getTrucksName(){
		return Truck::lists('nome');
	}
	public function getTruckById($id){
		return Truck::where('id', $id)->first();
	}

	public function updatesTruck($id, $nome, $logo, $description,$pagamento, $facebook, $instagram, $maisPedido, $extras) {
		return Truck::where('id', $id)->update([
			'nome' => $nome,
			'logo' => $logo,
			'description' => $description,
			'pagamento' => $pagamento,
			'facebook' => $facebook,
			'instagram' => $instagram,
			'maisPedido' => $maisPedido,
			'extras' => $extras
		]);
	}

	public function getActualImage( $id ) {
		return Truck::where('id', $id)->pluck('logo');
	}

	public function getTruckBySlug( $slug ) {
		return Truck::where('slug', $slug)->first();
	}

	public function getCategorias() {
		return \DB::table('categorias')->orderBy('id','asc')->get();
	}
	public function getCategoriasName(){
		return \DB::table('categorias')->orderBy('id','asc')->lists('nome');
	}
	public function getCategoriaNameById($id){
		return \DB::table('categorias')->where('id',$id)->pluck('nome');
	}

	public function saveNewTruck( $nome, $slug, $logo, $especialidade, $cat_id, $mais_pedido, $site, $facebook, $instagram, $preco, $pagamento, $description, $imagens, $extras ) {
		return Truck::insert([
			'nome' => $nome,
			'slug' => $slug,
			'logo' => $logo,
			'especialidade' => $especialidade,
			'cat_id' => $cat_id,
			'mais_pedido' => $mais_pedido,
			'site' => $site,
			'facebook' => $facebook,
			'instagram' => $instagram,
			'preco' => $preco,
			'pagamento' => $pagamento,
			'description' => $description,
			'imagens' => $imagens,
			'extras' => $extras
		]);
	}

	public function updateTruck( $id, $nome, $logo, $especialidade, $cat_id, $mais_pedido, $site, $facebook, $instagram, $preco, $pagamento, $description, $imagens, $extras ) {
		return Truck::where('id', $id)->update([
			'nome' => $nome,
			'logo' => $logo,
			'especialidade' => $especialidade,
			'cat_id' => $cat_id,
			'mais_pedido' => $mais_pedido,
			'site' => $site,
			'facebook' => $facebook,
			'instagram' => $instagram,
			'preco' => $preco,
			'pagamento' => $pagamento,
			'description' => $description,
			'imagens' => $imagens,
			'extras' => $extras
		]);
	}

	public function searchThis( $query ) {
		return Truck::where('nome','like', "%$query%")->orWhere('especialidade','like', "%$query%")->orWhere('description','like', "%$query%")->get();

	}

	public function getLastId() {
		return Truck::orderBy('id', 'desc')->pluck('id');
	}

} 