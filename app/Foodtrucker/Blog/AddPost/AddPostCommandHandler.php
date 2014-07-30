<?php
namespace Foodtrucker\Blog\AddPost;


use Foodtrucker\Blog\Blog;
use Foodtrucker\Blog\BlogRepository;
use Laracasts\Commander\CommandHandler;
use Laracasts\Commander\Events\DispatchableTrait;

class AddPostCommandHandler implements CommandHandler{

	use DispatchableTrait;

	/**
	 * @var BlogRepository
	 */
	private $blogRepository;

	function __construct(BlogRepository $blogRepository) {
		$this->blogRepository = $blogRepository;
	}

	public function handle( $command ) {
		$post = Blog::register($command->titulo, $command->body, $command->imagem, $command->publish_at);
		$this->blogRepository->savePost($post);
		$this->dispatchEventsFor($post);
		return $post;
	}

	private function getDayAndBegin( $command ) {
//		$inicio    = explode( '-', $command->inicio );
//		$abertura = explode('/', trim($inicio[0]));
//		$abertura = $abertura[2].'-'.$abertura[1].'-'.$abertura[0];
//		$data['inicioDay'] = gmdate("Y-m-d", strtotime($abertura));
//		$data['inicioTime']    = trim( $inicio[1] );
//
//		$fim    = explode( '-', $command->fim );
//		$encerramento = explode('/', trim($fim[0]));
//		$encerramento = $encerramento[2].'-'.$encerramento[1].'-'.$encerramento[0];
//		$data['fimDay'] = gmdate("Y-m-d", strtotime($encerramento));
//		$data['fimTime']    = trim( $fim[1] );
//		return $data;
	}
}