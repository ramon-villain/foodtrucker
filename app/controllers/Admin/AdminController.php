<?php

use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Tags\TagRepository;

class Admin_AdminController extends BaseController {

	private $spotRepository;
	/**
	 * @var TagRepository
	 */
	private $tagRepository;

	/**
	 * @param SpotRepository $spotRepository
	 * @param TagRepository $tagRepository
	 */
	function __construct( SpotRepository $spotRepository, TagRepository $tagRepository) {
		$this->spotRepository = $spotRepository;
		$this->tagRepository = $tagRepository;
	}

	public function dashboard()
	{
		$data['tagsPaginated'] = $this->tagRepository->getTagsPaginatated();
		$data['spots'] = $this->spotRepository->getSpots();
		return View::make('back.pages.dashboard', compact('data'));
	}

}
