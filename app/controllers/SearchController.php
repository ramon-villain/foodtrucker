<?php

use Foodtrucker\Blog\BlogRepository;
use Foodtrucker\Eventos\EventosRepository;
use Foodtrucker\Forms\ContatoForm;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Tags\TagRepository;
use Foodtrucker\Trucks\TruckRepository;

class SearchController extends BaseController {


	/**
	 * @var TruckRepository
	 */
	private $truckRepository;
	/**
	 * @var TagRepository
	 */
	private $tagRepository;
	/**
	 * @var EventosRepository
	 */
	private $eventosRepository;
	/**
	 * @var BlogRepository
	 */
	private $blogRepository;
	/**
	 * @var SpotRepository
	 */
	private $spotRepository;

	function __construct( TruckRepository $truckRepository, TagRepository $tagRepository, EventosRepository $eventosRepository, BlogRepository $blogRepository, SpotRepository $spotRepository) {
		$this->truckRepository = $truckRepository;
		$this->tagRepository = $tagRepository;
		$this->eventosRepository = $eventosRepository;
		$this->blogRepository = $blogRepository;
		$this->spotRepository = $spotRepository;
	}

	public function index()
	{
		$query = Input::get('q');
		$data['title'] = 'Resultado da busca: '. $query;
		if($query == null){
			return Redirect::to('/');
		}
		$repos = $this->searchRepos( $query );
		$spots = $this->spotRepository->getSpotsActive();
		return View::make('front.pages.search', compact('repos', 'spots', 'query', 'data'));
	}

	/**
	 * @param $query
	 *
	 * @return array
	 */
	private function searchRepos( $query ) {
		$evento = $this->eventosRepository->searchThis( $query )->toArray();
		$truck  = $this->truckRepository->searchThis( $query )->toArray();
		$tag    = $this->tagRepository->searchThis( $query, $truck );
		$blog   = $this->blogRepository->searchThis( $query )->toArray();
		if(!count($evento) AND !count($truck) AND !count($tag) AND !count($blog)){
			return null;
		}else{
			return [$evento, $truck,$tag, $blog];
		}
	}


}
