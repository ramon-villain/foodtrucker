<?php

use Foodtrucker\Blog\AddPost\AddPostCommand;
use Foodtrucker\Blog\BlogRepository;
use Foodtrucker\Forms\NewPostForm;

class Admin_BlogController extends BaseController {


	/**
	 * @var NewPostForm
	 */
	private $newPostForm;
	/**
	 * @var BlogRepository
	 */
	private $blogRepository;

	function __construct( NewPostForm $newPostForm, BlogRepository $blogRepository) {
		$this->newPostForm = $newPostForm;
		$this->blogRepository = $blogRepository;
	}

	public function index(){
		$data['title'] = 'Blog';
		$data['posts'] = $this->blogRepository->getPosts('id', '', 10);
		return View::make('back.pages.blog', compact('data'));
	}

	public function store(){
		$this->newPostForm->validate(Input::all());
		extract(Input::only('titulo', 'body', 'imagem', 'publish_at'));
		$imagem = $this->extractImagem(Input::file('imagem'));
		$this->execute(new AddPostCommand($titulo, $body, $imagem, $publish_at));
		return Redirect::back();
	}


	public function edit($id){
		$data['post'] = $this->blogRepository->getPostById($id);
		$data['title'] = 'Editando '. $data['post']->titulo;
		return View::make('back.pages.post_edit', compact('data'));
	}

	public function update($id){
		extract(Input::only('titulo', 'body', 'imagem', 'publish_at'));
		if(Input::hasFile('imagem')){
			$imagem = $this->extractImagem(Input::file('imagem'));
		}
		$this->blogRepository->updatePost($id, $titulo, $body, $imagem,$publish_at);
		return Redirect::back();
	}

	private function extractImagem( $image ) {
		$path = 'images/blog';
		$nome = md5(time()).'.'.$image->getClientOriginalExtension();
		$image->move($path, $nome);
		return $final_image = $path."/".$nome;
	}
}
