<?php

use Foodtrucker\Blog\AddPost\AddPostCommand;
use Foodtrucker\Core\CommandBus;
use Foodtrucker\Forms\NewPostForm;

class Admin_BlogController extends BaseController {

	use CommandBus;
	/**
	 * @var NewPostForm
	 */
	private $newPostForm;

	function __construct( NewPostForm $newPostForm) {
		$this->newPostForm = $newPostForm;
	}

	public function index(){
		$data['title'] = 'Blog';
		$data['posts'] = null;
		return View::make('back.pages.blog', compact('data'));
	}

	public function store(){
		$this->newPostForm->validate(Input::all());
		extract(Input::only('titulo', 'body', 'imagem', 'publish_at'));
		$imagem = $this->extractImagem(Input::file('imagem'));
		$this->execute(new AddPostCommand($titulo, $body, $imagem, $publish_at));
		return Redirect::back();
	}

	private function extractImagem( $image ) {
		$path = 'images/blog';
		$image->move($path, $image->getClientOriginalName());
		return $final_image = $path."/".$image->getClientOriginalName();
	}

}
