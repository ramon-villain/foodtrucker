<?php
namespace Foodtrucker\Blog\AddPost;


class AddPostCommand {
	public $titulo;
	public $body;
	public $imagem;
	public $publish_at;

	function __construct($titulo, $body, $imagem,  $publish_at) {
		$this->titulo = $titulo;
		$this->body = $body;
		$this->imagem = $imagem;
		$this->publish_at = $publish_at;
	}
} 