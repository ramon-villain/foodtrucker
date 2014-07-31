<?php

use Foodtrucker\Forms\NewTagForm;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Tags\AddTagCommand;
use Foodtrucker\Tags\TagRepository;

class Admin_TagController extends BaseController {


	/**
	 * @var TagRepository
	 */
	private $tagRepository;
	/**
	 * @var NewTagForm
	 */
	private $newTagForm;
	/**
	 * @var SpotRepository
	 */
	private $spotRepository;

	function __construct( TagRepository $tagRepository, NewTagForm $newTagForm, SpotRepository $spotRepository) {

		$this->tagRepository = $tagRepository;
		$this->newTagForm = $newTagForm;
		$this->spotRepository = $spotRepository;
	}

	public function index(){
		$data['tags'] = $this->tagRepository->getTagsPaginatated();
		$data['spots'] = $this->spotRepository->getSpotsId();
		return View::make('back.pages.tags', compact('data'));
	}

	public function store()
	{
		$this->newTagForm->validate(Input::all());
		extract(Input::only('tags'));
		$this->execute(new AddTagCommand($tags));
		return Redirect::back();
	}

	public function storeTruck(){
		$this->newTagForm->validate(Input::all());
		extract(Input::only('tags'));
		$this->execute(new AddTagTruckCommand($tags));
		return Redirect::back();
	}

}
