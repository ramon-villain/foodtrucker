<?php

use Foodtrucker\Core\CommandBus;
use Foodtrucker\Forms\NewSpotForm;
use Foodtrucker\Forms\NewTagForm;
use Foodtrucker\Spots\AddSpot\AddSpotCommand;
use Foodtrucker\Spots\SpotRepository;
use Foodtrucker\Tags\TagRepository;

class Admin_TagController extends BaseController {

	use CommandBus;

	/**
	 * @var TagRepository
	 */
	private $tagRepository;
	/**
	 * @var NewTagForm
	 */
	private $newTagForm;

	function __construct( TagRepository $tagRepository, NewTagForm $newTagForm) {

		$this->tagRepository = $tagRepository;
		$this->newTagForm = $newTagForm;
	}

	public function index(){
		$data['tags'] = $this->tagRepository->getTags();
		return View::make('back.pages.tags', compact('data'));
	}

	public function store()
	{
		$this->newTagForm->validate(Input::all());
		extract(Input::only('tags'));
		$this->execute( new AddTagCommand($tags));
		return Redirect::back();
	}

}
