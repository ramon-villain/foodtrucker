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

	function __construct( TruckRepository $truckRepository, TagRepository $tagRepository, EventosRepository $eventosRepository, BlogRepository $blogRepository) {
		$this->truckRepository = $truckRepository;
		$this->tagRepository = $tagRepository;
		$this->eventosRepository = $eventosRepository;
		$this->blogRepository = $blogRepository;
	}

	public function index()
	{
		$query = Input::get('q');
		$repos = $this->searchRepos( $query );
		dd($repos);
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

		return [$evento, $tag, $truck, $blog];
	}


}
