<?php
namespace Foodtrucker\Blog\AddPost;


class AddPostCommand {
	public $titulo;
	public $slug;
	public $body;
	public $imagem;
	public $publish_at;

	function __construct($titulo, $slug, $body, $imagem,  $publish_at) {
		$this->titulo = $titulo;
		$this->slug = $slug;
		$this->body = $body;
		$this->imagem = $imagem;
		$this->publish_at = $publish_at;
	}
} 